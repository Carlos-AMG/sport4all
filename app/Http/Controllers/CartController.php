<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Cart;
use App\Models\Detalle_Factura;
use App\Models\Factura;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Models\Compra; 
use Barryvdh\DomPDF\PDF;


class CartController extends Controller
{

    public function addToCart(Request $request, Producto $product){
        // Define las reglas de validación
        $rules = [
            'cantidad' => 'required|numeric|min:1',
        ];
    
        // Crea una instancia del validador
        $validator = Validator::make($request->all(), $rules);
    
        // Verifica si la validación falla
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Obtiene la cantidad del request
        $quantity = intval($request->input('cantidad'));
    
        // Verifica si la cantidad solicitada existe en la base de datos
        if ($quantity > $product->existencia) {
            $validator->errors()->add('cantidad', 'La cantidad solicitada supera la existencia disponible.');
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Obtiene el usuario autenticado o un identificador de invitado
        $user = Auth::user();
    
        // Si el usuario no está autenticado, usa un identificador de invitado
        if (!$user) {
            $user = ['id' => session()->getId()];
        }
    
        $cartItem = Cart::where('user_id', $user->id)->where('producto_id', $product->id)->first();
    
        if ($cartItem) {
            // Incrementa la cantidad si el producto ya está en el carrito
            if ($cartItem->quantity + $quantity > $product->existencia) {
                $validator->errors()->add('cantidad', 'La cantidad solicitada en el carrito supera la existencia disponible.');
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $cartItem->update(['quantity' => $cartItem->quantity + $quantity]);
        } else {
            // Agrega un nuevo elemento al carrito con la cantidad especificada
            Cart::create([
                'user_id' => $user->id,
                'producto_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }
    
        return redirect()->route('producto.index')->with('success', ('Producto '. $product->nombre .' agregado al carrito.'));
    }

    public function viewCart()
    {
        $user = Auth::user();

        // Si el usuario no está autenticado, usa un identificador de invitado
        if (!$user) {
            $user = ['id' => session()->getId()];
        }

        $cartItems = Cart::all()->where('user_id', $user->id);
        $ultimaCompra = Compra::withTrashed()->first();
        $ivaCompra = $ultimaCompra ? $ultimaCompra->iva : 0;

        // Calcular el total
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->quantity * $item->producto->precio;
        }

        // Calcular el IVA y el total con IVA
        $iva = ($total * $ivaCompra) / 100;
        $totalConIva = $total + $iva;

        return view('carrito/index_carrito', compact('cartItems', 'totalConIva', 'ivaCompra', 'total', 'iva'));
    }

    public function pay(){
        $user = Auth::user();
        
        $fechaActual = Carbon::now();
    
        // Puedes formatear la fecha según tus necesidades
        $fechaFormateada = $fechaActual->format('Y-m-d');
        
        $cartItems = Cart::all()->where('user_id', $user->id);
        
        $factura = new Factura();
        $ultimaCompra = Compra::withTrashed()->first();
        $factura->user_id = $user->id;
        $factura->fecha = $fechaFormateada;
        $factura->iva = $ultimaCompra ? $ultimaCompra->iva : 0;
    
        $factura->save();
    
        $totalCost = 0; // To calculate the total cost
    
        foreach($cartItems as $item){
            $detalle = new Detalle_Factura();
            $product = $item->producto;
    
            $detalle->factura_id = $factura->id;
            $detalle->producto_id = $item->producto_id;
            $detalle->cantidad = $item->quantity;
            $detalle->precio = $item->producto->precio;
            
            // Calculate the total cost for each item
            $totalCost += $item->quantity * $item->producto->precio;
    
            $product->existencia -= $item->quantity;
    
            if($product->existencia == 0){
                $product->delete();
            }
            else{
                $product->save();
            }
    
            $detalle->save();
            $item->delete();
        }    
        // $pdf->download($pdfFileName);
        // return $pdf->download($pdfFileName);
    
        return redirect()->route('factura');
    }

    public function descargarFactura(){
        $pdf = session('pdf');
    
        // Puedes realizar cualquier lógica adicional aquí antes de descargar el PDF
    
        return $pdf;
    }
    
}
