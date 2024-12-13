<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Shop;
use App\Models\ShopVisit;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackShopVisits
{
    public function handle($request, Closure $next)
    {
        logger('Middleware TrackShopVisits exécuté');
        $shopUniqueId = $request->route('_id'); 

        if ($shopUniqueId) {
           
            $shop = Shop::where('_id', $shopUniqueId)->first();

            if ($shop) {
                try {
                    $shopVisit = ShopVisit::create([
                            'shop_id' => $shop->id,
                            'ip_address' => $request->ip(),
                            'user_agent' => $request->header('User-Agent'),
                        ]);
                    
                } catch (\Exception $e) {
                    logger($e->getMessage());
                }

            }
        }

        return $next($request);
    }
}
