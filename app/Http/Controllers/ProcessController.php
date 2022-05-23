<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Consent;
use Illuminate\Http\Request;

class ProcessController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $consents = Consent::all();
        return view('client.client')->with('clients', $clients);
    }
}
