<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Consent;
use App\Models\Module;
use App\Models\Treatment;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $modules = Module::all();
        $consents = Consent::all();
        $treatments = Treatment::all();
        return view('treatment.treatment')->with('treatments', $treatments)->with('consents', $consents)->with('modules', $modules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $modules = Module::all();
        return view('treatment.treatment-create')->with('modules', $modules);
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

            'nombre'=>'required',
            'texto'=>'required',

        ]);

        $treatments = new treatment();
        $treatments->nombre = $request->get('nombre');
        $treatments->texto = $request->get('texto');
        $treatments->usuariocreador = auth()->user()->name;

        $treatments->fechacreacion = now()->toDateString();

        $treatments->save();

        return redirect('/treatment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $modules = Module::all();
        $treatments = Treatment::find($id);
        return view('treatment.treatment-show')->with('treatment', $treatments)->with('modules', $modules);
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
        $treatments = Treatment::find($id);
        return view('treatment.treatment-edit')->with('treatment', $treatments)->with('modules', $modules);
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
        $treatment = Treatment::find($id);

        $treatment->nombre = $request->get('nombre');
        $treatment->texto = $request->get('texto');
        $treatment->comentarios = $request->get('comentarios');
        $treatment->fechamodificacion = now()->toDateString();
        $treatment->ultimocreador = auth()->user()->name;

        $treatment->save();

        return redirect('/treatment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy($id)
    {
        $treatment = Treatment::find($id);
        $treatment->delete();
        return redirect('/treatment');
    }
}
