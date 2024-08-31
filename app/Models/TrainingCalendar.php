<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingCalendar extends Model
{
    use HasFactory;

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
