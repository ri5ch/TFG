<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ParticipacionEventoController;
use App\Http\Controllers\UserController;


Route::get('/',[UserController::class,'formLog'])->name('formularioLogin');
Route::post('/login',[UserController::class,'login'])->name('login');
Route::post('/cerrar-sesion', [UserController::class, 'cerrarSesion'])->name('logout');
Route::post('/formregis',[UserController::class,'register'])->name('register');
Route::get('/formregis',[UserController::class,'formRegi'])->name('formularioRegis');

Route::group(['middleware' => 'App\Http\Middleware\AuthMiddleware'], function () {
    Route::get('/welcome',[UserController::class,'welcome'])->name('welcome');
    Route::get('/eventos',[EventoController::class,'index'])->name('eventos');
    Route::get('/eventos/create',[EventoController::class,'create'])->name('eventocreate');
    Route::post('/eventos/createevento',[EventoController::class,'store'])->name('eventostore');
    Route::post('/eventos/participar/{idEvento}', [ParticipacionEventoController::class, 'participar'])->name('eventos.participar');
    
});

Route::group(['middleware' =>'App\Http\Middleware\AdminMiddleware'], function () {
    Route::get('/panelAdmin', [EventoController::class, 'inicioAdmin'])->name('panelAdmin');
    Route::get('/panelAdmin/{id}/edit', [EventoController::class, 'edit'])->name('eventoedit');
    Route::put('/panelAdmin/{id}', [EventoController::class, 'update'])->name('eventoupdate');
    Route::delete('/eventos/{id}', [EventoController::class, 'destroy'])->name('eventodestroy');
    Route::get('/prueba',[UserController::class,'devolverPrueba'])->name('prueba');
    Route::get('/admin/users', [UserController::class, 'index'])->name('adminUsers');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('adminEdit');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('adminUpdate');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('adminDestroy');
});
