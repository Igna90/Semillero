<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;
    
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users->toArray()], $this->successStatus);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
           'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'email_verified_at' => 'required',
            'password' => 'required',
            'activated' => 'required',
            'type' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $users = User::create($input);
        return response()->json(['users' => $users->toArray()], $this->successStatus);
    }
    public function show($id)
    {
        $users = User::find($id);
        if (is_null($users)) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        return response()->json(['users' => $users->toArray()], $this->successStatus);
    }
    public function update(Request $request, User $users)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'email_verified_at' => 'required',
            'password' => 'required',
            'activated' => 'required',
            'type' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $users->name = $input['name'];
        $users->img = $input['img'];
        $users->how_to_use = $input['how_to_use'];
        $users->save();
        return response()->json(['users' => $users->toArray()], $this->successStatus);
    }
    public function destroy(User $users)
    {
        $users->delete();
        return response()->json(['users' => $users->toArray()], $this->successStatus);
    }
}
