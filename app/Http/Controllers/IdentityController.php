<?php

namespace App\Http\Controllers;

use App\Traits\sandbox;
use App\Models\FieldInput;
use App\Models\Verification;
use App\Models\IdentityVerification;
use Illuminate\Http\Request;
use Exception; 
use App\Services\BAseUrl;
use App\Models\Applicant;
use App\Models\User;
use App\Models\Wallet;

class IdentityController extends Controller
{
   
    //Constructor
    use sandbox;
    
    protected $baseUrl;

    public function __construct(BAseUrl $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function identityIndex($slug)
    {
        $this->RedirectUser();
     
    }

    public function getIdentityFee(Request $request){
        $identity = $request->input('identity');
        // $identity = 'identity';
        $user = User::where('id', auth()->user()->id)->first();
        $slug = Verification::where(['slug' => $identity])->first(); 
        $wallet = Wallet::where('user_id', $user->id)->first();

        return response()->json([
            'slug' => $slug,
            'wallet' => $wallet,
        ]);
    }
   
  
    public function GetIdentityVerification(){
        try{
            $identityData = IdentityVerification::where(['user_id' => auth()->user()->id])->get();

            return response()->json([
                'code' => 200,
                'success' => 'Applicant get successfully',
                "identityData" =>  $identityData,
            ]);
        }  catch (Exception $e) {
            return response()->json([
                'code' => 500,
                'error' => 'Failed to load applicant: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function identityDetails($imageID) {  
        // dd($imageID);
        $user = auth()->user();
        $auth = User::where('id', auth()->user()->id)->first();
        $data['slug'] = 'Identity';
        $data['success'] = 'success';
        $data['failed'] = 'failed';
        $data['pending'] = 'Pending';
        $data['verified'] = 'verified';
        $data['user'] = $user; 
        $identityVerificationdetails = IdentityVerification::where(['imageID' => $imageID, 'user_id' => auth()->user()->id])->first();
        $identityVerificationData = IdentityVerification::where([ 'user_id' => auth()->user()->id])->get();
        $data['identityVerificationdetails'] = $identityVerificationdetails;
        $applicantID = $identityVerificationdetails->applicantId;
        $data['applicant'] = Applicant::where(['user_id' => $auth->id, 'applicantId' => $applicantID])->first();
       
        $identityVerificationStatus = $this->baseUrl->getApplicantStatus($applicantID);
        // dd($identityVerificationStatus);
        return view('users.identity.details', compact('data', 'identityVerificationStatus', 'identityVerificationData')); 
    }
    

    public function showIdentityVerification($slug)
    {
        $this->RedirectUser();
        $user = auth()->user();

        dd($slug);

        $slug = Verification::where('slug', $slug)->first();
        $data['slug'] = $slug;
        $data['fields'] = FieldInput::where(['slug' => $slug->slug])->get();
       
        return view('users.individual.identityVerify', $data);
    }

   
    public function store(Request $request)
    {
        try{
          
            $validatedData = $request->validate([
                'applicant_id' => 'required|exists:applicants,applicantId',
                'documents' => 'required|array',
                'documents.*.file' => 'required|file|mimes:jpeg,png,jpg,gif',
                'documents.*.country' => 'required|string',
                'documents.*.documentType' => 'required|string',
                // 'firstName' => 'required|string', 
                // 'lastName' => 'required|string', 
                // 'middleName' => 'required|string', 
                // 'issuedDate' => 'required|string', 
                // 'number' => 'required|string', 
                // 'validUntil' => 'required|string', 
                // 'dob' => 'required|string', 
                
            ]);
            
    
                foreach ($validatedData['documents'] as $document) {
                    $path = $document['file']->store('identityDocuments');

                    $applicantData = $this->baseUrl->addDocument(
                        $validatedData['applicant_id'],
                        // storage_path($path), 
                        storage_path('app/' . $path),
                        // storage_path('app/sumsub-logo.png'), 
                        [
                            "idDocType" => "PASSPORT",
                            "country" => "GBR",
                            "firstName" => $validatedData['firstName'] ?? '',
                            "lastName" => $validatedData['lastName'] ?? '',
                            "middleName" => $validatedData['middleName'] ?? '', 
                            "issuedDate" => $validatedData['issueddate'] ?? '',
                            "number" => $validatedData['documentNumber'] ?? '',
                            "validUntil" => $validatedData['validUntil'] ?? '',
                            "dob" => $validatedData['dataofBirth'] ?? '',
                            "placeOfBirth" => $validatedData['placeOfBirth'] ?? '',
                        ],
                    );

                    $apiResponse = json_decode($applicantData, true);
                    IdentityVerification::create([
                        'user_id'=> auth()->id(),
                        'applicantId' => $validatedData['applicant_id'],
                        'content' => $path,
                        'country' => $document['country'],
                        'idDocType' => $document['documentType'],
                        'idDocSubType' => 'null',
                        'firstName' => $request->input('firstName'),
                        'lastName' =>   $request->input('lastName'), 
                        'middleName' =>    $request->input('middleName'),
                        'issuedDate' =>   $request->input('issueddate'),
                        'validUntil' => $request->input('validUntil'), 
                        'docNumber' =>   $request->input('docNumber'), 
                        'dataofBirth' => $request->input('dataofBirth'),  
                        'placeOfBirth' => $request->input('placeOfBirth'), 
                        'imageID' => $apiResponse,
                        'fee' => $request->input('fee'),
                    ]);
                }
            

            return response()->json([
                'code' => 200,
                'success' => 'Identity created successfully',
                'apiResponse'=> $apiResponse,
                // 'apiResponse'=> ''
            ]);
        } catch (Exception $e) {
            return response()->json([
                'code' => 500,
                // 'error' => 'Error: ' . $e->getMessage(),
                'error' => 'The Applicant and Document field is required',
            ], 500);
        }
    }



    public function RedirectUser()
    {
        if (auth()->user()->user_type == 3)
            return redirect()->route('admin.index');
    }
  
}
