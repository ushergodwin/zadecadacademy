<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GallerySection extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['section_name'];

    public function images()
    {
        return $this->hasMany(Gallery::class, 'section_id', 'id');
    }
}
