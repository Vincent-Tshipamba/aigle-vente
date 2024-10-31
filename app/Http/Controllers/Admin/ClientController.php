<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
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

    public function getOrdersByUser(Request $request)
    {
        $client_id = $request->client_id;
        $year = $request->year;
        $month = $request->month;

        $query = Order::selectRaw("date_format(created_at, '%Y-%m-%d') as date, count(*) as aggregate")
            ->where('client_id', $client_id)
            ->whereYear('created_at', $year);

        if ($month && $month !== 'all') {
            $query->whereMonth('created_at', $month);
        }

        $orders = $query->groupBy('date')->get();

        return response()->json($orders);
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