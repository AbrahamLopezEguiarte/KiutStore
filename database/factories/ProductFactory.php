<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->sentence(),
            'description'=>$this->faker->paragraph(),
            'price'=>$this->faker->randomFloat(2, 0, 1),
            'category'=>$this->faker->randomElement($array = ['Mochila', 'Pañalera']),
            'image'=>$this->faker->image('public/img/product', 50, 50, null, false)
        ];
    }
}
