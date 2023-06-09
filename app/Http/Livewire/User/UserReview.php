<?php

namespace App\Http\Livewire\User;

use App\Models\OrderItem;
use Livewire\Component;
use App\Models\Review;


class UserReview extends Component
{
    public $order_item_id;
    public $comment;
    public $rating;

    public function mount($order_item_id)
    {
        $this->order_item_id = $order_item_id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'rating' => 'required',
            'comment' => 'required',
        ]);
    }

    public function Rating()
    {
        $this->validate([
            'comment' => 'required',
            'rating' => 'required'
        ]);
        $review = new Review();
        $review->rating = $this->rating;
        $review->comment = $this->comment;
        $review->order_item_id = $this->order_item_id;
        $review->save();

        $orderItem = OrderItem::find($this->order_item_id);
        $orderItem->r_status = true;
        $orderItem->save();
        session()->flash('success', 'Your review has been saved successfully');
    }

    public function render()
    {
        $orderItems = OrderItem::find($this->order_item_id);
        return view('livewire.user.user-review', ['orderItems' => $orderItems]);
    }
}
