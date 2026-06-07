<?php

namespace Database\Factories;

use App\Actions\GenerateUniqueSlug;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tag>
 */
class TagFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->word();

        return [
            'name' => str($name)->title()->toString(),
            'slug' => app(GenerateUniqueSlug::class)->handle(Tag::class, $name),
        ];
    }
}

