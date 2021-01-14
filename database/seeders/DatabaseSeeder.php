<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Payment;
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
        $product = Product::factory(50)->create(); # Insertando 50 usuarios

        \App\Models\User::create([
            'name' => 'Jhon Fabio Cardona',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
        ]);

        $users =  \App\Models\User::factory(10)->create(); # Insertando 20 usuarios

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
    }
}
