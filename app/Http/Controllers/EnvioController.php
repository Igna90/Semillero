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

    public function enviarEmail(Request $request){
   
    $data = [
            'emailto' => "ignacastrisa@gmail.com",
            ];
            
    Mail::send('vistaEmail', $request->all(), function($message) use($data,$request){
        $message->from("ignatiusceferon@gmail.com");
        $message->to($data['emailto'])->subject($request['asunto']);
    });
    return redirect()->back();
}
       

}
