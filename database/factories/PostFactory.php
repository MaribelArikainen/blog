<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created = Carbon::create(fake()->dateTimeBetween());
        $updated = fake()->dateTimeBetween($created, Carbon::create($created)->addDays(3));
        if(rand(0,9)){
            $updated = $created;
        }

        return [
            'title' => fake()->sentence,
            'body' => fake()->paragraphs(6, true),
            'created_at' => $created,
            'updated_at' => $updated,
        ];
    }
}
