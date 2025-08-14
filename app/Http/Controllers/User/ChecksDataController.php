<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\ComplyCubeService;
use Illuminate\Http\Request;

use App\Http\Resources\ClientsChecksCollectionFormat;
use App\Services\CheckService;
use Illuminate\Support\Facades\Log;

class ChecksDataController extends Controller
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
            'document_types' => $this->checkService::DOCUMENT_TYPES,
            'document_classifications' => $this->checkService::DOCUMENT_CLASSIFICATIONS
        ]);
    }

    public function getCheckResult($service_reference)
    {
        $result = $this->complyCubeService->getCheckResult($service_reference);
        $data = null;
        if ($result->successful()) {
            $data = $result->json();
            try {
                // update status in the Checks table
                $model = $this->checkService->getModelNameFromCheckType($data['type']);
                $model::where('service_reference', $data['id'])
                    ->where('client_id', $data['clientId'])
                    ->update(['status' => $data['status']]);
            } catch (\Throwable $th) {
                // throw $th;
            }
        }

        return response()->json($data, 200);
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


    // public function verify(Request $request)
    // {
    //     $check_type = $request->check_type;

    //     $handlerMethods = [
    //         'standard_screening_check' => [$this, 'verifyAML'],
    //         'extensive_screening_check' => [$this, 'verifyAML'],
    //         'document_check' => [$this, 'verifyDocument'],
    //         'identity_check' => [$this, 'verifyIdentity'],
    //         'age_estimation_check' => [$this, 'verifyAge'],
    //         'proof_of_address_check' => [$this, 'verifyAddress'],
    //         'multi_bureau_check' => [$this, 'verifyBureau'],
    //     ];

    //     try {
    //         if (isset($handlerMethods[$check_type])) {
    //             return call_user_func($handlerMethods[$check_type], $request);
    //         }
    //     } catch (\Throwable $th) {
    //         throw $th;
    //     }
    // }

}
