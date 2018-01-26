<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [

        'phone','name','car_brand','car_number','car_type','personal_phone','company','coordinates','additional',
        'status','active'

    ];
}

