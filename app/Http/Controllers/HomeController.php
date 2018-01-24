<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function auth(Request $request){

        $user = User::where('phone',$request -> phone_number) -> where('password', bcrypt($request -> password)) -> first();
        if($user)
            return response(['status' => 'success', 'message' => '', 'data' => $user]);
        else
            return response(['status' => 'server error', 'message' => 'wrong login or password', 'data' => null]);

    }

}
