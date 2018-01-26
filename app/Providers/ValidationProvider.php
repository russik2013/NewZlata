<?php

namespace App\Providers;

use App\Farm;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidationProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('valid_farm', function ($attribute, $value){

            if(Farm::find($value))
                return  true;
            else return false;

        },'Wrong farm id');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
