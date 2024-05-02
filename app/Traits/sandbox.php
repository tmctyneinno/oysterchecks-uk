<?php 
namespace App\Traits;
use App\Models\{User};
use GuzzleHttp;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use RuntimeException;

trait sandbox{
    public function sandbox(){
        $user = User::where('id', auth()->user()->id)->first();
        if($user->client->is_activated == 0){
            $sandbox = 0;
        }else{
            $sandbox = 1;
        }
        return $sandbox;
    }

public function ReqUrl(){
    $reqUrl = 'https://api.sumsub.com/resources/';
    // $user = User::where('id', auth()->user()->id)->first();
    // if($user->client->is_activated == 0){
    //     $reqUrl = 'https://api.sumsub.com/resources/';
    // }else{
    //     $reqUrl = 'https://api.sumsub.com/resources/';
    // }
    return $reqUrl;
}

    public function SecretKey(){
        $secretKey= 'kQYTcpGXGoQmdcY73Hr6UJOl0QjEoFJ1';
        return $secretKey;
    } 

    public function ReqToken(){
        $reqToken= 'sbx:srabCyZTWuBNb7qh94UXKZHa.TLKbuhsxQ3lFitPWpHrBGFQQ3s1wz17D';
        // $user = User::where('id', auth()->user()->id)->first();
        // if($user->client->is_activated == 0){
        //     $reqToken= 'sbx:gEnCG9V8NfxrzT8KTqOLnzti.HsjBSHlro10eAFhYNgd9eFLvaNOivbMX';
        // }else{
        //     $reqToken = 'sbx:gEnCG9V8NfxrzT8KTqOLnzti.HsjBSHlro10eAFhYNgd9eFLvaNOivbMX';
        // }
        return $reqToken;
    } 

    

public function PaymentToken(){
    $user = User::where('id', auth()->user()->id)->first();
    if($user->client->is_activated == 0){
        $data['secret'] = config('app.PAYSTACK_LIVE_SEC');
        $data['public'] = config('app.PAYSTACK_LIVE_PUB');
    }else{
        $data['secret'] = config('app.PAYSTACK_TESTSECRET_KEY');
        $data['public'] = config('app.PAYSTACK_TESTPUBLIC_KEY');
    }
    return $user;
}
}