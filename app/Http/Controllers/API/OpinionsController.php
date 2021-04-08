<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Opinions;
use Validator;

class OpinionsController extends Controller
{
    public $successStatus = 200;
    public function index()
    {
        $opinions = Opinions::all();
        return response()->json(['opinions' => $opinions->toArray()], $this->successStatus);
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
        $opinions = Opinions::create($input);
        return response()->json(['opinions' => $opinions->toArray()], $this->successStatus);
    }
    public function show($id)
    {
        $opinions = Opinions::find($id);
        if (is_null($opinions)) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        return response()->json(['opinions' => $opinions->toArray()], $this->successStatus);
    }
    public function update(Request $request, Opinions $opinions)
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
        $opinions->plague_id = $input['plague_id'];
        $opinions->headline = $input['headline'];
        $opinions->description = $input['description'];
        $opinions->num_likes = $input['num_likes'];
        $opinions->save();
        return response()->json(['opinions' => $opinions->toArray()], $this->successStatus);
    }
    public function destroy(Opinions $opinion)
    {
        $opinion->delete();
        return response()->json(['opinions' => $opinion->toArray()], $this->successStatus);
    }

}
