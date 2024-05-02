<?php

namespace App\Http\Controllers;

use App\Models\{CacVerification, TinVerification};
use Illuminate\Support\Facades\{DB, Session, Validator};
use App\Models\Verification;
use App\Models\Transaction;
use App\Traits\GenerateRef;
use Illuminate\Http\Request;
use App\Traits\generateHeaderReports;
use App\Models\User;
use App\Traits\sandbox;
use App\Models\FieldInput;
use App\Models\Wallet;
// use App\Models\BusinessVerificationDetail;


class BusinessController extends Controller
{
    //
    use GenerateRef;
    use sandbox;
    use generateHeaderReports;

    public function RedirectUser()
    {
        if (auth()->user()->user_type == 3)
            return redirect()->route('admin.index');
    }
    public function Index($name)
    {
        $this->RedirectUser();
        $user = User::where('id', auth()->user()->id)->first();
        $slug = Verification::where(['slug' => $name])->first();
        if ($slug) {
            if ($slug->slug == 'cac') {
                $data['slug'] = $slug;
                $data['success'] = CacVerification::where(['status' => 'found', 'verification_id' => $slug->id, 'user_id' => $user->id,'is_sandbox' => $this->sandbox()])->count();
                $data['failed'] = CacVerification::where(['status' => 'not_found', 'verification_id' => $slug->id, 'user_id' => $user->id, 'is_sandbox' => $this->sandbox()])->count();
                $data['pending'] = CacVerification::where(['status' => 'pending', 'verification_id' => $slug->id, 'user_id' => $user->id, 'is_sandbox' => $this->sandbox()])->count();
                $data['fields'] = FieldInput::where(['slug' => $slug->slug])->get();
                $data['wallet'] = Wallet::where('user_id', $user->id)->first();
                $data['logs'] = CacVerification::where(['user_id' => $user->id, 'verification_id' => $slug->id, 'is_sandbox' => $this->sandbox()])->latest()->get();
                return view('users.business.index', $data);
            } elseif ($slug->slug == 'tin') {
                $data['slug'] = $slug;
                $data['success'] = TinVerification::where(['status' => 'found', 'verification_id' => $slug->id, 'user_id' => $user->id, 'is_sandbox' => $this->sandbox()])->count();
                $data['failed'] = TinVerification::where(['status' => 'not_found', 'verification_id' => $slug->id, 'user_id' => $user->id, 'is_sandbox' => $this->sandbox()])->count();
                $data['pending'] = TinVerification::where(['status' => 'pending', 'verification_id' => $slug->id, 'user_id' => $user->id, 'is_sandbox' => $this->sandbox()])->count();
                $data['fields'] = FieldInput::where(['slug' => $slug->slug])->get();
                $data['wallet'] = Wallet::where('user_id', $user->id)->first();
                $data['logs'] = TinVerification::where(['user_id' => $user->id, 'verification_id' => $slug->id, 'is_sandbox' => $this->sandbox()])->latest()->get();
                return view('users.business.index', $data);
            } else {
            }
        }
    }
    public function businessCheck($name)
    {
        $this->RedirectUser();
        $slug = Verification::where(['slug' => $name])->first();
        $data['slug'] = Verification::where(['slug' => $name])->first();
        $data['fields'] = FieldInput::where(['slug' => $slug->slug])->get();
        return view('users.business.verify_business', $data);
    }
    public function businessStore(Request $request, $slug)
    {
        if ($slug == 'cac') {
            return $this->processCac($request->only(['search_term', 'search_value', 'subject_consent', 'countryCode']), $slug);
        } elseif ($slug == 'tin') {
            return $this->processTin($request->only(['pin', 'subject_consent']), $slug);
        } else {
        }
    }

