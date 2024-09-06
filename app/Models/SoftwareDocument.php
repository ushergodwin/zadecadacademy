<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoftwareDocument extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'program_software_id',
        'document_name',
        'document'
    ];

    public function software()
    {
        return $this->belongsTo(ProgramSoftware::class, 'program_software_id', 'id');
    }
}
