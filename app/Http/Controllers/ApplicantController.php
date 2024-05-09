<?php
 
namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Traits\sandbox;
use App\Models\Verification;
use Exception; 
use App\Services\BAseUrl;
use Illuminate\Support\Facades\Crypt;
use App\Models\User;

class ApplicantController extends Controller
{
    use sandbox;
    
    protected $baseUrl;

    public function __construct(BAseUrl $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function GeneratePassword($name = null){
        $pass =substr(str_replace(['+', '=', '/'], '', \base64_encode(random_bytes(15))), 0,10);
        return $pass;
    } 
     
    public function ApplicantIndex(){
        $auth = User::where('id', auth()->user()->id)->first();
       
        // $individual = Applicant::where(['user_id' => $auth->id, 'is_sandbox' => $this->sandbox()])->get();

        $applicant['individuals'] = Applicant::where(['user_id' => $auth->id, 'applicant_type' => 'individual'])->get();
        $applicant['companies'] = Applicant::where(['user_id' => $auth->id, 'applicant_type' => 'company'])->get();
    
        return view('users.applicant.index', $applicant);
    }

    public function ApplicantCreate($slug){
        $applicant['applicant'] = Verification::where('slug', decrypt($slug))->first(); 
        return view('users.applicant.create', $applicant);
    }

    public function ApplicantDetails($id){
        //$data['pending'] = Candidate::where(['client_id' => client_id(), 'status'=>'pending', 'status'=>null, 'is_sandbox' => $this->sandbox()])->get();
        //$data['candidates'] = Candidate::where(['client_id' => client_id(), 'is_sandbox' => $this->sandbox()])->get();
        //$data['verified'] = Candidate::where(['client_id' => client_id(), 'status'=>'verified', 'is_sandbox' => $this->sandbox()])->get();
        //$data['rejected'] = Candidate::where(['client_id'=> client_id(), 'status'=>'rejected', 'is_sandbox' => $this->sandbox()])->get();
        $applicant = Applicant::where('id', decrypt($id))->first();
        $data['applicant'] = Applicant::where(['user_id' => $applicant->applicntID])->first();
        // $data['services'] = CandidateVerification::where('user_id', $candidate->user_id)->get();
        return view('users.applicant.details', $data); 
    }

  

    public function Showverify(Request $request)
    {
       
        $encryptedApiResponse = $request->input('apiResponse');

        // $decryptedApiResponse = Crypt::decryptString($encryptedApiResponse);
        $apiData = json_decode($encryptedApiResponse, true);
    
        return view('users.applicant.showverify', ['apiData' => $apiData]);
    }
    
    public function ApplicantStore(Request $request)
    {     
        $externalUserId = uniqid(); 
        $levelName = 'basic-kyc-level';
       
        $data = $request->only([
            'applicant_type', 'firstname', 'lastname', 'middlename', 'email', 
            'phone', 'placeofbirth', 'dateofbirth', 'country', 'countryofbirth', 
            'gender', 'address', 'companyname', 'registrationnumber', 
            'companycreateddate', 'companyType', 'taxpayer', 'websitelink'
        ]);
    
        $data = array_map(fn($value) => $value ?? '', $data);
    
        $applicantData = $this->baseUrl->createApplicant($externalUserId, $levelName, $data);
        $applicantDataArray = json_decode($applicantData, true);
        // dd($applicantDataArray);
        $applicantFields = [
            'user_id' => auth()->user()->id,
            'applicantId' => $applicantDataArray['id'] ?? '',
            'externalUserId' => $applicantDataArray['externalUserId'] ?? '',
            'applicantKey' => $applicantDataArray['key'] ?? '',
            'inspectionId' => $applicantDataArray['inspectionId'] ?? '',
            'sourceKey' => $applicantDataArray['sourceKey'] ?? '',
            'email' => $applicantDataArray['email'] ?? '',
            'phone' => $applicantDataArray['phone'] ?? '',
            'country' => $applicantDataArray['country'] ?? $applicantDataArray['info']['companyInfo']['country'],
            'firstName' => $applicantDataArray['info']['firstName'] ?? '',
            'lastName' => $applicantDataArray['info']['lastName'] ?? '',
            'middleName' => $applicantDataArray['info']['middleName'] ?? '',
            'placeofbirth' => $applicantDataArray['info']['placeofbirth'] ?? '',
            'dateofbirth' => $applicantDataArray['info']['dateofbirth'] ?? '',
            'countryofbirth' => $applicantDataArray['info']['countryofbirth'] ?? '',
            'gender' => $applicantDataArray['info']['gender'] ?? '',
            'address' => $applicantDataArray['info']['address'] ?? '',
            'websitelink' => $applicantDataArray['info']['companyInfo']['website'] ?? '',
            'info' => json_encode($applicantDataArray['info']) ?? '',
            'companyInfo' => json_encode($applicantDataArray['info']['companyInfo']) ?? '',
            'companyname' => $applicantDataArray['info']['companyInfo']['companyName'] ?? '',
            'registrationnumber' => $applicantDataArray['info']['companyInfo']['registrationNumber'] ?? '',
            'review' => json_encode($applicantDataArray['review']) ?? '',
            'applicant_type' => $applicantDataArray['info']['companyInfo']['type']  ?? $applicantDataArray['type'] ,
        ];
        //  dd($applicantFields);
      
        Applicant::create($applicantFields);
        
        return response()->json([
            'success' => true,
            'message' => 'Applicant created successfully',
            // "apiResponse" => (string) $applicantData,
            "apiResponse" => (string) $applicantData,
        ]);
    }
   

   


}
