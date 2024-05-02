<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;
    
    protected $table = 'applicants';
    
    protected $fillable = [
        'user_id', 'applicant_type', 'companyname', 'firstName', 'lastName', 'middleName', 'email','phone', 'placeofbirth', 'dateofbirth',
        'country', 'countryofbirth', 'gender', 'address', 'registrationnumber', 'companycreateddate', 'companyType', 'taxpayer', 'websitelink'
    ];
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}

// Document model
class Document extends Model
{
    protected $fillable = ['image','documentType', 'country']; // Add other document fields

    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
}
