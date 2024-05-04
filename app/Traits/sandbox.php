<?php 
namespace App\Traits;
use App\Models\{User};

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
        return $reqUrl;
    }

    public function SecretKey(){
        $secretKey= 'kQYTcpGXGoQmdcY73Hr6UJOl0QjEoFJ1';
        return $secretKey;
    } 

    public function ReqToken(){
        $reqToken= 'sbx:srabCyZTWuBNb7qh94UXKZHa.TLKbuhsxQ3lFitPWpHrBGFQQ3s1wz17D';
        return $reqToken;
    } 

    
}