<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();

        $campos= Schema::getColumnListing('usuarios');
        return view("instituto.usuarios.listado",compact("usuarios","campos"));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getProfesores(Request $request){
        $usuarios= User::profesores()->get();
        $campos=$usuarios->first()->getFillable();
        return view("instituto.usuarios.listado",compact("usuarios","campos"));




    }
    public function getAlumnos(Request $request){
        $usuarios= User::alumnos()->get();
        $campos=$usuarios->first()->getFillable();
        return view("instituto.usuarios.listado",compact("usuarios","campos"));




    }
}
