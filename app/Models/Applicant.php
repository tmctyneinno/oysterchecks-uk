<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    
    protected $table = 'applicants';
    
    protected $fillable = [
        'status', 'user_id', 'applicantId', 'externalUserId', 'applicantKey', 'inspectionId', 'sourceKey', 'applicant_type', 'companyname', 'companyemail','companyphone', 'firstName', 'lastName', 'middleName', 'email','phone', 'placeofbirth', 'dateofbirth',
        'country', 'countryofbirth', 'gender', 'address', 'registrationnumber', 'companycreateddate', 'companyType', 
        'taxpayer', 'websitelink', 'info', 'companyInfo', 'review', 
    ];
    

    public function getAttemptIdAttribute()
    {
        return $this->review['attemptId'];
    }
    // public function getReviewIdAttribute()
    // {
    //     return $this->review['reviewId'];
    // }

    public function getAttemptCntd()
    {
        return $this->review['attemptCnt'];
    }

    public function getLevelName(){
        return $this->review['levelName'];
    }

    public function getLevelAutoCheckMode(){
        return $this->review['levelAutoCheckMode'];
    }

    public function getReviewStatus(){
        return $this->review['reviewStatus'];
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
   
}

