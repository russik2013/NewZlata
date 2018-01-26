<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FarmPoint extends Model
{
    protected $fillable = ['address', 'receiver', 'sender', 'farm_id'];
}
