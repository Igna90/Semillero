<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class RegisterController extends Controller
{
    public $successStatus = 200;
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'surname' => 'required|max:100',
            'email' => 'required|max:100|email',
            'email_verified_at' => 'required|max:100|email',
            'password' => 'required|max:100',
            'activated' => 'required',
            'type' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        return response()->json(['success' => $success], $this->successStatus);
    }
    public function login()
    {
        // Si las credenciales son correctas
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            // Creamos un token de acceso para ese usuario
            $success['token'] = $user->createToken('MyApp')->accessToken;
            // Y lo devolvemos en el objeto 'json'
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'No estás autorizado'], 401);
        }
    }
}
