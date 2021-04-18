<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Likes;
use App\Opinions;
use Validator;

class LikesController extends Controller
{
    public $successStatus = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'opinion_id' => 'required',
            'user_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $opinion_id = $request->input('opinion_id');
        $opinion = Opinions::find($opinion_id);
        $opinion->num_likes += 1;
        $opinion->save();
        

        $like = Likes::create($input);
        return response()->json(['success' => true, 'data' => $like, $opinion->toarray()], $this->successStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Likes $like, Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'opinion_id' => 'required',
            'user_id' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $opinion_id = $request->input('opinion_id');
        $opinion = Opinions::find($opinion_id);
        $opinion->num_likes -= 1;
        $opinion->save();
        
        $like->delete();
        return response()->json(['likes' => $like,$opinion->toArray()], $this->successStatus);
    }
}
