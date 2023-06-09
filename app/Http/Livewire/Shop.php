<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Categories;
use Cart;
use Livewire\WithPagination;


class Shop extends Component
{
    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate("App\Models\Product");
        session()->flash('success', 'Product added successfully');
        return redirect('cart');
    }
    public function wishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate("App\Models\Product");
        session()->flash('success', 'Product added successfully');
    }
    use WithPagination;
    public $pagePer = 10;
    public $orderBy = 'Default';
    public $min_value = 0;
    public $max_value = 1000;

    public function Pageper($page)
    {
        $this->pagePer = $page;
    }

    public function orderBy($order)
    {
        $this->orderBy = $order;
    }

    public function render()
    {
        if ($this->orderBy == 'Price: Low to High') {
            $product = Product::whereBetween('sale_price', [$this->min_value, $this->max_value])->orderBy('sale_price', 'ASC')->paginate($this->pagePer);
        } else if ($this->orderBy == 'Price: Hight to Low') {
            $product = Product::whereBetween('sale_price', [$this->min_value, $this->max_value])->orderBy('sale_price', 'DESC')->paginate($this->pagePer);
        } else if ($this->orderBy == 'Recent latest') {
            $product = Product::whereBetween('sale_price', [$this->min_value, $this->max_value])->orderBy('created_at', 'DESC')->paginate($this->pagePer);
        } else {

            $product = Product::whereBetween('sale_price', [$this->min_value, $this->max_value])->paginate($this->pagePer);
        }
        $category = Categories::orderBy('name', 'ASC')->get();
        return view('livewire.shop', ['products' => $product, 'category' => $category]);
    }
}
