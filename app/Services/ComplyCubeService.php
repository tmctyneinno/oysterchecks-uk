<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

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

    public function addAddress(array $data)
    {
        return Http::withHeaders([
            'Authorization' => $this->token,
        ])->post($this->baseUrl . 'addresses', $data);
    }
}
