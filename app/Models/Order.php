<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'customer_id',
    ];

    /**
     * Relacion entre orden y pago
     * 
     * Una pago tiene orden
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    /**
     * Una Orden pertenece a un usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Una orden puede tener una lista productos
     * 
     * belongsToMany => pertenece a muchos 
     */
    public function products()
    {
        //Al tener esta realación nos trae el dato que se tiene en la tabla internmedia
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
