<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        // 'admin_since',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'admin_since'
    ];


    /**
     * Un usuario tiene  muchas ordenes
     * hasMany => tiene muchaos
     */
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    /**
     * Un usuario tiene muchos pagos a través de una orden
     * 
     * hasManyThrough => Necesita saber a donde queremos llegar y a través de quien lo vamos hacer
     */
    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Order::class, 'customer_id');
    }

    /**
     * Un usuario tiene una sola imagen
     * la cual corresponde a la imagen del perfil 
     * 
     * morphOne: Relacion polimofica
     * 
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
