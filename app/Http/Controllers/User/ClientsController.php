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

class ClientsController extends Controller
{

    protected ComplyCubeService $complyCubeService;
    protected CheckService $checkService;

    public function __construct(ComplyCubeService $complyCubeService,  CheckService $checkService)
    {
        $this->complyCubeService = $complyCubeService;
        $this->checkService = $checkService;
    }


    public function index(Request $request)
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



    public function store(CreateClientRequest $request)
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



    public function show($id)
    {
        $client = Client::find($id);
        return response()->json($client, 200);
    }
}
