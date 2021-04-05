<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Plagues;
use Validator;

class PlaguesController extends Controller
{
    public $successStatus = 200;
    public function index()
    {
        $plagues = Plagues::all();
        return response()->json(['plagues' => $plagues->toArray()], $this->successStatus);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'plague_id' => 'required',
            'headline' => 'required',
            'description' => 'required',
            'num_likes' => 'required'

        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $plagues = Plagues::create($input);
        return response()->json(['plagues' => $plagues->toArray()], $this->successStatus);
    }
    public function show($id)
    {
        $plagues = Plagues::find($id);
        if (is_null($plagues)) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        return response()->json(['plagues' => $plagues->toArray()], $this->successStatus);
    }
    public function update(Request $request, Plagues $plagues)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'plague_id' => 'required',
            'headline' => 'required',
            'description' => 'required',
            'num_likes' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $plagues->plague_id = $input['plague_id'];
        $plagues->headline = $input['headline'];
        $plagues->description = $input['description'];
        $plagues->num_likes = $input['num_likes'];
        $plagues->save();
        return response()->json(['plagues' => $plagues->toArray()], $this->successStatus);
    }
    public function destroy(Plagues $plagues)
    {
        $plagues->delete();
        return response()->json(['plagues' => $plagues->toArray()], $this->successStatus);
    }
}
