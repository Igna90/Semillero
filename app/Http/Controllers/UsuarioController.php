<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datos['usuarios'] = User::orderBy('id')->paginate(10);

        return view('usuarios.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            request(),
            [
                'name' => 'required|max:100',
                'surname' => 'required|max:500',
                'email' => 'required|max:100|email',
                'email_verified_at' => 'required|max:100|email',
                'password' => 'required|max:100',
                'activated' => 'required',
                'type' => 'required',
            ],
            [
                'name.required' => __("Por favor el campo nombre  es requerido"),
                'surname.required' => __("Por favor el campo de apellido es requerido"),
                'email.required' => __("Por favor el campo email es requerido"),
                'email_verified_at.required' => __("Por favor el campo de email es requerido"),
                'password.required' => __("Por favor el campo contraseña  es requerido"),
                'activated.required' => __("Por favor el campo activacion  es requerido"),
                'type.required' => __("Por favor el campo nombre del ciclo es requerido"),
            ]
        );
        User::create([
            'name' => $request['name'],
            'surname' => $request['surname'],
            'email'=> $request['email'],
            'email_verified_at'=> $request['email_verified_at'],
            'password'=> bcrypt($request['password']),
            'activated' => $request['activated'],
            'type'=> $request['type'],
 
        ]);
        return redirect()->route('usuario.index');
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
        $usuario = User::findOrfail($id);
        return view('usuarios.edit', compact('usuario'));
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
        $this->validate(
            request(),
            [
                'name' => 'required|max:100',
                'surname' => 'required|max:100',
                'email' => 'required|max:100|email',
                'email_verified_at' => 'required|max:100|email',
                'password' => 'required|max:100',
                'activated' => 'required',
                'type' => 'required',
            ],
            [
                'name.required' => __("Por favor el campo nombre  es requerido"),
                'surname.required' => __("Por favor el campo de apellido es requerido"),
                'email.required' => __("Por favor el campo email es requerido"),
                'email_verified_at.required' => __("Por favor el campo de email es requerido"),
                'password.required' => __("Por favor el campo contraseña  es requerido"),
                'activated.required' => __("Por favor el campo activacion  es requerido"),
                'type.required' => __("Por favor el campo tipo de usuario es requerido"),
            ]
        );
        
        $datosUsuario = request()->except(['_token', '_method']);
        User::where('id', '=', $id)->update($datosUsuario);
        return redirect('usuario');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datosUsuario = request()->except(['_token', '_method']);
        User::where('id', '=', $id)->delete($datosUsuario);
        return redirect('usuario');

    }
}