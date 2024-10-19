<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_name',
        'office_address',
        'office_po_box',
        'office_email',
        'office_line1',
        'office_line2',
        'office_line3'
    ];
}
