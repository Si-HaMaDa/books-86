<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Furniture', 'Toys', 'Cars', 'Movies', 'Music', 'Books', 'Clothes', 'Electronics', 'Others', 'Food', 'Beverages', 'Health', 'Beauty', 'Home', 'Sports', 'Fashion', 'Garden', 'Tools', 'Games',
            ]),
            'created_at' => now()->subDays(rand(1, 30)),
        ];
    }
}
