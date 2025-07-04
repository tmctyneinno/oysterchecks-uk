<?php

namespace App\Http\Controllers\checks;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Services\ComplyCubeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Models\DocumentVerification;
use App\Models\IdentityVerification;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

// use App\Services\EmailService;

class IdentityCheckController extends Controller
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
                'issuingCountry' => 'required|string',
                'issuingState' => 'required|string',
                'classification' => 'required|string',
                'type' => 'required|string',
                'check_type' => 'required|string',
                'documentNumber' => 'required|string',
                'document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:4096',
                'livePhoto' => 'required|file|mimes:jpg,jpeg,png|max:4096',
            ]);

            // create the Document #####################################
            $documentResponse = $this->createDocument($validatedRequest);

            if (!$documentResponse->successful()) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Failed to create document',
                    'errors' => $documentResponse->json()
                ], 500);
            }

            $documentResult = $documentResponse->json();
            #################################################################

            // Upload the document ###############################################
            $this->uploadAttachment($documentResult['id'], $validatedRequest);
            // ##################################################################

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
            $checkResponse = $this->runCheck($documentResult['id'], $livePhotoResult['id'], $validatedRequest);

            if (!$checkResponse->successful()) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Document could not be uplaoded',
                    'errors' => $checkResponse->json()
                ], 500);
            }

            $checkResult = $checkResponse->json();
            #################################################################

            $this->createLocalData($checkResult);

            return response()->json([
                'status' => 201,
                'message' => 'Document verification request sent successfully',
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



    private function createDocument($validatedRequest)
    {
        $documentData = [
            'clientId' => $validatedRequest['clientId'],
            'type' => $validatedRequest['type'],
            'documentNumber' => $validatedRequest['documentNumber'],
            'classification' => $validatedRequest['classification'],
            'issuingCountry' => $validatedRequest['issuingCountry'],
            'issuingState' => $validatedRequest['issuingState'],
        ];

        return $this->complyCubeService->createDocument($documentData);
    }


    private function uploadAttachment($documentId, $validatedRequest, $side = 'front')
    {
        $uploadedFile = $side == 'front' ? $validatedRequest['document'] : $validatedRequest['documentBack'];
        $fileName = $uploadedFile->getClientOriginalName();
        $fileContents = $uploadedFile->get();
        $base64Data = base64_encode($fileContents);

        $uploadData = [
            'data' => $base64Data,
            'fileName' => $fileName
        ];

        Log::info('Uplaoding document attachment with data: ',  ['fileName' => $fileName]);

        return $this->complyCubeService->uploadDocumentAttachment($documentId, $side, $uploadData);
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

    private function runCheck($documentId, $livePhotoId, $validatedRequest)
    {
        $checkData = [
            'clientId' => $validatedRequest['clientId'],
            'type' => $validatedRequest['check_type'],
            'documentId' => $documentId,
            'livePhotoId' => $livePhotoId,
        ];

        Log::info('Running document check with data: ', $checkData);


        return $this->complyCubeService->runCheck($checkData);
    }

    private function createLocalData($data,)
    {
        DB::transaction(function () use ($data) {
            $client = Client::where('client_id', $data['clientId'])->first();

            IdentityVerification::create([
                'client_id' => $data['clientId'],
                'service_reference' => $data['id'],
                'type' => $data['type'],
                'documentId' => $data['documentId'],
                'livePhotoId' => $data['livePhotoId'],
                'status' => $data['status'],
            ]);

            $client->increment('no_of_checks');
        });
    }
}
