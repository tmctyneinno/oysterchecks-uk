<?php

namespace App\Http\Controllers;

use App\Traits\sandbox;
use App\Models\FieldInput;
use App\Models\Verification;
use App\Models\IdentityVerification;
use Illuminate\Http\Request;
use Exception; 
use App\Services\BAseUrl;

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

    public function showIdentityVerificationForm($slug)
    {
        $this->RedirectUser();
        $user = auth()->user();

        $slug = Verification::where('slug', $slug)->first();
        $data['slug'] = $slug;
        $data['fields'] = FieldInput::where(['slug' => $slug->slug])->get();
       
        return view('users.individual.identityVerify', $data);
    }

    public function stores(Request $request){
        try{
             // Validate the request data
            $request->validate([
                'applicant' => 'required',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size and allowed file types as needed
                'countries.*' => 'required',
                'documentTypes.*' => 'required',
            ]);
            return response()->json([
                'code' => 200,
                'success' => 'Applicant created successfully',
            
            ]);

        } catch (Exception $e) {
            return response()->json([
                'code' => 500,
                'error' => 'Failed to create applicant: ' . $e->getMessage(),
            ], 500);
        }
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
                'firstName' => 'required|string',
                'lastName' => 'required|string',
                'middleName' => 'required|string',
                'issueddate' => 'required|string',
                'validUntil' => 'required|string',
                'documentNumber' => 'required|string',
                'dataofBirth' => 'required|string', 
                'placeofBirth' => 'required|string',
            ]);
    
            foreach ($validatedData['documents'] as $document) {
                $path = $document['file']->store('identityDocuments');
                IdentityVerification::create([
                    'user_id'=> auth()->id(),
                    'applicantId' => $validatedData['applicant_id'],
                    'content' => $path,
                    'country' => $document['country'],
                    'idDocType' => $document['documentType'],
                    'idDocSubType' => 'null',
                    'firstName' =>  $validatedData['firstName'],
                    'lastName' =>  $validatedData['lastName'],
                    'middleName' =>  $validatedData['middleName'],
                    'issuedDate' =>  $validatedData['issueddate'],
                    'validUntil' => $validatedData['validUntil'],
                    'documentNumber' => $validatedData['validUntil'],
                    'dataofBirth' => $validatedData['dataofBirth'],
                    'placeofBirth' => $validatedData['placeofBirth'],
                 ]);
               
                $applicantData = $this->baseUrl->addDocument(
                    $validatedData['applicant_id'],
                    // storage_path($path), 
                    storage_path('app/' . $path),
                    // storage_path('app/sumsub-logo.png'), 
                    [
                        "idDocType" => "PASSPORT",
                        "country" => "GBR",
                        "firstName" => $validatedData['firstName'],
                        "middleName" => $validatedData['middleName'],
                        "lastName" => $validatedData['lastName'],
                        "issuedDate" => $validatedData['issueddate'],
                        "number" => $validatedData['issueddate'],
                        "validUntil" => $validatedData['validUntil'],
                        "dob" => "2000-02-01",
                        "placeOfBirth" => "London",
                    ],
                );
                $apiResponse = json_decode($applicantData, true);
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
                'error' => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }



  public function identityDetails(){  
        $user = auth()->user();
        $data['slug'] = 'Identity';
        $data['success'] = 'success';
        $data['failed'] = 'failed';
        $data['pending'] = 'Pending';
        $data['verified'] = 'verified';
        $data['user'] = $user; 
        return view('users.identity.details',$data); 
    }


    public function RedirectUser()
    {
        if (auth()->user()->user_type == 3)
            return redirect()->route('admin.index');
    }
  
}
