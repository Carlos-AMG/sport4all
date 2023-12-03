<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamentos = Departamento::all();

        return view('departamento/index_departamento',['departamentos'=>$departamentos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departamento/create_departamento');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        Departamento::create($request->all());

        Session::flash('success', "Departamento '{$request->nombre}' creado con exito!");
        return redirect()->route('departamento.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Departamento $departamento)
    {
        return view('departamento/show_departamento',compact('departamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departamento $departamento)
    {
        return view('departamento/edit_departamento',compact('departamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departamento $departamento)
    {
        $request -> validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);

        Departamento::where('id',$departamento->id)->update($request->except('_token','_method'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return redirect()->route('departamento.index');
    }
}
