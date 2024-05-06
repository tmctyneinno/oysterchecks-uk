<?php
 
namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Traits\sandbox;
use App\Models\Verification;
use Exception; 
use Illuminate\Support\Arr;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Client;

class ApplicantController extends Controller
{
    use sandbox;
    public function __construct()
    {
       // $this->middleware('auth:admin');
    }

    public function GeneratePassword($name = null){
        $pass =substr(str_replace(['+', '=', '/'], '', \base64_encode(random_bytes(15))), 0,10);
        return $pass;
    } 
     
    public function ApplicantIndex(){
        return view('users.applicant.index');
    }

    public function ApplicantCreate($slug){
        $applicant['applicant'] = Verification::where('slug', decrypt($slug))->first(); 
        return view('users.applicant.create', $applicant);
    }

    public function Showverify(){
        return view('users.applicant.showverify');
    }

    public function ApplicantStore(Request $request){
        
      
        $validData = [
            'applicant_type' => $request->input('applicant_type'),
            'firstName' => $request->input('firstname') ?? '', 
            'lastName' => $request->input('lastname') ?? '',
            'middleName' => $request->input('middlename') ?? '',
            'email' => $request->input('email') ?? '',
            'phone' => $request->input('phone') ?? '',
            'placeofbirth' => $request->input('placeofbirth') ?? '',
            'dateofbirth' => $request->input('dateofbirth') ?? '',
            'country' => $request->input('country') ?? '',
            'countryofbirth' => $request->input('countryofbirth') ?? '',
            'gender' => $request->input('gender') ?? '',
            'address' => $request->input('address') ?? '',
            'companyname' => $request->input('companyname') ?? '',
            'registrationnumber' => $request->input('registrationnumber') ?? '',
            'companycreateddate' => $request->input('companycreateddate') ?? '',
            'companyType' => $request->input('companyType') ?? '',
            'taxpayer' => $request->input('taxpayer') ?? '',
            'websitelink' => $request->input('websitelink') ?? '',
        ];
        
        Applicant::create([
            'user_id' => auth()->user()->id,
            'applicant_type'=> $request->input('applicant_type'),
            'firstName' => $request->input('firstname'),
            'lastName' => $request->input('lastname'),
            'middleName' => $request->input('middlename'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'placeofbirth' => $request->input('placeofbirth'),
            'dateofbirth' => $request->input('dateofbirth'),
            'country' => $request->input('country'),
            'countryofbirth' => $request->input('countryofbirth'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            "companyname" => $request->input('companyname'),
            "registrationnumber" => $request->input('registrationnumber'),
            "companycreateddate" => $request->input('companycreateddate'),
            "companyType" => $request->input('companyType'),
            "taxpayer" => $request->input('taxpayer'),
            "websitelink" => $request->input('websitelink'),
        ]);
        
        // Send data to the API endpoint
        $apiResponse = $this->sendToApi($request);

        return response()->json([
            'success' => true,
            'message' => 'Applicant created successfully',
            "apiResponse" => $apiResponse,
        ]);
    }
    //API endpoint
    private function sendToApi($request)
    {
       // $apiEndpoint = $this->ReqUrl()."applicants";
        // $apiEndpoint = "https://api.sumsub.com/resources/applicants";
        // $dataToSend = [
        //     'key' => "GVBRNAYKKDHZAJ",
        //     'info' => [
        //         'firstName' => $validData['firstName'],
        //         'lastName' => $validData['lastName'],
                
        //     ],
        //     "applicantPlatform" => "API",
        //     "review" => [
        //         "reviewId" => "zzefZ",
        //         "attemptId" => "kmogZ",
        //         "attemptCnt"=> 0,
        //         "reviewStatus" =>"init",
        //         "priority"=> 0
        //     ],
        //     'type' => "individual"
        // ];
        //Send data to API endpoint
        $apiResponse = $this->makeApiRequest($request);
        return $apiResponse;
    } 
     // Generate request signature
     
     protected function createSignature(RequestInterface $request, int $ts): string
     {
         return hash_hmac('sha256', $ts . strtoupper($request->getMethod()) . $request->getUri() . $request->getBody(), "kQYTcpGXGoQmdcY73Hr6UJOl0QjEoFJ1");
     }
    // Helper method to make API request
    private function makeApiRequest($request)
    {
       // Generate timestamp
        $timestamp = time();
        $headers = [
            "Content-Type: application/json",
            "X-App-Token:".$this->ReqToken(),
            "X-App-Access-Sig:" .$this->createSignature($request, $timestamp),
            "X-App-Access-Ts: $timestamp"
        ];
        $dataToSend = [
            'key' => "GVBRNAYKKDHZAJ",
            'info' => [
                'firstName' => 'firstName'],
                'lastName' => 'lastName'],
                
            ],
            "applicantPlatform" => "API",
            "review" => [
                "reviewId" => "zzefZ",
                "attemptId" => "kmogZ",
                "attemptCnt"=> 0,
                "reviewStatus" =>"init",
                "priority"=> 0
            ],
            'type' => "individual"
        ];
        $client = new Client();
        $apiEndpoint = $this->ReqUrl()."applicants";
        $response = $client->request('POST', $apiEndpoint, [
            'headers' => $headers,
            'body' => json_encode($dataToSend)
        ]);
        return $response->getBody();



        // $ch = curl_init($apiEndpoint);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataToSend));
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // $apiResponse = curl_exec($ch);
        // $apiResponseDecoded = json_decode($apiResponse, true);
        // // Check for errors
        // if (curl_errno($ch)) {
        //     $error = curl_error($ch);
        //     curl_close($ch);
        //     throw new Exception("cURL error: $error");
        // }
        // // Close cURL session
        // curl_close($ch);
        // return $apiResponseDecoded;
    }
    

   


}
