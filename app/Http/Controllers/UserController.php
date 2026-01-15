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
        $user->assignRole('alumno');

        // ir al listado filtrado de alumnos
        return redirect()->route('alumnos.listado');
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

        $rol = $request->query('rol', 'alumno'); // por defecto 'alumno'

        $user = User::role($rol)->find($id);



        return view('instituto.usuarios.edit', compact('user', 'rol'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rol = $request->query('rol', 'alumno');
        $user = User::role($rol)->find($id);



        $datos = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'fecha_nacimiento' => 'required|date',
        ]);

        $user->update($datos);

        return redirect()->route($rol === 'alumno' ? 'alumnos.listado' : 'profesores_listado')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $rol = $request->input('rol', 'alumno');
        $user = User::role($rol)->find($id);



        $user->delete();

        return redirect()->route($rol === 'alumno' ? 'alumnos.listado' : 'profesores_listado')
            ->with('success','Usuario eliminado correctamente');
    }

    public function getProfesores(Request $request){
        $usuarios = User::profesores()->get();
        $rol = 'profesor';
        return view('instituto.usuarios.listado', compact('usuarios','rol'));




    }
    public function getAlumnos(Request $request){
        $usuarios = User::alumnos()->get();
        $rol = 'alumno';
        return view('instituto.usuarios.listado', compact('usuarios','rol'));




    }
}
