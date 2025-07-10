<?php

namespace App\Http\Controllers\checks;

use App\Http\Controllers\Controller;
use App\Models\AgeEstimation;
use App\Models\Client;
use App\Services\ComplyCubeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\IdentityVerification;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

// use App\Services\EmailService;

class AgeEstimationCheckController extends Controller
{
    protected ComplyCubeService $complyCubeService;

    public function __construct(ComplyCubeService $complyCubeService)
    {
        $this->complyCubeService = $complyCubeService;
    }


    public function verify(Request $request)
    {
        try {
            $validatedRequest = $request->validate([
                'clientId' => 'required|string',
                'check_type' => 'required|string',
                'livePhoto' => 'required|file|mimes:jpg,jpeg,png|max:4096',
            ]);

            // Upload the livePhoto ###############################################
            $livePhotoResponse = $this->uploadLivePhoto($validatedRequest);
            // ##################################################################

            if (!$livePhotoResponse->successful()) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Failed to upload live photo',
                    'errors' => $livePhotoResponse->json()
                ], 500);
            }

            $livePhotoResult = $livePhotoResponse->json();

            // Run the check ###############################################
            $checkResponse = $this->runCheck($livePhotoResult['id'], $validatedRequest);

            if (!$checkResponse->successful()) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Age Estimation Check failed',
                    'errors' => $checkResponse->json()
                ], 500);
            }

            $checkResult = $checkResponse->json();
            #################################################################

            $this->storeLocalData($checkResult);

            return response()->json([
                'status' => 201,
                'message' => 'Age Estimation Check request sent successfully',
                'data' => $checkResult
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 500);
        } catch (\Throwable $th) {
            // Log::error('Document verification failed: ' . $e->getMessage());
            throw $th;
            return response()->json([
                'status' => 500,
                'message' => 'An unexpected error occurred during document verification',
            ], 500);
        }
    }


    private function uploadLivePhoto($validatedRequest)
    {
        $livePhoto = $validatedRequest['livePhoto'];
        $fileContents = $livePhoto->get();
        $base64Data = base64_encode($fileContents);

        $uploadData = [
            'data' => $base64Data,
            'clientId' => $validatedRequest['clientId'],
            'performLivenessCheck' => true,
        ];

        Log::info('Uploading live photo... for clientId: ' . $validatedRequest['clientId']);

        return $this->complyCubeService->createLivePhoto($uploadData);
    }

    private function runCheck($livePhotoId, $validatedRequest)
    {
        $checkData = [
            'clientId' => $validatedRequest['clientId'],
            'type' => $validatedRequest['check_type'],
            'livePhotoId' => $livePhotoId,
        ];

        Log::info('Running document check with data: ', $checkData);


        return $this->complyCubeService->runCheck($checkData);
    }

    private function storeLocalData($data,)
    {
        DB::transaction(function () use ($data) {
            $client = Client::where('client_id', $data['clientId'])->first();

            AgeEstimation::create([
                'client_id' => $data['clientId'],
                'service_reference' => $data['id'],
                'type' => $data['type'],
                'live_photo_id' => $data['livePhotoId'],
                'status' => $data['status'],
            ]);

            $client->increment('no_of_checks');
        });
    }
}
