<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'username', 
        'email', 
        'password', 
        'reset_code', 
        'status', 
        'phone', 
        'names', 
        'male'
    ];
}
