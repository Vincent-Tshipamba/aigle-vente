<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DetailsShop extends Component
{
    public $shop;
    public $owner;
    public $products;
    public $orders;
    /**
     * Create a new component instance.
     */
    public function __construct($shop, $owner, $products, $orders)
    {
        $this->shop = $shop;
        $this->owner = $owner;
        $this->products = $products;
        $this->orders = $orders;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.details-shop', [
            'shop' => $this->shop,
            'owner' => $this->owner,
            'products' => $this->products,
            'orders' => $this->orders
        ]);
    }
}