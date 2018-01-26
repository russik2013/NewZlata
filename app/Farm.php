<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    protected $fillable = ['name', 'leather_face', 'phone', 'description'];

    public function points(){

        return $this->hasMany('App\FarmPoint', 'farm_id', 'id');

    }
}
