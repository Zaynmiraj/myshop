<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