    protected function processCac(array $data, $slug)
    {
        $validate = Validator::make($data, [
            'search_term' => 'bail|required|string',
            'search_value' => 'bail|required',
            'subject_consent' => 'required'
        ]);
        if ($validate->fails()) {
            Session::flash('alert', 'error');
            Session::flash('message', 'Incorrect or no data provided!');
            return redirect()->back();
        }
        if($this->sandbox() == 0 && $data['search_value'] != 'RC00000000'){
            Session::flash('alert', 'error');
            Session::flash('message', 'Use Test data only for test mode');
            return redirect()->back();
        }
        $ref = $this->GenerateRef();
        $slug = Verification::where('slug', $slug)->first();
        if($this->sandbox() == 0 ){
        $userWallet = Wallet::where('user_id', auth()->user()->id)->first();
            if (isset($slug->discount) && $slug->discount > 0) {
                $amount = ($slug->fee - $slug->discount);
            } else {
                $amount = $slug->fee;
            }
            if ($userWallet->avail_balance < $amount) {
                Session::flash('alert', 'error');
                Session::flash('message', 'Your walllet is too low for this transaction');
                return back();
            }
        }
            $requestData = [
                'isConsent' =>  true,
                'registrationNumber' => $data['search_value'],
                'countryCode' => $data['countryCode']
            ];
            // if ($data['search_term'] == 'taxId'){
            //     $requestData['type'] = 'tin';
            // }elseif($data['search_term'] == 'cacReg'){
            //     $requestData['type'] = 'registrationNumber';
            // }elseif($data['search_term'] == 'regPhone'){
            //     $requestData['type'] = 'phone';
            // }

         
            DB::beginTransaction();
            try {
                $curl = curl_init();
                $encodedRequestData = json_encode($requestData, true);
                curl_setopt_array($curl, [
                    CURLOPT_URL => $this->reqUrl()."verifications/global/company-advance-check",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 1,
                    CURLOPT_TIMEOUT => 2180,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => $encodedRequestData,
                    CURLOPT_HTTPHEADER => [
                        "Content-Type: application/json",
                        "Token: ".$this->reqToken()
                    ],
                ]);
                $response = curl_exec($curl);
                if (curl_errno($curl)) {
                    dd('error:' . curl_errno($curl));
                } else {
                    $decodedResponse = json_decode($response, true);
                    if ($decodedResponse['success'] == true && $decodedResponse['statusCode'] == 200) {
                        CacVerification::create([
                            'verification_id' => $slug->id,
                            'user_id' => auth()->user()->id,
                            'ref' => $ref,
                            'service_reference' => $decodedResponse['data']['id'] != null ? $decodedResponse['data']['id'] : null,
                            'subject_consent' => true,
                            'status' => $decodedResponse['data']['status'],
                            'reason' => isset($decodedResponse['data']['reason']) ? $decodedResponse['data']['reason'] : null,
                            'type' => 'cac',
                            'fee' => $amount,
                            'search_term' => $data['search_term'],
                            'search_value' => $data['search_value'],
                            'name' => $decodedResponse['data']['name'] != null ? $decodedResponse['data']['name'] : null,
                            'registration_number' => $decodedResponse['data']['registrationNumber'] != null ? $decodedResponse['data']['registrationNumber'] : null,
                            'tin' => $decodedResponse['data']['tin'] != null ? $decodedResponse['data']['tin'] : null,
                            'jtb_tin' => $decodedResponse['data']['jtbTin'] != null ? $decodedResponse['data']['jtbTin'] : null,
                            'tax_office' => $decodedResponse['data']['taxOffice'] != null ? $decodedResponse['data']['taxOffice'] : null,
                            'email' => $decodedResponse['data']['email'] != null ? $decodedResponse['data']['email'] : null,
                            'company_status' => $decodedResponse['data']['companyStatus'] != null ? $decodedResponse['data']['companyStatus'] : null,
                            'phone' => $decodedResponse['data']['phone'] != null ? $decodedResponse['data']['phone'] : null,
                            'type_of_entity' => $decodedResponse['data']['typeOfEntity'] != null ? $decodedResponse['data']['typeOfEntity'] : null,
                            'activity' => $decodedResponse['data']['activity'] != null ? $decodedResponse['data']['activity'] : null,
                            'registration_date' => $decodedResponse['data']['registrationDate'] != null ? $decodedResponse['data']['registrationDate'] : null,
                            'address' => $decodedResponse['data']['address'] != null ? $decodedResponse['data']['address'] : null,
                            'state' => $decodedResponse['data']['state'] != null ? $decodedResponse['data']['state'] : null,
                            'lga' => $decodedResponse['data']['lga'] != null ? $decodedResponse['data']['lga'] : null,
                            'city' => $decodedResponse['data']['city'] != null ? $decodedResponse['data']['city'] : null,
                            'website_email' => $decodedResponse['data']['websiteEmail'] != null ? $decodedResponse['data']['websiteEmail'] : null,
                            'key_personnel' => isset($decodedResponse['data']['keyPersonnel']) ? $decodedResponse['data']['keyPersonnel'] : null,
                            'branch_address' => $decodedResponse['data']['branchAddress'] != null ? $decodedResponse['data']['branchAddress'] : null,
                            'head_office_address' => $decodedResponse['data']['headOfficeAddress'] != null ? $decodedResponse['data']['headOfficeAddress'] : null,
                            'objectives' => $decodedResponse['data']['objectives'] != null ? $decodedResponse['data']['objectives'] : null,
                            'country' => 'Nigeria',
                            'requested_at' => $decodedResponse['data']['requestedAt'] != null ? $decodedResponse['data']['requestedAt'] : null,
                            'last_modified_at' => $decodedResponse['data']['lastModifiedAt'] != null ? $decodedResponse['data']['lastModifiedAt'] : null,
                            'is_sandbox' => $this->sandbox()
                        ]);
                        DB::commit();
                        Session::flash('alert', 'success');
                        Session::flash('message', 'Verification Successful');
                        if($this->sandbox() == 1){
                            $reference = $decodedResponse['data']['id'];
                            $reasons = $decodedResponse['data']['reason'];
                            $this->chargeUser($amount, $reference , $reasons );
                        }
                        return redirect()->route('businessIndex', $slug->slug);
                    }else{
                    Session::flash('alert', 'error');
                    Session::flash('message', 'Something went wrong, try again');
                    return back()->withInput($data);
                    }
                }
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
                Session::flash('alert', 'error');
                Session::flash('message', 'Something went wrong, try again');
                return back();
            }
    }

