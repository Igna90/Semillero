<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Opinions;

class PlaguesOpinions extends Controller
{
    public $successStatus = 200;


    public function index()
    {
        
    }

    public function show($id)
    {
        $opinions = Opinions::where('plague_id', $id)->get();
        if (is_null($opinions)) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        return response()->json(['opinions' => $opinions->toArray()], $this->successStatus);
    }
}
