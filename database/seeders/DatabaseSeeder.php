<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Payment;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        # USUARIO JFCM
        \App\Models\User::create([
            'name' => 'Jhon Fabio Cardona',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
        ]);

        # Insertando 20 usuarios
        $users =  \App\Models\User::factory(10)
            ->create()
            ->each(function ($user) {
                $image = Image::factory()
                    ->user()
                    ->make();

                $user->image()->save($image);
            });

        # Insertando 10 ordenes
        $orders = \App\Models\Order::factory(10)
            ->make()
            ->each(function ($order) use ($users) {
                //Recorremos las ordenes
                $order->customer_id =  $users->random()->id;
                $order->save();

                //Generamos el pago
                $payment = Payment::factory()->make();
                // $payment->order_id = $order->id;
                // $payment->save();

                $order->payment()->save($payment);
            });

        # Carts
        $carts = Cart::factory(20)->create();


        # Insertando 50 usuarios
        $product = Product::factory(50)
            ->create()
            ->each(function($product)use ($orders, $carts){
                $order = $orders->random();

                $order->products()->attach([
                    $product->id => ['quantity' => mt_rand(1,3)]
                ]);

                $cart = $carts->random();

                $cart->products()->attach([
                    $product->id => ['quantity' => mt_rand(1,3)]
                ]);

                # Asociar imagenes a los productos
                $images = Image::factory(mt_rand(2,4))->make();
                $product->images()->saveMany($images);

            });
    }
}
