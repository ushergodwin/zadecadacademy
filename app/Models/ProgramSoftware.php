<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramSoftware extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'program_id',
        'no_of_sessions',
        'fee',
        'add_by',
        'software_name'
    ];
}