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

    public function search()
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

    public function toggleCategory($categoryId)
    {
        if (in_array($categoryId, $this->filters['categories'])) {
            $this->filters['categories'] = array_diff($this->filters['categories'], [$categoryId]);
        } else {
            $this->filters['categories'][] = $categoryId;
        }
    }
}