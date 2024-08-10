<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'program', 
        'firstname', 
        'lastname', 
        'phone', 
        'whatsapp', 
        'gender', 
        'country', 
        'date_added', 
        'occupation', 
        'field_of_study', 
        'company', 
        'mode_of_class', 
        'time_for_class'
    ];
}
