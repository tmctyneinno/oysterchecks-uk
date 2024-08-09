<?php
 
namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Traits\sandbox;
use App\Models\Verification;
use App\Models\ApplicantVerification;
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
        $applicant['individuals'] = Applicant::where(['user_id' => $auth->id, 'applicant_type' => 'individual'])->get();
        $applicant['companies'] = Applicant::where(['user_id' => $auth->id, 'applicant_type' => 'company'])->get();
    
        return view('users.applicant.index', $applicant);
    }

    public function ApplicantCreate($slug){
        $applicant['applicant'] = Verification::where('slug', decrypt($slug))->first(); 
        return view('users.applicant.create', $applicant);
    }

    public function ApplicantDetails($applicantData){
        $auth = User::where('id', auth()->user()->id)->first();
        $data['pending'] = Applicant::where(['user_id' => $auth->id, 'status'=>'pending'])->get();
        $data['notverified'] = Applicant::where(['user_id' => $auth->id, 'status'=>'not verified'])->get();
        $data['applicant'] =  Applicant::where(['user_id' => auth()->user()->id,  ])-> get();
        $data['individuals'] = Applicant::where(['user_id' => $auth->id, 'applicant_type' => 'individual'])->get();
        $data['companies'] = Applicant::where(['user_id' => $auth->id, 'applicant_type' => 'company'])->get();
        $data['appli'] = Applicant::where(['user_id' => $auth->id, 'applicantId' => $applicantData])->first();

        $data['verified'] = Applicant::where(['user_id' => $auth->id, 'status'=>'verified',])->get();
        $data['rejected'] = Applicant::where(['user_id' => $auth->id,'status'=>'rejected'])->get();
        
        return view('users.applicant.details', $data);
    }

  

    public function Showverify($applicantId)
    {
        dd($applicantId);
        return view('users.applicant.showverify', ['apiData' => $applicantId]);
    }
    
    public function ApplicantStore(Request $request)
    {    
        $externalUserId = uniqid(); 
        $levelName = 'basic-kyc-level';
       
        $data = $request->only([
            'applicantType', 'firstname', 'lastname', 'middlename', 'email', 'companyemail', 'companyphone',
            'phone', 'placeofbirth', 'dateofbirth', 'country', 'countryofbirth', 
            'gender', 'address', 'companyname', 'registrationnumber', 
            'companycreateddate', 'companyType', 'taxpayer', 'websitelink',
        ]);
     
        $data = array_map(fn($value) => $value ?? '', $data);
        try{
            $applicantData = $this->baseUrl->createApplicant($externalUserId, $levelName, $data);
            $applicantDataArray = json_decode($applicantData, true);
            // dd($applicantDataArray); 
            $applicantFields = [
                'status' => 'not verified',
                'user_id' => auth()->user()->id,
                'applicantId' => $applicantDataArray['id'] ?? '',
                'externalUserId' => $applicantDataArray['externalUserId'] ?? '',
                'applicantKey' => $applicantDataArray['key'] ?? '',
                'inspectionId' => $applicantDataArray['inspectionId'] ?? '',
                'sourceKey' => $applicantDataArray['sourceKey'] ?? '',
                'email' => $applicantDataArray['email'] ?? '',
                'phone' => $applicantDataArray['phone'] ?? $applicantDataArray['info']['companyInfo']['phone'],
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
                'companyemail' => $applicantDataArray['info']['companyInfo']['email'] ?? '',
                'companyname' => $applicantDataArray['info']['companyInfo']['companyName'] ?? '',
                'companyphone' => $applicantDataArray['info']['companyInfo']['phone']  ?? '',
                'registrationnumber' => $applicantDataArray['info']['companyInfo']['registrationNumber'] ?? '',
                'review' => json_encode($applicantDataArray['review']) ?? '',
                'applicant_type' => $applicantDataArray['info']['companyInfo']['type']  ?? $applicantDataArray['type'] ,
               
            ];
        
            Applicant::create($applicantFields);
            $getData = Applicant::where(['user_id' => auth()->user()->id, 'applicantId'=> $applicantDataArray['id'] ])-> first();

            return response()->json([
                'code' => 200,
                'success' => 'Applicant created successfully',
                // "apiResponse" => (string) $applicantData,
                "apiResponse" =>  $applicantData,
                "getData" =>  $getData,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'code' => 500,
                'error' => 'Failed to create applicant: ' . $e->getMessage(),
            ], 401);
        }
    }

    public function GetApplicant(){
        try{
            $applicant = Applicant::where(['user_id' => auth()->user()->id])->get();

            return response()->json([
                'code' => 200,
                'success' => 'Applicant get successfully',
                "apiResponse" =>  $applicant,
            ]);
        }  catch (Exception $e) {
            return response()->json([
                'code' => 500,
                'error' => 'Failed to load applicant: ' . $e->getMessage(),
            ], 500);
        }
    }
   

   


}
