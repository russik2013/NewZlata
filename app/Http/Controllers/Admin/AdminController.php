<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function store(AdminRequest $request){

        $dispatcher = new User();

        $dispatcher -> fill($request -> all());

        $dispatcher -> email = 'russik';

        $dispatcher -> password = md5($request -> password);

        $dispatcher -> token = str_random(32);

        if($dispatcher -> save()){

            return response(['status' => 'success', 'message' => '', 'data' => $dispatcher]);

        }else return response(['status' => 'server error', 'message' => 'Fuck the laravel', 'data' => null]);

    }

    public function update(AdminRequest $request){

        $dispatcher = User::find($request -> id);

        if( $dispatcher) {

            $token = $dispatcher -> token;

            $dispatcher->fill($request->all());

            if($request -> password){

                $dispatcher -> password = md5($request -> password);

            }

            $dispatcher -> token = $token;

            $dispatcher -> save();

            return response(['status' => 'success', 'message' => '', 'data' => $dispatcher]);

        }

        else return response(['status' => 'server error', 'message' => 'wrong dispatcher id', 'data' => null]);

    }

    public function delete(Request $request){

        $dispatcher = User::find($request -> id);

        if( $dispatcher) {

            $dispatcher -> delete();

            return response(['status' => 'success', 'message' => '', 'data' => null]);

        }

        else return response(['status' => 'server error', 'message' => 'wrong dispatcher id', 'data' => null]);

    }

    public function index(){

        if(User::all())

            return response(['status' => 'success', 'message' => '', 'data' => User::all()]);

        else return response(['status' => 'server error', 'message' => 'Fuck the laravel', 'data' => null]);

    }
}
