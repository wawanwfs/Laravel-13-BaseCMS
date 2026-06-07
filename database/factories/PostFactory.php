<?php

namespace Database\Factories;

use App\Actions\GenerateUniqueSlug;
use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->unique()->sentence(5);

        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $title,
            'slug' => app(GenerateUniqueSlug::class)->handle(Post::class, $title),
            'excerpt' => fake()->paragraph(),
            'content' => collect(fake()->paragraphs(6))->implode("\n\n"),
            'featured_image' => null,
            'status' => PostStatus::Published,
            'published_at' => fake()->dateTimeBetween('-6 months', 'now'),
        ];
    }

    public function draft(): static
    {
        return $this->state(fn () => [
            'status' => PostStatus::Draft,
            'published_at' => null,
        ]);
    }
}

