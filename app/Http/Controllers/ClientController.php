<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use App\Models\City;
use App\Models\Client;
use App\Models\Consent;
use App\Models\Country;
use App\Models\State;
use App\Models\Treatment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $consents = Consent::all();
        $clients = Client::all();
        /*$clients = Client::select('*')->orderBy('id', 'DESC');
        $limit=(isset($request->limit))?$request->limit:10;

        if (isset($request->search)){
            $clients = $clients->where('id', 'like', '%', $request->search, '%')
                ->orWhere('nombrecompleto', 'like', '%', $request->search, '%')
                ->orWhere('direccion', 'like', '%', $request->search, '%')
                ->orWhere('poblacion', 'like', '%', $request->search, '%')
                ->orWhere('provincia', 'like', '%', $request->search, '%')
                ->orWhere('pais', 'like', '%', $request->search, '%')
                ->orWhere('codigopostal', 'like', '%', $request->search, '%')
                ->orWhere('numeroid', 'like', '%', $request->search, '%')
                ->orWhere('fechanacimiento', 'like', '%', $request->search, '%')
                ->orWhere('usuariocreador', 'like', '%', $request->search, '%')
                ->orWhere('fechacreacion', 'like', '%', $request->search, '%')
                ->orWhere('fechamodificacion', 'like', '%', $request->search, '%')
                ->orWhere('ultimocreador', 'like', '%', $request->search, '%');
        }
        $clients = $clients->paginate($limit)->appends($request->all());*/
        return view('client.client', compact('clients'), compact('consents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('client.client-create');
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

            'nombrecompleto'=>'required',
            'direccion'=>'required',
            'poblacion'=>'required',
            'provincia'=>'required',
            'pais'=>'required',
            'codigopostal'=>'required',
            'numeroid'=>'required',
            'fechanacimiento'=>'required|date_format:d/m/Y',

            'nombretutor'=>'required_if:edad,<,18',
            'direcciontutor'=>'required_if:edad,<,18',
            'poblaciontutor'=>'required_if:edad,<,18',
            'provinciatutor'=>'required_if:edad,<,18',
            'paistutor'=>'required_if:edad,<,18',
            'codigopostaltutor'=>'required_if:edad,<,18',
            'fechanacimientotutor'=>'required_if:edad,<,18',

],
        [
            'nombrecompleto.required' => 'El nombre es obligatorio',
            'direccion.required' => 'La direccion es obligatoria',
            'poblacion.required' => 'La poblacion es obligatoria',
            'provincia.required' => 'La provincia es obligatoria',
            'pais.required' => 'El pais es obligatorio',
            'codigopostal.required' => 'El codigo postal es obligatorio',
            'numeroid.required' => 'El numero de id es obligatorio',
            'fechanacimiento.required' => 'La fecha de nacimiento es obligatoria',
            ]

        );

            $clients = new client();
            $clients->nombrecompleto = $request->get('nombrecompleto');
            $clients->direccion = $request->get('direccion');
            $clients->poblacion = $request->get('poblacion');
            $clients->provincia = $request->get('provincia');
            $clients->pais = $request->get('pais');
            $clients->codigopostal = $request->get('codigopostal');
            $clients->numeroid = $request->get('numeroid');
            $clients->fechanacimiento = $request->get('fechanacimiento');

            $clients->edad = Carbon::parse($clients->fechanacimiento)->age;

            //$clients->esmenor = $request->get('esmenor');

            $clients->fechacreacion = now()->toDateString();
            $clients->usuariocreador = auth()->user()->name;



            $clients->save();

            return redirect('/client');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $clients = Client::find($id);
        return view('client.client-show')->with('client', $clients);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $clients = Client::find($id);
        return view('client.client-edit')->with('client', $clients);
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
        $client = Client::find($id);

        $client->nombrecompleto = $request->get('nombrecompleto');
        $client->direccion = $request->get('direccion');
        $client->poblacion = $request->get('poblacion');
        $client->provincia = $request->get('provincia');
        $client->pais = $request->get('pais');
        $client->codigopostal = $request->get('codigopostal');
        $client->numeroid = $request->get('numeroid');
        $client->fechanacimiento = $request->get('fechanacimiento');
        $client->fechamodificacion = now()->toDateString();
        $client->ultimocreador = auth()->user()->name;

        $client->save();

        return redirect('/client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy($id)
    {
        $consents = Consent::all();
        $client = Client::find($id);
        $client->delete();
        return redirect('/client');

    }

    public function eliminar($id){

        $treatments = Treatment::all();
        $consents = Consent::all();
        $client = Client::find($id);
        return view('client.client-destroy')->with('consents', $consents)->with('client', $client)->with('treatments', $treatments);
}
}