    protected function processTin(array $data, $slug)
    {
        $validate = Validator::make($data, [
            'pin' => 'bail|required',
            'subject_consent' => 'bail|required|accepted'
        ]);

        if ($validate->fails()) {
           // dd($validate->errors());
           Session::flash('alert', 'error');
           Session::flash('message', $validate->errors()->first() );
           return back();
        }
        $ref = $this->GenerateRef();
        $slug = Verification::where('slug', $slug)->first();
        $userWallet = Wallet::where('user_id', auth()->user()->id)->first();
    
            if (isset($slug->discount) && $slug->discount > 0) {
                $amount = ($slug->discount * $slug->fee) / 100;
            } else {
                $amount = $slug->fee;
            }
            if ($userWallet->avail_balance < $amount) {
                Session::flash('alert', 'error');
                Session::flash('message', 'Your walllet is too low for this transaction');
                return back();
            }

            $requestData = [
                'isConsent' => $data['subject_consent'] ? true : false,
                'tin' => $data['pin'],
            ];
            
            DB::beginTransaction();
            try {
                $curl = curl_init();
                $encodedRequestData = json_encode($requestData, true);
                curl_setopt_array($curl, [
                    CURLOPT_URL => $this->reqUrl()."verifications/ng/tin",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 1,
                    CURLOPT_TIMEOUT => 2180,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => $encodedRequestData,
                    CURLOPT_HTTPHEADER => [
                        "Content-Type: application/json",
                        "Token: ".$this->ReqToken()
                    ],
                ]);
    
                $response = curl_exec($curl);
                if (curl_errno($curl)) {
                    Session::flash('alert', 'error');
                    Session::flash('message', 'Something went wrong, try again');
                    return back();
                } else {
                    $decodedResponse = json_decode($response, true);
                    
                    if ($decodedResponse['success'] == true && $decodedResponse['statusCode'] == 200) {
                       $reasons = isset($decodedResponse['data']['reason']) ? $decodedResponse['data']['reason'] : null;
                       $reference = $decodedResponse['data']['id'] != null ? $decodedResponse['data']['id'] : null;
                        TinVerification::create([
                            'verification_id' => $slug->id,
                            'user_id' => auth()->user()->id,
                            'ref' => $ref,
                            'service_reference' => $reference,
                            'subject_consent' => true,
                            'status' => $decodedResponse['data']['status'],
                            'reason' => $reasons,
                            'type' => 'tin',
                            'fee' => $amount,
                            'search_term' => 'Tax Identification Number',
                            'search_value' => $data['pin'],
                            'name' => $decodedResponse['data']['name'] != null ? $decodedResponse['data']['name'] : null,
                            'registration_number' => $decodedResponse['data']['registrationNumber'] != null ? $decodedResponse['data']['registrationNumber'] : null,
                            'tin' => $decodedResponse['data']['tin'] != null ? $decodedResponse['data']['tin'] : null,
                            'jtb_tin' => $decodedResponse['data']['jtbTin'] != null ? $decodedResponse['data']['jtbTin'] : null,
                            'tax_office' => $decodedResponse['data']['taxOffice'] != null ? $decodedResponse['data']['taxOffice'] : null,
                            'email' => $decodedResponse['data']['email'] != null ? $decodedResponse['data']['email'] : null,
                            'phone' => $decodedResponse['data']['phone'] != null ? $decodedResponse['data']['phone'] : null,
                            'country' => 'Nigeria',
                            'requested_at' => $decodedResponse['data']['requestedAt'] != null ? $decodedResponse['data']['requestedAt'] : null,
                            'last_modified_at' => $decodedResponse['data']['lastModifiedAt'] != null ? $decodedResponse['data']['lastModifiedAt'] : null,
                            'is_sandbox' => $this->sandbox()
                        ]);
    
                        DB::commit();
                        Session::flash('alert', 'success');
                        Session::flash('message', 'Verification Successful');
                        if($this->sandbox() == 1)
                        {
                            $reference = $decodedResponse['data']['id'];
                            $reasons = $decodedResponse['data']['reason'];
                        $this->chargeUser($amount, $reference , $reasons );
                        }
                       
                        return redirect()->route('businessIndex', $slug->slug);
                    }else{

                        Session::flash('alert', 'error');
                        Session::flash('message', 'Something went wrong, try again');
                        return back()->withInput($data);
                    }
                }
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
                Session::flash('alert', 'error');
                Session::flash('message', 'Something went wrong, try again');
                return back();
            }

    }
    public function chargeUser($amount, $ext_ref, $type)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $wallet = Wallet::where('user_id', $user->id)->first();
        $newWallet = $user->wallet->avail_balance - $amount;
        $update = Wallet::where('user_id', $user->id)
            ->update([
                'book_balance' => $wallet->avail_balance,
                'avail_balance' => $newWallet,
            ]);
        $refs = $this->GenerateRef();
        Transaction::create([
            'ref' => $refs,
            'user_id' => $user->id,
            'external_ref' => $ext_ref,
            'purpose' => $type,
            'service_type' => $type,
            'type'  => 'DEBIT',
            'total_amount_payable' => $amount,
            'payment_method' => 'Wallet Payment',
            'amount' => $amount,
            'prev_balance' => $wallet->avail_balance,
            'avail_balance' => $newWallet
        ]);
        return $update;
    }

    public function RefundUser($amount, $ext_ref, $type)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $wallet = Wallet::where('user_id', $user->id)->first();
        $newWallet = $user->wallet->avail_balance + $amount;
        Wallet::where('user_id', $user->id)
            ->update([
                'prev_balance' => $wallet->avail_balance,
                'avail_balance' => $newWallet,
            ]);
        $refs = $this->GenerateRef();
        Transaction::create([
            'ref' => $refs,
            'user_id' => $user->id,
            'external_ref' => $ext_ref,
            'purpose' => 'Payment for ' . $type,
            'service_type' => $type,
            'type'  => 'CREDIT',
            'amount' => $amount,
            'prev_balance' => $wallet->avail_balance,
            'avail_balance' => $newWallet
        ]);
    }

    // public function bizSort(Request $request, $name)
    // {

    //     // dd($name);
    //     if ($request->sort == 'success') {
    //         $user = User::where('id', auth()->user()->id)->first();
    //         $slug = Verification::where(['slug' => $name])->first();
    //         $data['slug'] = Verification::where(['slug' => $name])->first();
    //         $data['success'] = BusinessVerification::where(['status' => 'successful', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
    //         $data['failed'] = BusinessVerification::where(['status' => 'failed', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
    //         $data['pending'] = BusinessVerification::where(['status' => 'pending', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
    //         $data['fields'] = FieldInput::where(['slug' => $slug->slug])->get();
    //         $data['wallet'] = Wallet::where('user_id', $user->id)->first();
    //         $data['logs'] = BusinessVerification::where(['user_id' => auth()->user()->id, 'status' => 'successful'])->get();
    //     }
    //     if ($request->sort == 'failed') {
    //         $user = User::where('id', auth()->user()->id)->first();
    //         $slug = Verification::where(['slug' => $name])->first();
    //         $data['slug'] = Verification::where(['slug' => $name])->first();
    //         $data['success'] = BusinessVerification::where(['status' => 'successful', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
    //         $data['failed'] = BusinessVerification::where(['status' => 'failed', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
    //         $data['pending'] = BusinessVerification::where(['status' => 'pending', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
    //         $data['fields'] = FieldInput::where(['slug' => $slug->slug])->get();
    //         $data['wallet'] = Wallet::where('user_id', $user->id)->first();
    //         $data['logs'] = BusinessVerification::where(['user_id' => auth()->user()->id, 'status' => 'failed'])->get();
    //     }
    //     if ($request->sort == 'pending') {
    //         $user = User::where('id', auth()->user()->id)->first();
    //         $slug = Verification::where(['slug' => $name])->first();
    //         $data['slug'] = Verification::where(['slug' => $name])->first();
    //         $data['success'] = BusinessVerification::where(['status' => 'successful', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
    //         $data['failed'] = BusinessVerification::where(['status' => 'failed', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
    //         $data['pending'] = BusinessVerification::where(['status' => 'pending', 'verification_id' => $slug->id, 'user_id' => $user->id])->get();
    //         $data['fields'] = FieldInput::where(['slug' => $slug->slug])->get();
    //         $data['wallet'] = Wallet::where('user_id', $user->id)->first();
    //         $data['logs'] = BusinessVerification::where(['user_id' => auth()->user()->id, 'status' => 'pending'])->get();
    //         // dd($data);
    //     }
    //     return view('users.business.index', $data);
    // }

    public function BusinessReport($slug, $verification_id)
    {
        $this->RedirectUser();
        $user = auth()->user();
        if($slug == 'cac'){
            dd( $verification_id);
            $cac_verification = CacVerification::where(['id'=>$verification_id, 'user_id'=>$user->id])->first();
            if($cac_verification){
                return view('users.business.reports.cac_report', ['cac_verification'=>$cac_verification]);
            }
            Session::flash('alert', 'error');
            Session::flash('message', 'Something went wrong, try again');
            return back();

        }elseif($slug == 'tin'){
            $tin_verification = TinVerification::where(['id'=>$verification_id, 'user_id'=>$user->id, 'is_sandbox' => $this->sandbox()])->first();
            if($tin_verification){
                return view('users.business.reports.tin_report', ['tin_verification'=>$tin_verification]);
            }
        }else{

            
            Session::flash('alert', 'error');
            Session::flash('message', 'Something went wrong, try again');
            return back();
        }
    }
}
