<?php

namespace App\Http\Controllers\checks;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Services\ComplyCubeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\AmlVerification;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

// use App\Services\EmailService;

class AmlCheckController extends Controller
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
}
