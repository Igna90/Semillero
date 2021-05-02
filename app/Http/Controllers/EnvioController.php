<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\User;
use App\Products;

class EnvioController extends Controller
{
    public function index()
    {
        $datos['usuarios'] = User::orderBy('id')->paginate(50);
        $products['productos'] = Products::all();
        return view('correos.index', $datos, $products);
    }

    public function enviarEmail(Request $request)
    {

        $this->validate(
            request(),
            [
                'asunto' => 'required|max:100',
                'mensaje' => 'required|max:500',
                'productos' => 'required|not_in:ninguno',
                'email' => 'required'
            ],
            [
                'asunto.required' => __("Por favor el campo asunto  es requerido"),
                'mensaje.required' => __("Por favor el campo mensaje es requerido"),
                'productos.required' => __("Por favor el campo producto es requerido"),
                'email.required' => __("Por favor elija al menos un email"),
            ]
        );

        $emails = $request['email'];
        foreach ($emails as $i) {

            Mail::send('vistaEmail', $request->all(), function ($msg) use ($request, $i) {
                $msg->from("ignatiusceferon@gmail.com");
                $msg->to($i)->subject($request['asunto']);
            });
        }

        return redirect()->back();
    }
}
