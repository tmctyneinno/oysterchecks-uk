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

use App\Constants\ChecksResources;
use App\Models\AmlVerification;
use App\Models\AmlVerificationDetail;

// use App\Services\EmailService;

class ClientsVerificationController extends Controller
{

    protected ComplyCubeService $complyCubeService;

    public function __construct(ComplyCubeService $complyCubeService)
    {
        $this->complyCubeService = $complyCubeService;
    }

    public function getChecksResources()
    {
        return response()->json([
            'check_types' => ChecksResources::CHECK_TYPES,
            'document_types' => ChecksResources::DOCUMENT_TYPES
        ]);
    }


    public function allClients(Request $request)
    {
        $clients = Client::where('service_reference', Auth::user()->id)

            ->when($request->search, function ($query) use ($request) {
                $query->where('first_name', 'LIKE', "%{$request->search}%")
                    ->orWhere('last_name', 'LIKE', "%{$request->search}%")
                    ->orWhere('email', 'LIKE', "%{$request->search}%");
            })

            ->when($request->checks, function ($query) use ($request) {
                $query->where('no_of_checks', '>', 0);
            })

            ->orderByDesc('created_at')->paginate(15);

        return response()->json(['data' =>  $clients, 'message' => 'All clients retrieved successfully.']);
    }



    public function createClient(CreateClientRequest $request)
    {
        $response = $this->complyCubeService->createClient($request->validated());

        if ($response->successful()) {
            $createdClient = $response->json();
            $localClient = Client::create([
                'client_id' => $createdClient['id'],
                'telephone' => $createdClient['telephone'],
                'email' => $createdClient['email'],
                'type' => $createdClient['type'],
                'service_reference' => Auth::user()->id,
                'first_name' => $createdClient['personDetails']['firstName'],
                'last_name' => $createdClient['personDetails']['lastName'],
                'dob' => $createdClient['personDetails']['dob'],
                'nationality' => $createdClient['personDetails']['nationality'],
            ]);
            return response()->json([
                'status' => 201,
                'response' => $localClient,
                'message' => 'Client created successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Could not create client, Something went wrong.'
            ]);
        }
    }



    public function clientDetails($id)
    {
        $client = Client::find($id);
        return response()->json($client, 200);
    }


    public function clientChecks($id)
    {
        // 
    }


    public function verify(Request $request)
    {
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

            $check_type = $request->check_type;

            if (isset($handlerMethods[$check_type])) {
                return call_user_func($handlerMethods[$check_type], $request);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }





    public function verifyAML(Request $request)
    {
        $client = Client::find($request->id);

        $data = [
            'clientId' => $client->client_id,
            'type' => $request->check_type, // standard_screening_check || extensive_screening_check
            'enableMonitoring' => false,
        ];

        $response = $this->complyCubeService->verifyAML($data);
        if ($response->successful()) {

            $result = $response->json();

            AmlVerification::create([
                'client_id' => $result['clientId'],
                'service_reference' => $result['id'],
                'client_ref' => $request->id,
                'entity_name' => $result['entityName'],
                'type' => $result['type'],
                'enable_monitoring' => $result['enableMonitoring'],
                'status' => $result['status'],
            ]);

            $client->increment('no_of_checks');

            return response()->json([
                'status' => 201,
                'message' => 'Verification Successful.'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Could not perform verificication, Something went wrong.'
            ]);
        }
    }
}
