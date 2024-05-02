<?php
 
namespace App\Http\Controllers;

use App\Mail\UserAccount;
use App\Mail\UserOnboard;
use App\Models\CandidateService;
use App\Models\User;
use App\Models\Applicant;
use App\Models\ApplicantFieldInput;
use App\Models\Document;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\CandidateVerification;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Traits\sandbox;
use Illuminate\Support\Facades\Validator;
use App\Models\Verification;
use Exception; 

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
        $applicant['fields'] = ApplicantFieldInput::get();
        return view('users.applicant.create', $applicant);
    }

    public function Showverify(){
        return view('users.applicant.showverify');
    }

    public function ApplicantStore(Request $request){
        // Validate applicant form data
        $validData = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
        ]);
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
        $apiResponse = $this->sendToApi($validData);

        return response()->json([
            'success' => true,
            'message' => 'Applicant created successfully',
            "apiResponse" => $apiResponse,
        ]);
    }
    //API endpoint
    private function sendToApi($validData)
    {
       // $apiEndpoint = $this->ReqUrl()."applicants";
        $apiEndpoint = "https://api.sumsub.com/resources/applicants";
        $dataToSend = [
            'key' => "GVBRNAYKKDHZAJ",
            'info' => [
                'firstName' => $validData['firstname'],
                'lastName' => $validData['lastname'],
                
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
        //Send data to API endpoint
        $apiResponse = $this->makeApiRequest($apiEndpoint, $dataToSend);
        return $apiResponse;
    } 
     // Generate request signature
     
 
    // Helper method to make API request
    private function makeApiRequest($apiEndpoint, $dataToSend)
    {
       // Generate timestamp
        $timestamp = time();
        $headers = [
            "Content-Type: application/json",
            "X-App-Token:".$this->ReqToken(),
            //"X-App-Access-Sig:".$this->SecretKey(),
            // "X-App-Access-Ts: $timestamp"
        ];

        $ch = curl_init($apiEndpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dataToSend));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $apiResponse = curl_exec($ch);
        $apiResponseDecoded = json_decode($apiResponse, true);
        // Check for errors
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new Exception("cURL error: $error");
        }
        // Close cURL session
        curl_close($ch);
        return $apiResponseDecoded;
    }
    

   


}
