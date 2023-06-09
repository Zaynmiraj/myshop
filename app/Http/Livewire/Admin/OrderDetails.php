<?php

namespace App\Http\Livewire\Admin;

use App\Models\Orders;
use Livewire\Component;

class OrderDetails extends Component
{

    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }
    public function render()
    {
        $orders = Orders::find($this->order_id);
        return view('livewire.admin.order-details', ['order' => $orders]);
    }
}
