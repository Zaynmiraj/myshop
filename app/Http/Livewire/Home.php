<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Product;

class Home extends Component
{
    public function render()
    {
        $slider = HomeSlider::where('status', 1)->get();
        $product = Product::latest()->take(4)->get();
        return view('livewire.home', ['sliders' => $slider, 'products' => $product]);
    }
}
