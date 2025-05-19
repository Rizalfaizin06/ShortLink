<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Link;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    protected $model = Link::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'url_title' => $this->faker->sentence,
            'slug' => $this->faker->unique()->slug,
            'original_url' => $this->faker->url,
            'user_id' => 1, // Generate user secara otomatis dengan factory User
            'clicks' => $this->faker->numberBetween(0, 100),
        ];
    }
}
