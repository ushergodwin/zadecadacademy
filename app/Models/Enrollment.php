<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'program_software',
        'firstname',
        'lastname',
        'email',
        'phone',
        'whatsapp',
        'gender',
        'country',
        'enrollment_date',
        'occupation',
        'field_of_study',
        'company',
        'mode_of_class',
        'time_for_class'
    ];

    protected $appends = [
        'program_fees',
        'software'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id', 'id');
    }

    public function getProgramFeesAttribute()
    {
        return ProgramSoftware::whereIn('software_name', explode(",", $this->program_software))->sum('fee');
    }

    public function getSoftwareAttribute()
    {
        return explode(",", $this->program_software);
    }
}
