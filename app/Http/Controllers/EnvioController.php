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

        $emails = $request['email'];
       foreach ($emails as $i) {
        
            Mail::send('vistaEmail', $request->all(), function ($msg) use ($request,$i) {
                $msg->from("ignatiusceferon@gmail.com");
                $msg->to($i)->subject($request['asunto']);
            });
        }

        return redirect()->back();
    }
}
