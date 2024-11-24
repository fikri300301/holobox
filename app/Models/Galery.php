<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galery extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'galeries';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}