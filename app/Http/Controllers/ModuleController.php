<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Module;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $modules = Module::all();
        return view('module.module')->with('modules', $modules);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $modules = Module::all();
        return view('module.module-create')->with('modules', $modules);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([


            'nombre'=>'required',
            'direccion'=>'required',
            'poblacion'=>'required',
            'codigopostal'=>'required',
            'telefono'=>'required',
            'email'=>'required|email',
            'rgpd'=>'required',

        ],
            [
                'nombre.required' => 'El nombre es obligatorio',
                'direccion.required' => 'La direccion es obligatoria',
                'poblacion.required' => 'La poblacion es obligatoria',
                'codigopostal.required' => 'El codigo postal es obligatorio',
                'telefono.required' => 'El telefono es obligatorio',
                'email.required' => 'El email es obligatorio',
                'email.email' => 'El email debe ser un email valido',

            ]
        );



        $modules = new module();

        $modules->nombre = $request->get('nombre');
        $modules->direccion = $request->get('direccion');
        $modules->poblacion = $request->get('poblacion');
        $modules->codigopostal = $request->get('codigopostal');
        $modules->telefono = $request->get('telefono');
        $modules->email = $request->get('email');
        $modules->RGPD = $request->get('rgpd');
        $modules->cif = $request->get('cif');
        $modules->observaciones = $request->get('observaciones');

        $filename = time().$request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('images', $filename, 'public');
        $modules->logo = '/storage/'.$path;

        //$image = $request->file('file');
        //$image->move('uploads', $image->getClientOriginalName());

        //$modules->logo = $image->getClientOriginalName();-->

        $modules->save();

        return redirect('/module');
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
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id)
    {
        $modules = Module::all();
        $modulee = Module::find($id);
        return view('module.module-edit')->with('modules', $modules)->with('modulee', $modulee);
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
        $modules = Module::find($id);

        $modules->nombre = $request->get('nombre');
        $modules->direccion = $request->get('direccion');
        $modules->poblacion = $request->get('poblacion');
        $modules->codigopostal = $request->get('codigopostal');
        $modules->telefono = $request->get('telefono');
        $modules->email = $request->get('email');
        $modules->RGPD = $request->get('rgpd');
        $modules->cif = $request->get('cif');

        if ($request->get('file') != null) {
        $filename = time() . $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('images', $filename, 'public');
        $modules->logo = $path;}
        else{
                $modules->logo = $request->get('LOGO');}

        $modules->save();

        return redirect('/module');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
