<?php

namespace App\Http\Controllers;


use App\Models\FieldInput;
use App\Models\Verification;
use App\Models\IdentityVerification;
use Illuminate\Http\Request;
use Exception; 

class IdentityController extends Controller
{
   
//Constructor
    public function __construct()
    {
         return $this->middleware('clients');
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
          
            $request->validate([
                'applicant' => 'required',
                'images' => 'array',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'countries' => 'array',
                'countries.*' => 'string',
                'documentTypes' => 'array',
                'documentTypes.*' => 'string',
            ]);

            // Create a new instance of IdentityVerification
            $identity = new IdentityVerification();
            $identity->applicantId = $request->input('applicant');
            $identity->content  = $request->input('images');
            $identity->user_id = auth()->id();

            $identity->save();

            // Process and save images
        // foreach ($request->images as $imageData) {
        //     $image = $imageData['file']; // Extract the image file from the request data
        //     $imageName = $image->getClientOriginalName();
        //     $image->storeAs('identityDoc', $imageName, 'public'); // Store the image file

        //     // Create a new Image record and associate it with the IdentityVerification instance
        //     $identity->images()->create([
        //         'content' => $imageName,
        //         'country' => $imageData['country'],
        //         'documentType' => $imageData['documentType'],
        //     ]);
        // }
            
            return response()->json([
                'code' => 200,
                'success' => 'Identity created successfully',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'code' => 500,
                'error' => 'Failed to create applicant: ' . $e->getMessage(),
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
