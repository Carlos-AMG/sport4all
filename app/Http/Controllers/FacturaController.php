<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($cliente)
    {
        $facturas = Factura::all()->where('user_id',$cliente->id);
        return view('factura/index_pactura',['facturas' => $facturas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required'
        ]);

        Factura::create($request->all());
        
        return redirect()->route('factura.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        $productos = $factura->productos;

        return view('factura/show_factura',compact('factura','productos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
