<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Categories;
use Cart;
use Livewire\WithPagination;


class Category extends Component
{
    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate("App\Models\Product");
        session()->flash('success', 'Product added successfully');
        return redirect('cart');
    }
    use WithPagination;
    public $pagePer = 10;
    public $orderBy = 'Default';
    public $slug;

    public function Pageper($page)
    {
        $this->pagePer = $page;
    }

    public function orderBy($order)
    {
        $this->orderBy = $order;
    }
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $category = Categories::where('slug', $this->slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;
        if ($this->orderBy == 'Price: Low to High') {
            $product = Product::where('category_id', $category_id)->orderBy('sale_price', 'ASC')->paginate($this->pagePer);
        } else if ($this->orderBy == 'Price: Hight to Low') {
            $product = Product::where('category_id', $category_id)->orderBy('sale_price', 'DESC')->paginate($this->pagePer);
        } else if ($this->orderBy == 'Recent latest') {
            $product = Product::where('category_id', $category_id)->orderBy('created_at', 'DESC')->paginate($this->pagePer);
        } else {

            $product = Product::where('category_id', $category_id)->paginate($this->pagePer);
        }
        $category = Categories::orderBy('name', 'ASC')->get();
        return view('livewire.category', ['products' => $product, 'category' => $category, 'category_name' => $category_name]);
    }
}
