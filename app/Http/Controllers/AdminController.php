<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Module;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $modules = Module::all();
        $users = User::all();
        return view('admin.admin')->with('users', $users)->with('modules', $modules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $modules = Module::all();
        return view('admin.admin-create')->with('modules', $modules);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required|unique:users',
            'password'=>'required|min:8|max:12',


        ]);

        $users = new user();
        $users->name = $request->get('name');
        $users->password = Hash::make($request->get('password'));
        $users->role = $request->boolean('role');

        $users->save();

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $modules = Module::all();
        $users = User::find($id);
        return view('admin.admin-edit')->with('user', $users)->with('modules', $modules);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'name'=>'required',
            'password'=>'required|min:8|max:12'
        ]);
        $user = User::find($id);

        $user->name = $request->get('name');
        $user->password = Hash::make($request->get('password'));

        $user->save();

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin');
    }
}
