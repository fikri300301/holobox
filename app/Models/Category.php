<?php

namespace App\Models;

use App\Models\Galery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function paket()
    {
        return $this->hasMany(paket::class, 'category_id', 'id');
    }

    public function galery()
    {
        return $this->hasMany(Galery::class, 'category_id', 'id');
    }
}