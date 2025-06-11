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
        $clients = Auth::user()->serviceClients()->when($request->search, function ($query) use ($request) {
            $query->where('first_name', 'LIKE', "%{$request->search}%")
                ->orWhere('last_name', 'LIKE', "%{$request->search}%")
                ->orWhere('email', 'LIKE', "%{$request->search}%");
        })->orderByDesc('created_at')->paginate(15);

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
        $client = Auth::user()->serviceClients()->find($id);
        return response()->json($client, 200);
    }



    public function clientChecks($id)
    {
        // Logic to retrieve client details by ID
        return response()->json(['message' => 'Client details retrieved successfully.']);
    }

    public function amlStandard(Request $request)
    {
        // Logic to verify AML standard
        // $result = $verificationService->verifyAMLStandard($request);
        // return response()->json(['message' => 'AML Standard verification successful.', 'data' => $result]);
    }

    public function amlExtensive(Request $request)
    {
        // Logic to verify AML extensive
        // $result = $verificationService->verifyAMLExtensive($request);
        // return response()->json(['message' => 'AML Extensive verification successful.', 'data' => $result]);
    }
}
