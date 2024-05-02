<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantFieldInput extends Model
{
    use HasFactory;

    protected $table='applicants_field_inputs';

    protected $fillable = ['slug','name','placeholder','type','is_required','label','inputid'];
}
