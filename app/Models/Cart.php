<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    /**
     * Un cart puede tener uan lista  productos
     * 
     * belongsToMany => pertenece a muchos 
     */
    public function products()
    {
        //Al tener esta realación nos trae el dato que se tiene en la tabla internmedia
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
