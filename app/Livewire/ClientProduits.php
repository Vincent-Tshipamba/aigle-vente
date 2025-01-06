<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\CategoryProduct;
use Livewire\WithPagination;

class ClientProduits extends Component
{
    use WithPagination;

    public $search = '', $categories, $wishlists;
    protected $queryString = [
        'search' => ['except' => '']
    ];

    public $filters = [
        'categories' => []
    ];

    public function updatedFilters()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function mount($wishlists)
    {
        $this->wishlists = $wishlists;
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

        return view('livewire.client-produits', [
            'products' => $query->get()
        ]);
    }
}