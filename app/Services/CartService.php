<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

class CartService
{
    public $cookieName = 'cart';

    /**
     * Obtener Cookier
     */
    public function getFromCookie()
    {
        $cartId = Cookie::get($this->cookieName);

        $cart = Cart::find($cartId);

        return $cart;
    }

    /**
     * Método para verificar si existe una cookie para obtener el valor
     */
    public function getFromCookieOrCreate()
    {
        // $cartId = Cookie::get($this->cookieName);
        // $cart = Cart::find($cartId);
        $cart = $this->getFromCookie();

        return $cart ?? Cart::create();
    }

    /**
     * Crear cookie
     */
    public function makeCookie(Cart $cart)
    {
        return  Cookie::make($this->cookieName, $cart->id, 7 * 24 * 60); # 7 dias, 24 horas, 60 minutos
    }

    /**
     * Capacidad de realizar cuentas de cantidades
     */
    public function countProducts()
    {
        $cart = $this->getFromCookie();

        if ($cart != null) {
            return $cart->products->pluck('pivot.quantity')->sum();
        }

        return 0;
    }
}
