<?php
use App\Models\User;
use App\Models\Client;



        function UserEnvironment(){
            $user = User::where('id', auth()->user()->id)->first();
            if($user->client->is_activated == 1){
            return true;
            }
            return false;
        }

        if(!function_exists('client_id')){
            function client_id(){
                $auth = User::where('id', auth()->user()->id)->first();
               return $auth->client->id;
            }

        }
    










