<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'img_url'];

    // Accessor created_at
    public function getCreatedAtAttribute($value) {
        $date = new Carbon($value);
        return $date->format('d F Y');
    }
}
