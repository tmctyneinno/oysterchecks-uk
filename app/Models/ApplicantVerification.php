<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantVerification extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'client_id', 'review', 'reviewId', 'info', 'companyInfo', 'fixedInfo', 'requiredIdDocs',  'status', 'QA_review', 'is_adminReview'
    ];
   
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    
}