<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transection extends Model
{
    use HasFactory;

    protected $table = 'transections';

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}
