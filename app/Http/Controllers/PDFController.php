<?php

namespace App\Http\Controllers;

use App\Opinions;
use Illuminate\Http\Request;


class PDFController extends Controller
{

    public function index()
    {
        $datos['opiniones'] = Opinions::orderBy('id')->paginate(50);
        return view('reportes.index', $datos);
    }


    public function PDF(Request $request){

        $this->validate(
            request(),
            [
                'fecha_de' => 'required|date',
                'fecha_a' => 'required|date|after_or_equal:fecha_de',

            ],
            [
                'fecha_de.required' => __("Por favor introduzca una fecha desde"),
                'fecha_a.required' => __("Por favor introduzca una fecha hasta"),
            ]
        );

        $opiniones = Opinions::whereBetween('created_at', array($request->fecha_de, $request->fecha_a))
                                ->get();
                                
        $pdf = \PDF::loadView('prueba', compact('opiniones'),);
       return $pdf->stream('prueba.pdf');

    }
}
