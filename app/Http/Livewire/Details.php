<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Details extends Component
{
    public $slug;
    protected  function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $related = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        $latest = Product::latest()->take(4)->get();
        return view('livewire.details', ['products' => $product, 'related' => $related, 'latest' => $latest]);
    }
}
