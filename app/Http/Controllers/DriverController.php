<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Http\Requests\DriverRequest;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function store(DriverRequest $request){

        $driver = new Driver();

        $driver -> fill($request -> all());

        $driver -> save();

        return response(['status' => 'success', 'message' => '', 'data' => $driver]);

    }

    public function update(DriverRequest $request){

        $driver = Driver::find($request -> id);

        if($driver){

            $driver -> fill($request -> all());

            $driver -> save();

            return response(['status' => 'success', 'message' => '', 'data' => $driver]);

        }else return response(['status' => 'client error', 'message' => 'driver id', 'data' => null]);

    }

    public function delete($id){

        $driver = Driver::find($id);

        if($driver){

            $driver -> delete();

            return response(['status' => 'success', 'message' => '', 'data' => null]);

        }else return response(['status' => 'client error', 'message' => 'driver id', 'data' => null]);

    }

    public function index(){

        return response(['status' => 'success', 'message' => '', 'data' => Driver::all()]);

    }

    public function show($id){

        $driver = Driver::find($id);

        if($driver){

            return response(['status' => 'success', 'message' => '', 'data' => $driver]);

        }else return response(['status' => 'client error', 'message' => 'driver id', 'data' => null]);

    }

    public function changeStatus($id){

        $driver = Driver::find($id);

        if($driver){

            $driver -> active = abs($driver -> active - 1);

            $driver -> save();

            return response(['status' => 'success', 'message' => '', 'data' => $driver]);

        }else return response(['status' => 'client error', 'message' => 'driver id', 'data' => null]);
    }
}
