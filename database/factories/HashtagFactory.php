<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hashtag>
 */
class HashtagFactory extends Factory
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
                '#php', '#laravel', '#vuejs', '#javascript', '#reactjs', '#nodejs', '#docker', '#kubernetes', '#aws', '#azure', '#googlecloud', '#golang', '#python', '#rust', '#c', '#c++', '#c#',
            ]),
            'created_at' => now()->subDays(rand(1, 30)),
        ];
    }
}
