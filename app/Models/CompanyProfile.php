<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'background_statement',
        'background_statement_photo',
        'vision_statement',
        'vision_statement_photo',
        'mission_statement',
        'mission_statement_photo',
        'objectives',
        'objectives_photo',
        'clientele_photo',
        'clientele_content',
        'deliverables_photo',
        'deliverables_content',
    ];

    protected $appends = ['company_objectives'];

    public function getCompanyObjectivesAttribute()
    {
        return json_decode($this->objectives);
    }
}