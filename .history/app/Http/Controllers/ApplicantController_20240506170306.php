<?php
 
namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Traits\sandbox;
use App\Models\Verification;
use Exception; 
use App\Services\BAseUrl;
use GuzzleHttp\Client;

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
        return view('users.applicant.index');
    }

    public function ApplicantCreate($slug){
        $applicant['applicant'] = Verification::where('slug', decrypt($slug))->first(); 
        return view('users.applicant.create', $applicant);
    }

    public function Showverify(){
        return view('users.applicant.showverify');
    }

    public function ApplicantStore(Request $request)
    {    
      
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
        
        $externalUserId = uniqid(); 
        $levelName = 'basic-kyc-level';
        
        $applicantData = $this->baseUrl->createApplicant($externalUserId, $levelName, $validData);

        return response()->json([
            'success' => true,
            'message' => 'Applicant created successfully',
            "apiResponse" => (string) $applicantData,
        ]);
    }
   

   


}
