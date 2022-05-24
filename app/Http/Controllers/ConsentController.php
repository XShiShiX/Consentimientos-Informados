<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Consent;
use App\Models\Treatment;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;


class ConsentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $clients = Client::all();
        $treatments = Treatment::all();
        $consents = Consent::all();
        return view('consent.consent')->with('consents', $consents)->with('clients', $clients)->with('treatments', $treatments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $clients = Client::all();
        $treatments = Treatment::all();
        return view('consent.consent-create', compact('clients','treatments'));
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
            'firma'=>'required',
        ]);

        $image_parts = explode(";base64,", $request->firma);
        $image_base64 = base64_decode($image_parts[1]);
        file_put_contents('firma', $image_base64);

        $consents = new consent();
        $consents->firma = $request->get('firma');
        $consents->cliente = $request->get('cliente');
        $consents->documentotratamiento = $request->get('documentotratamiento');
        $consents->fechahora = Carbon::now()->toDateTime();
        $consents->save();

        return redirect('/consent');
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
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function eliminar($id){

        $consents = Consent::find($id);
        return view('consent.consent-destroy')->with('consents', $consents);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy($id)
    {
        $consent = Consent::find($id);
        $consent->delete();
        return redirect('/consent');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function pdf(int $id): Response
    {
        $consents = Consent::find($id);
        $treatments = Treatment::all();
        $clients = Client::all();

        $pdf = PDF::loadView('consent.pdf', ['consents'=>$consents, 'treatments'=>$treatments, 'clients'=>$clients]);
        //$pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();

        //return view('consent.pdf')->with('consents', $consents);
    }
}
