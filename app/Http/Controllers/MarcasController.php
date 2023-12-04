<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marcas::all();
        return view('marcas/index_marcas', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marcas/create_marcas'); // Mostrar formulario de creación
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:marcas,nombre',
            'descripcion' => 'required',
        ]);

        Marcas::create($request->all());

        return redirect()->route('marcas.index')->with('success', 'Marca agregada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marcas $marcas)
    {
        // Puedes implementar lógica específica para mostrar una marca individual si es necesario.
        return view('marcas.show', compact('marcas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marcas $marcas)
    {
        return view('marcas.edit', compact('marcas')); // Puedes crear una vista edit_marcas.blade.php si es necesario
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marcas $marcas)
    {
        $request->validate([
            'nombre' => 'required|unique:marcas,nombre,' . $marcas->id,
            'descripcion' => 'required',
        ]);

        $marcas->update($request->all());

        return redirect()->route('marcas.index')->with('success', 'Marca actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marcas $marcas)
    {
        $marcas->delete();

        return redirect()->route('marcas.index')->with('success', 'Marca eliminada exitosamente.');
    }
}
