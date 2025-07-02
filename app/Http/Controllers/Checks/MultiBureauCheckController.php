<?php

namespace App\Http\Controllers\checks;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClientRequest;
use App\Models\Client;
use App\Services\ComplyCubeService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Models\AmlVerification;
use App\Models\BureauCheck;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

// use App\Services\EmailService;

class MultiBureauCheckController extends Controller
{

    protected ComplyCubeService $complyCubeService;

    public function __construct(ComplyCubeService $complyCubeService)
    {
        $this->complyCubeService = $complyCubeService;
    }


    public function verify(Request $request)
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

            $addressResponse = $this->complyCubeService->createAddress($addressData);

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
