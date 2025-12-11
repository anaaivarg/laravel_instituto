<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use Illuminate\Support\Facades\Schema;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        $campos = Schema::getColumnListing('alumnos');
        return view("alumnos.listado", compact('alumnos','campos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        $datos_alumnos = $request->input();
        Alumno::create($datos_alumnos);
        return redirect()->route('alumnos.index');






    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        $datos_alumnos = $request->input();
        $alumno->update($datos_alumnos);
        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        $alumnos = Alumno::all();
        $campos = Schema::getColumnListing('alumnos');
        return view("alumnos.listado", compact('alumnos','campos'));
    }
}
