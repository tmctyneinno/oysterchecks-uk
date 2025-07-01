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

class ClientAddressesController extends Controller
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
        $addresses = $this->complyCubeService->getClientAddresses($request->client_id);
        return response()->json($addresses->json(), 200);
    }


    public function show($id)
    {
        // 
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'clientId' => 'required|string',
            'line' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postalCode' => 'required|string|max:20',
            'type' => 'sometimes|string|in:main,alternative,other',
            'state' => 'sometimes',
            'buildingName' => 'sometimes',
            'propertyNumber' => 'sometimes',
            'fromDate' => 'sometimes|date_format:Y-m-d',
            'toDate' => 'sometimes|date_format:Y-m-d',
        ]);

        $response = $this->complyCubeService->createAddress($validatedData);

        if ($response->successful()) {
            return response()->json([
                'status' => 201,
                'message' => 'Address created successfully.',
                'data' => $response->json()
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Could not create address, Something went wrong.'
            ]);
        }
    }

    public function destroy($addressId)
    {
        $addresses = $this->complyCubeService->deleteAddress($addressId);
        return response()->json($addresses->json(), 200);
    }
}
