<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filename = $this->faker->numberBetween(1, 10) . '.jpg';

        return [
            'path' => "img/products/{$filename}"
        ];
    }


    /**
     * Metodo para los las imagenes de los usuarios
     */
    public function user(){
        $filename = $this->faker->numberBetween(1, 5) . '.jpg';
       return $this->state([
           'path' => "img/users/{$filename}",
       ]);
    }
}
