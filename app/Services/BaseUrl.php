<?php

namespace App\Services;

use GuzzleHttp;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;
use App\Traits\sandbox;

class BAseUrl
{
    use sandbox;
    protected const BASE_URL = 'https://api.sumsub.com';

    protected GuzzleHttp\Client $guzzleClient;

    public function __construct()
    {
        $this->guzzleClient = new GuzzleHttp\Client(['base_uri' => self::BASE_URL]);
    }

    /**
     * https://developers.sumsub.com/api-reference/#creating-an-applicant
     *
     * @param string $externalUserId
     * @param string $levelName
     * @throws RuntimeException
     * @return string Applicant ID
     */
    
    
    public function createApplicant(string $externalUserId, string $levelName, $validData): string
    {
        $requestBody = [
            'externalUserId' => $externalUserId,
            'email' => $validData['email'] ?? $validData['companyemail'],
            'phone' => $validData['phone'] ?? $validData['companyphone'],
            'country' => $validData['country'] ?? '',
            'info' => [
                "companyInfo" => [
                    'companyName' => $validData['companyname'] ?? '',
                    'registrationNumber' => $validData['registrationnumber'] ?? '' ,
                    "country" => $validData['country'] ?? '',
                    "incorporatedOn" => $validData['companycreateddate'] ?? '',
                    "type" => $validData['applicantType'] ?? '',
                    "email" => $validData['companyemail'] ?? '',
                    "phone" => $validData['companyphone'] ?? '',
                    "website"=> $validData['websitelink'] ?? '',
                ],
                'firstName' => $validData['firstname'] ?? '',
                'lastName' => $validData['lastname'] ?? '',
                'middleName' => $validData['middlename'] ?? '',
                'placeOfBirth' => $validData['placeofbirth'] ?? '',
                'stateOfBirth' => $validData['placeofbirth'] ?? '',
                'dob' => $validData['dateofbirth'] ?? '',
                'gender' => $validData['gender']  ?? '',
                'countryOfBirth' => $validData['countryofbirth'] ?? '',
                'address' => $validData['address'] ?? '',
            ],
            'fixedInfo' => [
                'firstName' => $validData['firstname'] ?? '',
                'lastName' => $validData['lastname'] ?? '',
            ],
            'type' => $validData['applicantType'] ?? '',
        ];

        $url = '/resources/applicants?' . http_build_query(['levelName' => $levelName]);

        /** @var RequestInterface $request */
        $request = (new GuzzleHttp\Psr7\Request('POST', $url))
            ->withHeader('Content-Type', 'application/json')
            ->withBody(GuzzleHttp\Psr7\Utils::streamFor(json_encode($requestBody)));

        $response = $this->sendRequest($request);
        $parsedResponse = $this->parseBody($response);
    
        return json_encode($parsedResponse);
        // return $parsedResponse;
    }

    /**
     * https://developers.sumsub.com/api-reference/#adding-an-id-document
     *
     * @param string $applicantId
     * @param string $filePath
     * @param array $metadata
     * @throws RuntimeException
     * @return string Image ID
     */
    public function addDocument(
        string $applicantId,
        string $filePath,
        array $metadata,
    ): string
    {
        $multipart = new GuzzleHttp\Psr7\MultipartStream([
            [
                'name' => 'metadata',
                'contents' => json_encode($metadata)
            ],
            [
                'name' => 'content',
                'contents' => fopen($filePath, 'r')
            ],
        ]);

        $url = '/resources/applicants/' . urlencode($applicantId) . '/info/idDoc';
        /** @var RequestInterface $request */
        $request = (new GuzzleHttp\Psr7\Request('POST', $url))
            ->withBody($multipart);

        $response = $this->sendRequest($request);
        return $response->getHeader('X-Image-Id')[0] ?? '';
        // return json_decode($this->sendRequest($request));
        // var_dump( $response) ;
        // die();
        // return json_encode($response);
    }

    /**
     * https://developers.sumsub.com/api-reference/#getting-applicant-status-api
     *
     * @param string $applicantId
     * @throws RuntimeException
     * @return array
     */
    public function getApplicantStatus(string $applicantId): array
    {
        $url = '/resources/applicants/' . urlencode($applicantId) . '/requiredIdDocsStatus';
        $request = new GuzzleHttp\Psr7\Request('GET', $url);

        $response = $this->sendRequest($request);
        return $this->parseBody($response);
    }

    /**
     * https://developers.sumsub.com/api-reference/#access-tokens-for-sdks
     *
     * @param string $externalUserId
     * @param string $levelName
     * @throws RuntimeException
     * @return array
     */
    public function getAccessToken(string $externalUserId, string $levelName): array
    {
        $url = '/resources/accessTokens?' . http_build_query(['userId' => $externalUserId, 'levelName' => $levelName]);
        $request = new GuzzleHttp\Psr7\Request('POST', $url);

        $response = $this->sendRequest($request);
        return $this->parseBody($response);
    }

    /**
     * @param RequestInterface $request
     * @throws RuntimeException
     * @return ResponseInterface
     */
    protected function sendRequest(RequestInterface $request): ResponseInterface
    {
        $now = time();
        $request = $request->withHeader('X-App-Token', $this->ReqToken())
            ->withHeader('X-App-Access-Sig', $this->createSignature($request, $now))
            ->withHeader('X-App-Access-Ts', $now);

        try {
            $response = $this->guzzleClient->send($request);
            if ($response->getStatusCode() != 200 && $response->getStatusCode() != 201) {
                // https://developers.sumsub.com/api-reference/#errors
                // If an unsuccessful answer is received, please log the value of the `correlationId` parameter.

                throw new RuntimeException('Invalid status code received: ' . $response->getStatusCode() . '. Body: ' . $response->getBody());
            }

            return $response;
        } catch (GuzzleHttp\Exception\GuzzleException $e) {
            throw new RuntimeException('Error occurred during the request', 0, $e);
        }
    }

    protected function createSignature(RequestInterface $request, int $ts): string
    {
        return hash_hmac('sha256', $ts . strtoupper($request->getMethod()) . $request->getUri() . $request->getBody(), $this->SecretKey());
    }

    protected function parseBody(ResponseInterface $response): array
    {
        $data = (string)$response->getBody();
        $json = json_decode($data, true, JSON_THROW_ON_ERROR);
        if (!is_array($json)) {
            throw new RuntimeException('Invalid response received: ' . $data);
        }

        return $json;
    }
}
