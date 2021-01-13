<?php

namespace Database\Seeders;

use App\Models\Product;
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
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([            
            'name' => 'Jhon Fabio Cardona',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), 
            'remember_token' => Str::random(10),        
        ]);
        $product = Product::factory(50)->create();
    }
}
