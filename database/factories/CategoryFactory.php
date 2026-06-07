<?php

namespace Database\Factories;

use App\Actions\GenerateUniqueSlug;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);

        return [
            'name' => str($name)->title()->toString(),
            'slug' => app(GenerateUniqueSlug::class)->handle(Category::class, $name),
            'description' => fake()->sentence(12),
        ];
    }
}

