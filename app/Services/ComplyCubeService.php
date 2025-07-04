<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ComplyCubeService
{
    protected string $baseUrl;
    protected string $token;


    public function __construct()
    {
        $this->baseUrl = config('services.complycube.endpoint');
        $this->token = config('services.complycube.token');
    }

    public function createClient(array $data)
    {
        return Http::withHeaders([
            'Authorization' => $this->token,
        ])->post($this->baseUrl . 'clients', $data);
    }


    public function runCheck(array $data)
    {
        return Http::withHeaders([
            'Authorization' => $this->token,
        ])->post($this->baseUrl . 'checks', $data);
    }


    public function getClientAddresses(string $clientId)
    {
        return Http::withHeaders([
            'Authorization' => $this->token,
        ])->get($this->baseUrl . 'addresses?clientId=' . $clientId);
    }

    public function createAddress(array $data)
    {
        return Http::withHeaders([
            'Authorization' => $this->token,
        ])->post($this->baseUrl . 'addresses', $data);
    }

    public function deleteAddress(string $clientId)
    {
        return Http::withHeaders([
            'Authorization' => $this->token,
        ])->delete($this->baseUrl . 'addresses/' . $clientId);
    }


    public function createDocument(array $data)
    {
        return Http::withHeaders([
            'Authorization' => $this->token,
        ])->post($this->baseUrl . 'documents', $data);
    }

    public function uploadDocumentAttachment(string $document_id, string $document_side, $data)
    {
        $url = $this->baseUrl . 'documents/' . $document_id . '/upload/' . $document_side;
        Log::info('Uploading document attachment to URL: ' . $url);
        return Http::withHeaders([
            'Authorization' => $this->token,
        ])->post($url, $data);
    }


    public function createLivePhoto(array $data)
    {
        return Http::withHeaders([
            'Authorization' => $this->token,
        ])->post($this->baseUrl . 'livePhotos', $data);
    }
}
