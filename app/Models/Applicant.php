<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    
    protected $table = 'applicants';
    
    protected $fillable = [
        'user_id', 'applicantId', 'externalUserId', 'applicantKey', 'inspectionId', 'sourceKey', 'applicant_type', 'companyname', 'firstName', 'lastName', 'middleName', 'email','phone', 'placeofbirth', 'dateofbirth',
        'country', 'countryofbirth', 'gender', 'address', 'registrationnumber', 'companycreateddate', 'companyType', 'taxpayer', 'websitelink', 'info', 'companyInfo', 'review'
    ];
    
   
}

