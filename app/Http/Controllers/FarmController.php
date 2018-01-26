<?php

namespace App\Http\Controllers;

use App\Farm;
use App\Http\Requests\FarmRequest;
use Illuminate\Http\Request;

class FarmController extends Controller
{
    public function store(FarmRequest $request){

        $farm = new Farm();

        $farm -> fill($request -> all());

        $farm -> save();

        return response(['status' => 'success', 'message' => '', 'data' => $farm]);

    }

    public function update(FarmRequest $request){

        $farm = Farm::find($request -> id);

        if($farm){

            $farm -> fill($request -> all());

            $farm -> save();

            return response(['status' => 'success', 'message' => '', 'data' => $farm]);

        }else return response(['status' => 'client error', 'message' => 'farm id', 'data' => null]);
    }

    public function delete($id){

        $farm = Farm::find($id);

        if($farm){

            $farm -> delete();

            return response(['status' => 'success', 'message' => '', 'data' => $farm]);

        }else return response(['status' => 'client error', 'message' => 'farm id', 'data' => null]);

    }

    public function show($id){

        $farm = Farm::with('points')->find($id);

        if($farm){

            return response(['status' => 'success', 'message' => '', 'data' => $farm]);

        }else return response(['status' => 'client error', 'message' => 'farm id', 'data' => null]);

    }

    public function index(){

        return response(['status' => 'success', 'message' => '', 'data' => Farm::with('points') -> get()]);

    }
}
