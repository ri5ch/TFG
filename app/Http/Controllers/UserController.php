<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function login(Request $request)
    {
       
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

       
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('eventos');
        }
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }
    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);
        return redirect()->route('formularioLogin');
    }


    public function inicioSesionAdmin(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('panelAdmin');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }
    public function index()
    {
        $users = User::all();
        return view('adminUsers', compact('users'));
    }

    // Show the form for editing the specified user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('adminEdit', compact('user'));
    }

    // Update the specified user in storage
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'rol' => 'required|string',
        ]);

        $user->update($request->all());

        return redirect()->route('adminUsers')->with('success', 'User updated successfully');
    }

    // Remove the specified user from storage
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('adminUsers')->with('success', 'User deleted successfully');
    }
    public function cerrarSesion()
    {
        Auth::logout();
        return redirect('/');
    }

    public function formLog(Request $request)
    {
        return view('login');
    }

    public function devolverPrueba(Request $request)
    {
        return view('prueba');
    }

    public function welcome(Request $request)
    {
        return view('welcome');
    }

    public function formRegi(Request $request)
    {
        return view('register');
    }
    
}
