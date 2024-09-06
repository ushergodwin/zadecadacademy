<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pg_name',
        'pg_image',
        'description',
        'software'
    ];

    protected $appends = [
        'program_software'
    ];

    public function getProgramSoftwareAttribute()
    {
        return explode(",", $this->software);
    }

    public function soft()
    {
        return $this->hasMany(ProgramSoftware::class, 'program_id', 'id');
    }
}
