<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PassController extends Controller
{
    public function change()
    {
        $modules = Module::all();
        $user = Auth::user();
        return view('layouts.cambiar-pass')->with('user', $user)->with('modules', $modules) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request)
    {

        $request->validate([
            'password'=>'required|min:8|max:12'
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return redirect('/client');
    }

}
