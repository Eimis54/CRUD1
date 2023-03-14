<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Owner extends Model
{
    use HasFactory;
    public function car(){
        return $this->hasMany(Car::class);
    }
    public function scopeFilter(Builder $query, $filter){
        if ($filter->name!=null){
            $query->where('name','like',"%$filter->name%");
        }
        if ($filter->surname!=null){
            $query->where('surname','like',"%$filter->surname%");
        }
        if ($filter->years!=null){
            $query->where('years',$filter->years);
        }
    }
    public function scopeYear(Builder $query, $years){
        $query->where('years',$years);
    }
}
