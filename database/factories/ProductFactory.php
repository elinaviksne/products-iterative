<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(3, true), // 3 vārdi kā produkta nosaukums
            'description' => $this->faker->sentence(10), // īss apraksts
            'price' => $this->faker->randomFloat(2, 1, 1000), // cena 1-1000€
            'quantity' => $this->faker->numberBetween(0, 100), // daudzums
            'expiration_date' => $this->faker->dateTimeBetween('now', '+2 years')->format('Y-m-d'), // derīguma termiņš
            'status' => $this->faker->randomElement(['available', 'unavailable']), // status
        ];
    }
}
