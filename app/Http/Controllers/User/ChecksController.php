<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClientRequest;
use App\Models\Client;
use App\Services\ComplyCubeService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Http\Resources\ClientsChecksCollectionFormat;
use App\Models\AddressVerification;
use App\Models\AgeEstimation;
use App\Models\AmlVerification;
use App\Models\AmlVerificationDetail;
use App\Models\BureauCheck;
use App\Models\DocumentVerification;
use App\Models\IdentityVerification;
use App\Services\CheckService;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

// use App\Services\EmailService;

class ChecksController extends Controller
{

    protected ComplyCubeService $complyCubeService;
    protected CheckService $checkService;

    public function __construct(ComplyCubeService $complyCubeService,  CheckService $checkService)
    {
        $this->complyCubeService = $complyCubeService;
        $this->checkService = $checkService;
    }

    public function getChecksResources()
    {
        return response()->json([
            'check_types' => $this->checkService::CHECK_TYPES,
            'document_types' => $this->checkService::DOCUMENT_TYPES
        ]);
    }

    public function checks(Request $request)
    {
        $checks = $this->checkService->clientChecksCollection($request->client_id);

        // Extract unique existing_checks
        $existing_checks = collect($checks)
            ->pluck('type')
            ->unique() // Remove duplicates
            ->values() // Reset array keys
            ->toArray();


        // paginate collection with helper
        $paginator = paginateHelper($checks);
        $transformedData = ClientsChecksCollectionFormat::collection($paginator->items());
        $response = $paginator->toArray();
        $response['data'] = $transformedData;
        $response['existing_checks'] = $existing_checks;

        return response()->json($response, 200);
    }


    public function verify(Request $request)
    {
        $check_type = $request->check_type;

        $handlerMethods = [
            'standard_screening_check' => [$this, 'verifyAML'],
            'extensive_screening_check' => [$this, 'verifyAML'],
            'document_check' => [$this, 'verifyDocument'],
            'identity_check' => [$this, 'verifyIdentity'],
            'age_estimation_check' => [$this, 'verifyAge'],
            'proof_of_address_check' => [$this, 'verifyAddress'],
            'multi_bureau_check' => [$this, 'verifyBureau'],
        ];

        try {
            if (isset($handlerMethods[$check_type])) {
                return call_user_func($handlerMethods[$check_type], $request);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function verifyAML(Request $request)
    {
        try {
            $validated = $request->validate([
                'clientId' => 'required|string',
                'check_type' => 'required|string|in:standard_screening_check,extensive_screening_check',
                'enableMonitoring' => 'sometimes|boolean'
            ]);

            $client = Client::where('client_id', $validated['clientId'])->first();

            $data = [
                'clientId' => $validated['clientId'],
                'type' => $validated['check_type'],
                'enableMonitoring' => $validated['enableMonitoring'] ?? false,
            ];

            $response = $this->complyCubeService->runCheck($data);

            if (!$response->successful()) {
                return response()->json([
                    'status' => 400,
                    'message' => 'AML verification failed',
                    'errors' => $response->json()
                ], 400);
            }

            $result = $response->json();

            DB::transaction(function () use ($result, $client) {
                AmlVerification::create([
                    'client_id' => $result['clientId'],
                    'service_reference' => $result['id'],
                    'entity_name' => $result['entityName'],
                    'type' => $result['type'],
                    'enable_monitoring' => $result['enableMonitoring'],
                    'status' => $result['status'],
                ]);

                $client->increment('no_of_checks');
            });

            return response()->json([
                'status' => 201,
                'message' => 'AML verification request sent successfully',
                'data' => $result
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 500);
        } catch (\Exception $e) {
            Log::error('AML verification failed: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'An unexpected error occurred during AML verification',
            ], 500);
        }
    }


    public function verifyBureau(Request $request)
    {

        try {
            $validated = $request->validate([
                'clientId' => 'required|string',
                'line' => 'required|string',
                'country' => 'required|string',
                'state' => 'required|string',
                'city' => 'required|string',
                'check_type' => 'required|string',
                'postalCode' => 'required|string',
                'propertyNumber' => 'required|string',
            ]);

            $client = Client::where('client_id', $validated['clientId'])->first();

            $addressData = [
                'clientId' => $validated['clientId'],
                'line' => $validated['line'],
                'city' => $validated['city'],
                'postalCode' => $validated['postalCode'],
                'state' => $validated['state'],
                'country' => $validated['country'],
            ];

            $addressResponse = $this->complyCubeService->addAddress($addressData);

            if (!$addressResponse->successful()) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Failed to add Address',
                    'errors' => $addressResponse->json()
                ], 500);
            }

            $addressResult = $addressResponse->json();

            $checkData = [
                'clientId' => $addressResult['clientId'],
                'addressId' => $addressResult['id'],
                'type' => $validated['check_type'],
                'country' => $validated['country'],
                'state' => $validated['state'],
                'city' => $validated['city'],
                'line' => $validated['line'],
                'propertyNumber' => $validated['propertyNumber'],
                'postalCode' => $validated['postalCode'],
            ];


            $checkResponse = $this->complyCubeService->runCheck($checkData);

            if (!$checkResponse->successful()) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Check verification failed',
                    'dataSent' =>  $checkData,
                    'errors' => $checkResponse->json()
                ], 500);
            }

            $result = $checkResponse->json();

            DB::transaction(function () use ($result, $client) {
                BureauCheck::create([
                    'client_id' => $result['clientId'],
                    'service_reference' => $result['id'],
                    'entity_name' => $result['entityName'],
                    'type' => $result['type'],
                    'address_id' => $result['addressId'],
                    'status' => $result['status'],
                ]);

                $client->increment('no_of_checks');
            });

            return response()->json([
                'status' => 201,
                'message' => 'Request Sent Successfully',
                'data' => $result
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 500);
        } catch (\Exception $e) {
            Log::error('Bureau verification failed: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'An unexpected error occurred',
            ], 500);
        }
    }
}
