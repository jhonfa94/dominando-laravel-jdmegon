<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'status'
    ];

    public function carts(){
       return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }

    public function orders(){
       return $this->belongsToMany(Order::class)->withPivot('quantity');
    }


}
