<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\CategoryProduct;

class HomeContent extends Component
{
    public $products, $categories, $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public $filters = [
        'categories' => []
    ];

    public function updatingFilters()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($products, $categories)
    {
        $this->products = $products;
        $this->categories = $categories;
    }

    public function render()
    {
        $this->categories = CategoryProduct::orderby('name', 'asc')->get();
        $this->filters['categories'] = array_filter($this->filters['categories']);


       $query = Product::query()
            ->where('name', 'like', "%{$this->search}%")
            ->orderBy('name', 'asc');


        if (!empty($this->filters['categories'])) {
            $query->whereIn('category_product_id', array_keys($this->filters['categories']));
        }

        return view('livewire.home-content', [
            'products' => $query->get()
        ]);
    }
}