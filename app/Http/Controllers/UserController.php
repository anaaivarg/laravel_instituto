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

        info ("valor de sesion rol -".session()->get("rol")."-");
        $usuarios = User::with('roles')->paginate(10);

        $campos= Schema::getColumnListing('users');
        return view("instituto.usuarios.listado",compact("usuarios","campos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instituto.usuarios.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $user = User::create($request->all());

        // asignar rol alumno
        $rol = session('rol')??"";
        if ($rol=="alumno") {
            $user->assignRole('alumno');

            return redirect()->route('alumnos.listado');
        }
        else
            return redirect()->route('usuarios.index');


        // ir al listado filtrado de alumnos
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
    public function edit(int $id, Request $request)
    {

       $user = User::find($id)->first();



        return view('instituto.usuarios.edit', compact('user' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::find($id)->first();



        $datos = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'fecha_nacimiento' => 'required|date',
        ]);

        $user->update($datos);
        $rol = session('rol')??"";
        if ($rol=="alumno")
            return redirect()->route('alumnos.listado');
        else if($rol=="profesor"){
            return redirect()->route('profesores_listado');
        }
        else
            return redirect()->route('usuarios.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $user = User::find($id)->first();



        $user->delete();

        $rol = session('rol')??"";
        if ($rol=="alumno")
            return redirect()->route('alumnos.listado');
        else if($rol=="profesor"){
            return redirect()->route('profesores_listado');
        }
        else
            return redirect()->route('usuarios.index');


    }

    public function getProfesores(Request $request){
        $usuarios = User::profesores()->get();
        $rol = 'profesor';
        return view('instituto.usuarios.listado', compact('usuarios','rol'));




    }
    public function getAlumnos(Request $request){
        $usuarios = User::alumnos()->get();
        info("Estoy asignando varialbe de sesion");
        session()->put("rol","alumno");
        return view('instituto.usuarios.listado', compact('usuarios'));




    }
}
