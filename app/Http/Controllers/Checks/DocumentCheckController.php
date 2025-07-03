<?php

namespace App\Http\Controllers\checks;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Services\ComplyCubeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

use App\Models\DocumentVerification;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

// use App\Services\EmailService;

class DocumentCheckController extends Controller
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
                'document_side' => 'required|in:front,back',
                'document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);


            $client = Client::where('client_id', $validatedRequest['clientId'])->first();


            // create the Document #####################################
            $documentResponse = $this->createDocument($validatedRequest);

            if (!$documentResponse->successful()) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Failed to create client for document verification',
                    'errors' => $documentResponse->json()
                ], 500);
            }

            $documentResult = $documentResponse->json();
            #################################################################

            // Upload the document ###############################################
            $uploadResponse = $this->uploadAttachment($documentResult['id'], $validatedRequest);

            if (!$uploadResponse->successful()) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Document could be uplaoded',
                    'errors' => $uploadResponse->json()
                ], 500);
            }

            $uploadResult = $uploadResponse->json();
            #################################################################


            // Run the check ###############################################
            $checkResponse = $this->runCheck($documentResult['id'], $validatedRequest);

            if (!$checkResponse->successful()) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Document could not be uplaoded',
                    'errors' => $checkResponse->json()
                ], 500);
            }

            $checkResult = $checkResponse->json();
            Log::info('complete');
            #################################################################

            // $this->createLocalData($result, $client);


            return response()->json([
                'status' => 201,
                'message' => 'Document verification request sent successfully',
                // 'data' => $result
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


    private function uploadAttachment($documentId, $validatedRequest)
    {
        $uploadedFile = $validatedRequest['document'];
        $fileName = $uploadedFile->getClientOriginalName();
        $fileContents = $uploadedFile->get();
        $base64Data = base64_encode($fileContents);

        $uploadData = [
            'data' => $base64Data,
            'fileName' => $fileName
        ];

        return $this->complyCubeService->uploadDocumentAttachment($documentId, $validatedRequest['document_side'], $uploadData);
    }

    private function runCheck($documentId, $validatedRequestRequest)
    {
        $checkData = [
            'clientId' => $validatedRequestRequest['clientId'],
            'type' => $validatedRequestRequest['check_type'],
            'documentId' => $documentId,
        ];

        Log::info('Running document check with data: ', $checkData);


        return $this->complyCubeService->runCheck($checkData);
    }

    private function createLocalData($data, Client $client)
    {
        DB::transaction(function () use ($data, $client) {
            DocumentVerification::create([
                'client_id' => $data['clientId'],
                'service_reference' => $data['id'],
                'entity_name' => $data['entityName'],
                'type' => $data['type'],
                'address_id' => $data['addressId'],
                'status' => $data['status'],
            ]);

            $client->increment('no_of_checks');
        });
    }
}
