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
            $validated = $request->validate([
                'clientId' => 'required|string',
                'issuingCountry' => 'required|string',
                'issuingState' => 'required|string',
                'classification' => 'required|string',
                'document_type' => 'required|string',
                'check_type' => 'required|string',
                'documentNumber' => 'required|string',
                'document_front' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'document_back' => 'sometimes|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);

            $client = Client::where('client_id', $validated['clientId'])->first();

            $documentData = [
                'clientId' => $validated['clientId'],
                'issuingCountry' => $validated['issuingCountry'],
                'issuingState' => $validated['issuingState'],
                'type' => $validated['document_type'],
                'documentNumber' => $validated['documentNumber'],
                'classification' => $validated['classification'],
            ];

            $documentResponse = $this->complyCubeService->createClient($documentData);

            if (!$documentResponse->successful()) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Failed to create client for document verification',
                    'errors' => $documentResponse->json()
                ], 500);
            }

            $documentResult = $documentResponse->json();





            // Upload the document file
            $filePath = $request->file('document')->store('documents', 'public');

            // Prepare the check data
            $checkData = [
                'clientId' => $documentResult['id'],
                'type' => 'document_check',
                'issuingCountry' => $validated['issuingCountry'],
                'classification' => $validated['classification'],
                'documentFilePath' => storage_path('app/public/' . $filePath),
            ];

            // Run the check
            $checkResponse = $this->complyCubeService->runCheck($checkData);

            if (!$checkResponse->successful()) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Document verification failed',
                    'errors' => $checkResponse->json()
                ], 500);
            }

            $result = $checkResponse->json();

            DB::transaction(function () use ($result, $client) {
                DocumentVerification::create([
                    'client_id' => $result['clientId'],
                    'service_reference' => $result['id'],
                    'entity_name' => $result['entityName'],
                    'type' => $result['type'],
                    'status' => $result['status'],
                    // Add other fields as necessary
                ]);
                $client->increment('no_of_checks');
            });
            return response()->json([
                'status' => 201,
                'message' => 'Document verification request sent successfully',
                'data' => $result
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 500);
        } catch (\Exception $e) {
            Log::error('Document verification failed: ' . $e->getMessage());
            return response()->json([
                'status' => 500,
                'message' => 'An unexpected error occurred during document verification',
            ], 500);
        }
    }
}
