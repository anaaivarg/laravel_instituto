<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;


//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function(){
    //session()->flush();
    return view('main');
})->name("main");

Route::view('/about', 'about')->name("about");

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Route::resource('alumnos', AlumnoController::class)->middleware('auth');
Route::resource('usuarios', UserController::class)->middleware('auth');
Route::get("role_profesores", [UserController::class, 'getProfesores'])->middleware('auth')->name("profesor_listado");
Route::get("alumnos", [UserController::class, 'getAlumnos'])->middleware('auth')->name("alumnos.listado");;

Route::get("lang/{lang}",LanguageController::class)->name('change_lang');
