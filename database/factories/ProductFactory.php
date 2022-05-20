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
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($faker));
        return [
            'name'=>$this->faker->sentence(),
            'description'=>$this->faker->paragraph(),
            'price'=>$this->faker->randomFloat(2, 0, 1000),
            'category'=>$this->faker->randomElement($array = ['Mochila', 'Pañalera']),
            'image'=>$faker->imageUrl(150, 200)
        ];
    }
}
