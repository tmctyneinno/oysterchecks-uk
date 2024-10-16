<?php 
namespace App\Traits;
use App\Models\ActivityLog;

trait VerifyIndex{
    
    public function IdentityIndex(){
        $data['activity'] = ActivityLog::take(10)->latest()->get();
        $data['activity'] = ActivityLog::take(10)->latest()->get();
        return $data;
    }
 
}

