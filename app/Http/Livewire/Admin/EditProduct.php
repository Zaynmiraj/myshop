<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categories;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;


class EditProduct extends Component
{
    public $name;
    public $product_id;
    public $slug;
    public $sale_price;
    public $regular_price;
    public $quantity;
    public $stock_status = 'Instock';
    public $category;
    public $featured = 0;
    public $SKU;
    public $image;
    public $short_description;
    public $description;

    use WithFileUploads;

    public function MakeSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function mount($product_id)
    {
        $product = Product::find($product_id);
        $this->id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->SKU = $product->SKU;
        $this->image = $product->image;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->sale_price = $product->sale_price;
        $this->regular_price = $product->regular_price;
        $this->quantity = $product->quantity;
        $this->stock_status = $product->stock_status;
        $this->category = $product->category_id;
        $this->featured = $product->featured;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|min:5|max:20',
            'slug' => 'required|min:1|max:20',
            'sale_price' => 'required|numeric',
            'regular_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'short_description' => 'required|max:255',
            'description' => 'required|max:500',
            'stock_status' => 'required',
            'category' => 'required|numeric',
            'SKU' => 'required',
            'featured' => 'required'
        ]);
    }

    public function EditProduct()
    {
        $this->validate([
            'name' => 'required|min:5|max:20',
            'slug' => 'required|min:1|max:20',
            'sale_price' => 'required|numeric',
            'regular_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'short_description' => 'required|max:255',
            'description' => 'required|max:500',
            'stock_status' => 'required',
            'category' => 'required|numeric',
            'SKU' => 'required',
            'featured' => 'required'
        ]);
        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->sale_price = $this->sale_price;
        $product->regular_price = $this->regular_price;
        $product->quantity = $this->quantity;
        $product->stock_status = $this->stock_status;
        $product->category_id = $this->category;
        $product->SKU = $this->SKU;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->save();
        session()->flash('success', 'Product Updated successfully');
        return redirect()->route('admin.product');
    }

    public function render()
    {
        $categories = Categories::all();
        return view('livewire.admin.edit-product', ['categories' => $categories]);
    }
}
