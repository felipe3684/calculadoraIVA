<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pagosController extends Controller
{

    //visualizar los pagos
    public function verPagos(){
    $pagos =DB::table('pagos')->select([
    'id','concepto','cantidad','iva','tIva','total'
    ])->orderBy('id','desc')->get();

    return view('verpagos',[
        "pagos" => $pagos,
    ]);
    }

    //ver formulario para crear pagos
    public function index(){
        return view('calcular');
    }
    //persistencia del formulario para crear pagos
    public function calcularConIva(Request $request){

     $request->validate([
        'concepto' => 'required|string|min:3|max:30',
        'cantidad' => 'required|numeric|min:0',
        'iva' => 'required|numeric',
     ]);
        $concepto= $request->concepto;
        $cantidad = $request->cantidad;


        $iva = $request->iva;
        $ivaDecimal= $iva/100;
        $tIva =$cantidad* $ivaDecimal;
        $resultado = $cantidad+ $tIva;

        DB::table('pagos')->insert([
            "concepto" => (string) $concepto,
            "cantidad" => (float) $cantidad,
            "iva" => (integer) $iva,
            "tIva" => (float) $tIva,
            "total" => (float) $resultado,
            "created_at" => now(),
            "updated_at" => now(),
        ]);

        //Formato para mostrar correctamente en vista en €
        $cantidadF = number_format($cantidad,2,',','.');
        $tIvaF = number_format($tIva,2,',','.');

        $resultadoF= number_format($resultado,2,',','.');
        return view('calcular',[
            'concepto' => $concepto,
            'res'=>$resultadoF,
            'cantidad' => $cantidadF,
            'iva' => $tIvaF]);

    }
}
