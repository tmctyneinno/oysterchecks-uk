<?php

namespace App\Services;

use App\Enums\OTP_TYPE;
use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Http\Request;
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


    public function verifyAMLStandard(Request $request)
    {
        return $request;
    }

    public function verifyAMLExtensive(Request $request)
    {
        return $request;
    }
}
