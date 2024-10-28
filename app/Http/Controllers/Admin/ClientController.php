<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->get();
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Client $client)
    {
        //
    }

    public function edit(Client $client)
    {
        //
    }

    public function update(Request $request, Client $client)
    {
        //
    }

    public function destroyClient(Client $client)
    {
        try {
            $client->delete();
            return redirect()->route('admin.clients.index')->with('success', 'Client supprimé avec succès');
        } catch (\Exception $e) {
            Log::error('Erreur lors de la suppression du client : ' . $e->getMessage());
            return redirect()->route('admin.clients.index')->with('error', 'Erreur lors de la suppression du client');
        }
    }
}