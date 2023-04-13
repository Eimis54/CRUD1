<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use HasFactory;

    protected $fillable=['image','car_id'];

    protected $table='cars_image';

    public function car(){
        return $this->belongsTo((Car::class));
    }
}
