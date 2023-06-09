<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;

class UserOrderDetails extends Component
{
    public $order_id;


    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }
    public function cancelled()
    {
        $order = Orders::find($this->order_id);
        $order->status = "canceled";
        $order->canceled_date = DB::raw('current_date');
        $order->save();
        session()->flash('success', 'Order staus has been canceled');
    }
    public function render()
    {

        $order = Orders::find($this->order_id);
        return view('livewire.user.user-order-details', ['order' => $order]);
    }
}
