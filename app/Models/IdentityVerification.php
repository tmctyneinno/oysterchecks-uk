<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentityVerification extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'user_id',
        'applicantId',
        'sourceKey',
        'externalUserId',
        'content',
        'country',
        'documentType',
        'documentSubType',
        'firstName',
        'lastName',
        'middleName',
        'issuedDate',
        'validUntil',
        'docNumber',
        'dob',
        'placeOfBirth',
    ];

   
}
