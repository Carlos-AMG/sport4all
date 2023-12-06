<?php

namespace App\Http\Controllers;

use App\Models\Detalle_Factura;
use App\Models\Factura;
use App\Models\Producto;
use Database\Seeders\DetalleFacturaSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $productos = Producto::all();
        return view('producto/index_producto',['productos'=>$productos]);
    }
    public function facturas(){
        $user = Auth::user();
        $facturas = Factura::all()->where('user_id',$user->id);
        
        return view('factura/index_factura',['facturas'=>$facturas]);
    }

    public function descargar_factura(Factura $factura)
    {
        $data = [
            'factura' => $factura,
        ];

        $pdf = \PDF::loadView('factura_pdf', $data);

        $timestamp = now()->timestamp;
        $pdfFileName = 'factura_' . $timestamp . '.pdf';

        // Descarga el PDF
        return $pdf->download($pdfFileName);
    }

    public function  mostrar_facturas(){
        $user = Auth::user();
        $facturas = Factura::all()->where('user_id', $user->id);
        return view('factura/index_factura',['facturas' => $facturas]);
    }
    public function show(Factura $factura)
    {
        return view('factura/show_factura',compact('factura'));
    }
    public function profile(){
        $user = Auth::user();
        return view('user/profile',['user'=>$user]);
    }

}
