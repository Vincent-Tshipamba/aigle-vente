<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Shop;
use App\Models\Client;
use App\Models\Seller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalVendeurs = Seller::count();
        $totalClients = Client::count();
        $totalProduits = Product::count();
        $totalCommandes = Shop::count();

        $totalClientsMales = DB::table('users')
            ->leftJoin('clients', 'users.id', '=', 'clients.user_id')
            ->select(DB::raw('SUM(CASE WHEN clients.sexe = "Masculin" THEN 1 ELSE 0 END) as total_males'))
            ->first()
            ->total_males;

        $totalClientsFemales = DB::table('users')
            ->leftJoin('clients', 'users.id', '=', 'clients.user_id')
            ->select(DB::raw('SUM(CASE WHEN clients.sexe = "Féminin" THEN 1 ELSE 0 END) as total_females'))
            ->first()
            ->total_females;

         $shops = Shop::latest()->get();


        return view('admin.dashboard', compact('totalUsers', 'totalVendeurs', 'totalClients', 'totalProduits', 'totalCommandes', 'totalClientsMales', 'totalClientsFemales', 'shops'));
    }

    public function getClientsByPeriod(Request $request)
    {
        $year = $request->input('year');
        $month = $request->input('month');

        $query = Client::selectRaw("date_format(created_at, '%Y-%m-%d') as date, count(*) as aggregate")
            ->whereYear('created_at', $year);


        if ($month && $month !== 'all') {
            $query->whereMonth('created_at', $month);
        }

        $clients = $query->groupBy('date')->get();

        return response()->json($clients);
    }
}
