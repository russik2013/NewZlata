<?php

namespace App\Http\Controllers;

use App\FarmPoint;
use App\Http\Requests\FarmPointRequest;
use Illuminate\Http\Request;

class FarmPointController extends Controller
{
    public function store(FarmPointRequest $request){

        $farmPoint = new FarmPoint();

        $farmPoint -> fill($request -> all());

        $farmPoint -> save();

        return response(['status' => 'success', 'message' => '', 'data' => $farmPoint]);

    }

    public function update(FarmPointRequest $request){

        $farmPoint = FarmPoint::find($request -> id);

        if($farmPoint){

            $farmPoint -> fill($request -> all());

            $farmPoint -> save();

            return response(['status' => 'success', 'message' => '', 'data' => $farmPoint]);

        }else return response(['status' => 'client error', 'message' => 'wrong farm point id', 'data' => null]);

    }

    public function delete($id){

        $farmPoint = FarmPoint::find($id);

        if($farmPoint){

            $farmPoint -> delete();

            return response(['status' => 'success', 'message' => '', 'data' => null]);

        }else return response(['status' => 'client error', 'message' => 'wrong farm point id', 'data' => null]);

    }

    public function index(){

        return response(['status' => 'success', 'message' => '', 'data' => FarmPoint::all()]);

    }

    public function sender(Request $request){

        return response(['status' => 'success', 'message' => '', 'data' => FarmPoint::where("farm_id", $request -> farm_id) -> where('sender', 1) -> get()]);

    }

    public function receiver(Request $request){

        return response(['status' => 'success', 'message' => '', 'data' => FarmPoint::where("farm_id", $request -> farm_id) -> where('receiver', 1) -> get()]);

    }

    public function show($id){
        $farmPoint = FarmPoint::find($id);

        if($farmPoint){

            return response(['status' => 'success', 'message' => '', 'data' => $farmPoint ]);

        }else return response(['status' => 'client error', 'message' => 'wrong farm point id', 'data' => null]);
    }

}
