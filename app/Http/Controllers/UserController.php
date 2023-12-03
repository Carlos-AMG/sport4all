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

    public function descargar_factura(Factura $factura){
        // Obtén los detalles de la factura
        // $detallesFactura = Detalle_Factura::where('factura_id', $factura->id)->get();
        // $detallesFactura = Detalle_Factura::with('producto')->where('factura_id', $factura->id)->get();

        $totalCost = 0;
        $cartItems = [];
        
        foreach ($factura->productos as $producto) {
            // dd($producto);
            $cartItems[] = [
                'producto' => $producto, // Almacena el objeto Producto completo
                'cantidad' => $producto->pivot->cantidad,
                'precio' => $producto->precio,
                'subtotal' => $producto->pivot->cantidad * $producto->precio,
            ];            
            $totalCost += $producto->pivot->cantidad * $producto->precio;
        }

        $data = [
            'precio' => $totalCost,
            'fecha' => $factura->fecha,
            'cartItems' => $cartItems,
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
