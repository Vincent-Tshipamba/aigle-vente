<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class HomeContent extends Component
{
    use WithPagination; // Ajout pour gérer la pagination dans Livewire

    public $categories, $search = '';
    public $localSellers, $internationalSellers;

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public $filters = [
        'categories' => []
    ];

    public function search()
    {
        $this->resetPage(); // Reset pagination lorsque l'utilisateur recherche
    }

    public function mount()
    {
        $this->categories = CategoryProduct::orderby('name', 'asc')->with('products')->get();

        $this->localSellers = DB::table('sellers')
            ->join('locations', 'locations.id', '=', 'sellers.location_id')
            ->where('locations.country', 'LIKE', '%République démocratique du Congo%')
            ->orWhere('locations.country', 'LIKE', '%Congo (la République démocratique du)%')
            ->count();

        $this->internationalSellers = DB::table('sellers')
            ->join('locations', 'locations.id', '=', 'sellers.location_id')
            ->where('locations.country', '!=', 'République démocratique du Congo')
            ->where('locations.country', '!=', 'Congo (la République démocratique du)')
            ->count();
    }

    public function render()
    {
        $query = Product::query()
            ->where('is_active', true)
            ->where('name', 'like', "%{$this->search}%")
            ->inRandomOrder(); // Ajout de l'ordre aléatoire

        if (!empty($this->filters['categories'])) {
            $query->whereIn('category_product_id', array_keys($this->filters['categories']));
        }

        return view('livewire.home-content', [
            'products' => $query->paginate(30) // Ajout de la pagination
        ]);
    }

    public function toggleCategory($categoryId)
    {
        if (in_array($categoryId, $this->filters['categories'])) {
            $this->filters['categories'] = array_diff($this->filters['categories'], [$categoryId]);
        } else {
            $this->filters['categories'][] = $categoryId;
        }
        $this->resetPage(); // Recharger les résultats après filtrage
    }
}
