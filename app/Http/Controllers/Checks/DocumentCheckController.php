<?php

namespace App\Http\Controllers\checks;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Services\ComplyCubeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
                'document' => 'required|file|mimes:jpg,jpeg,png,pdf|max:4096',
                'documentBack' => 'sometimes|file|mimes:jpg,jpeg,png,pdf|max:4096',
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

            // Upload the document (s) ###############################################
            $this->uploadAttachment($documentResult['id'], $validatedRequest);
            if (isset($validatedRequest['documentBack'])) {
                $this->uploadAttachment($documentResult['id'], $validatedRequest, 'back');
            }

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
            #################################################################

            $this->storeLocalData($checkResult);

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

        Log::info('Uplaoding document attachment with data: ');

        return $this->complyCubeService->uploadDocumentAttachment($documentId, $side, $uploadData);
    }

    private function runCheck($documentId, $validatedRequest)
    {
        $checkData = [
            'clientId' => $validatedRequest['clientId'],
            'type' => $validatedRequest['check_type'],
            'documentId' => $documentId,
        ];

        Log::info('Running document check with data: ', $checkData);


        return $this->complyCubeService->runCheck($checkData);
    }

    private function storeLocalData($data,)
    {
        DB::transaction(function () use ($data) {
            $client = Client::where('client_id', $data['clientId'])->first();

            DocumentVerification::create([
                'client_id' => $data['clientId'],
                'service_reference' => $data['id'],
                'type' => $data['type'],
                'documentId' => $data['documentId'],
                'status' => $data['status'],
            ]);

            $client->increment('no_of_checks');
        });
    }
}
