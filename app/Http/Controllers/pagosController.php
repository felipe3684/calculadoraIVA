<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pagosController extends Controller
{
    //VER PAGOS
    //visualizar los pagos
    public function verPagos(){
    $pagos =DB::table('pagos')->select([
    'id','concepto','cantidad','iva','tIva','total'
    ])->orderBy('id','desc')->limit('10')->get();

    $totalCantidad = DB::table('pagos')->sum('cantidad');
    $totalIva = DB::table('pagos')->sum('tIva');
    $totalPagos = DB::table('pagos')->sum('total');

    return view('verpagos',[
        "pagos" => $pagos,
        "cantidadT"=> $totalCantidad,
        "ivaTotal" => $totalIva,
        "pagoTotal"=> $totalPagos,
    ]);
    }


    //ver formulario para crear pagos
    public function index(){
        return view('calcular');
    }

    //CREAR PAGOS
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


        return redirect()->route('pagos.index')->with("message","Pago realizado con éxito");

    }

    //Eliminar Pagos
    public function deletePago(Request $request){



    $pagobool = DB::table("pagos")->where("id","=",$request->id)->delete();

    return redirect()->route('pagos.index');
    }
}
