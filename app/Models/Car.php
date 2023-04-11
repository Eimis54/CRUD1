<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Car extends Model
{
    use HasFactory;

    public function owner(){
        return $this->belongsTo(Owner::class);
    }
    public function images(){
        return $this->hasMany(Images::class);
    }
    public function scopeFilter(Builder $query, $filter){
        if ($filter->reg_number!=null){
            $query->where('reg_number',$filter->reg_number);
        }
        if ($filter->brand!=null){
            $query->where('brand','like',"%$filter->brand%");
        }
        if ($filter->model!=null){
            $query->where('model','like',"%$filter->model%");
        }
    }
    public function scopeYear(Builder $query, $reg_number){
        $query->where('reg_number',$reg_number);
    }
}
