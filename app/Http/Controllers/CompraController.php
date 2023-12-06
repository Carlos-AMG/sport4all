<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Producto;
use App\Models\Marcas;
use App\Models\Compra;
use App\Models\DetalleCompra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras = Compra::all()->reverse();
        return view('compra/index_compra',['compras' => $compras]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departamentos = Departamento::all();
        $marcas = Marcas::all(); // Agrega esta línea
        return view('compra/create_compra',['departamentos'=>$departamentos, 'marcas' => $marcas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validaciones
        $request->validate([
            'fecha' => 'required|date',
            'proveedor' => 'required|string',
            'iva' => 'required|numeric|min:0',
            'productos' => 'required|array',  // El campo productos debe ser un array
            'productos.*.nombre' => 'required|string',
            'productos.*.cantidad' => 'required|integer|min:1',
            'productos.*.precio_unitario' => 'required|numeric|min:0',
            'productos.*.marca' => 'required|exists:marcas,id',
            'productos.*.departamento' => 'required|exists:departamentos,id',
        ]);

        // Crear la compra
        $compra = Compra::create([
            'fecha' => $request->fecha,
            'proveedor' => $request->proveedor,
            'iva' => $request->iva,
            // Otros campos de compra, si los tienes
        ]);

        // Detalles de productos
        foreach ($request->productos as $productoData) {
            // Encuentra o crea el producto basado en el nombre
            $producto = Producto::firstOrCreate([
                'nombre' => $productoData['nombre'],
                'existencia' => $productoData['cantidad'], // Considera cómo gestionar la existencia
                'precio' => $productoData['precio_unitario'] * 1.2, // Precio un 20% más alto
                'descripcion' => '', // Agrega la descripción si la tienes
                'imagen' => '', // Agrega la imagen si la tienes
                'departamento_id' => $productoData['departamento'],
                'marca_id' => $productoData['marca'],
                // Otros campos del producto, si los tienes
            ]);

            $subtotal = $productoData['cantidad'] * $productoData['precio_unitario'] *  (1 + $request->iva / 100);
            // Crea el detalle de compra con el producto asociado
            DetalleCompra::create([
                'compra_id' => $compra->id,
                'producto_id' => $producto->id,
                'cantidad' => $productoData['cantidad'],
                'precio_unitario' => $productoData['precio_unitario'],
                'subtotal' => $subtotal,
                // Otros campos de detalles de compra, si los tienes
            ]);
        }

        // Puedes agregar lógica adicional, redireccionar a una vista, etc.
        Session::flash('success', 'La compra se registro correctamente');
        return redirect()->route('compra.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Compra $compra)
    {
        return view('compra/show_compra',compact('compra'));
 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compra $compra)
    {
        //
    }
}
