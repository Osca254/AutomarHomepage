<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'model', 'design', 'brand', 'performance'];

    public function carImages()
    {
        return $this->hasMany(CarImage::class,  'car_id');
    }
}
