<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;


class AdminProduct extends Component
{
    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully');
    }
    use WithPagination;
    public function render()
    {

        $products = Product::orderBy('created_at', 'DESC')->paginate(10);

        return view('livewire.admin.admin-product', ['products' => $products]);
    }
}
