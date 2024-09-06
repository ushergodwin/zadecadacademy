<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingCalendar extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_id',
        'start_date',
        'start_time',
        'end_time',
        'end_date',
        'location'
    ];

    public function course()
        {
            return $this->belongsTo(Course::class);
        }

}
