<?php

namespace App\Livewire;

use Livewire\Component;
use Modules\Product\Entities\Product;

class SearchProduct extends Component
{
    public $query;
    public $search_results;
    public $how_many;

    public function mount()
    {
        $this->query = '';
        $this->how_many = 5;
        $this->search_results = collect();

    }

    public function render()
    {
        return view('livewire.search-product');
    }

    public function updatedQuery()
    {
        if (!empty($this->query)) {
            $this->search_results = Product::where(function ($query) {
                $query->where('product_name', 'like', '%' . $this->query . '%')
                      ->orWhere('product_code', 'like', '%' . $this->query . '%')
                      ->orWhere('barcode_scanner', 'like', '%' . $this->query . '%');
            })->take($this->how_many)->get();

        } else {
            $this->search_results = collect();
        }
    }

    public function loadMore()
    {
        $this->how_many += 5;
        $this->updatedQuery();
    }

    public function resetQuery()
    {
        $this->query = '';
        $this->how_many = 5;
        $this->search_results = collect();
    }

    public function selectProduct($product)
    {
        $this->dispatch('productSelected', $product);
    }
}
