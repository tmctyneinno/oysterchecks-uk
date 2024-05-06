<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SumsubClient;

class SumsubController extends Controller
{
    protected $sumsubClient;

    public function __construct(SumsubClient $sumsubClient)
    {
        $this->sumsubClient = $sumsubClient;
    }
 
    public function processSumsub()
    {
        // Your Sumsub code here
        $externalUserId = uniqid(); // Use your internal UserID instead in production code
        $levelName = 'basic-kyc-level';
        
        $applicantId = $this->sumsubClient->createApplicant($externalUserId, $levelName);
        echo 'The applicant was successfully created: ' . $applicantId . PHP_EOL;
        
        $imageId = $this->sumsubClient->addDocument(
            $applicantId,
            storage_path('app/sumsub-logo.png'), // Change to your file path
            ['idDocType' => 'PASSPORT', 'country' => 'GBR'],
        );
        echo 'Identifier of the added document: ' . $imageId . PHP_EOL;
        
        $applicantStatusInfo = $this->sumsubClient->getApplicantStatus($applicantId);
        echo 'Applicant status (json): ' . json_encode($applicantStatusInfo, JSON_PRETTY_PRINT) . PHP_EOL;
        
        $accessTokenInfo = $this->sumsubClient->getAccessToken($externalUserId, $levelName);
        echo 'Access token (json): ' . json_encode($accessTokenInfo, JSON_PRETTY_PRINT) . PHP_EOL;
    }
}
