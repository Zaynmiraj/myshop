<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Categories;
use Illuminate\Support\Str;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class AddProduct extends Component
{

    use WithFileUploads;

    public $name;
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

    public function MakeSlug()
    {
        $this->slug = Str::slug($this->name);
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
            'image' => 'required',
            'featured' => 'required'
        ]);
    }

    public function AddProduct()
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
            'image' => 'required',
            'featured' => 'required'
        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->sale_price = $this->sale_price;
        $product->regular_price = $this->regular_price;
        $product->quantity = $this->quantity;
        $product->stock_status = $this->stock_status;
        $product->category_id = $this->category;
        $product->SKU = $this->SKU;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->save();
        session()->flash('success', 'Product added successfully');
        return redirect()->route('admin.product');
    }


    public function render()
    {
        $categories = Categories::all();
        return view('livewire.admin.add-product', ['categories' => $categories]);
    }
}
