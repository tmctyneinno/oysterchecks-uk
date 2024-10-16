<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdverseMediaCategory extends Model
{
    use HasFactory;

    protected $table = 'adverse_media_categories';
    protected $fillable = ['name'];

}
