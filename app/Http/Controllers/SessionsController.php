<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionsController extends Controller
{
    public function login()
    {

        return view("auth.login");
    }

    public function registration()
    {

        return view("auth.registration");
    }

    public function registerUser(Request $request)
    {


        $request->validate([
            'name'=>'required|unique:users',
            'password'=>'required|min:8|max:12'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $res = $user->save();

        if ($res) {
            return back()->with('success', 'Usted se ha registrado satisfactoriamente');
        } else {
            return back()->with('fail', 'Ha ocurrido un error, reintentelo de nuevo.');
        }
    }

    public function loginUser(Request $request)
    {

        $credentials = $request->validate([
            'name'=>'required',
            'password'=>'required|min:8|max:12',
        ],
            [
            'name.required' => 'El nombre de usuario es obligatorio',
            'password.required' => 'La contraseña es obligatoria'
            ]
        );

        $user = User::where('name', '=', $request->name)->first();
        if (Auth::attempt($credentials)) {
            if (Hash::check($request->password, $user->password)) {
                if ($user->role) {
                    return redirect('admin')->with('user',$user);
                } else {
                    $request->session()->put('loginId', $user->id);
                    return redirect('client')->with('user',$user);
                }
            } else {
                return back()->with('fail', 'Contraseña incorrecta');
            }
        } else {
            return back()->with('fail', 'Este usuario no esta registrado');
        }
    }

    public function landing()
    {

        return view('layouts.landing');
    }
}
