<?php

namespace Database\Seeders;

use App\Actions\GenerateUniqueSlug;
use App\Enums\PostStatus;
use App\Enums\UserRole;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $superadmin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
            'role' => UserRole::Superadmin,
        ]);

        $admin = User::factory()->create([
            'name' => 'Content Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => UserRole::Admin,
        ]);

        User::factory()->create([
            'name' => 'Demo User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => UserRole::User,
        ]);

        $categories = collect(['Strategy', 'Engineering', 'Design', 'Operations'])->map(
            fn (string $name) => Category::create([
                'name' => $name,
                'slug' => app(GenerateUniqueSlug::class)->handle(Category::class, $name),
                'description' => "Articles and guides about {$name}.",
            ])
        );

        $tags = collect(['Laravel', 'CMS', 'Blade', 'Security', 'Growth', 'Workflow'])->map(
            fn (string $name) => Tag::create([
                'name' => $name,
                'slug' => app(GenerateUniqueSlug::class)->handle(Tag::class, $name),
            ])
        );

        $titles = [
            'Building a Reusable Laravel Website Foundation',
            'Designing Role Aware Dashboards with Blade',
            'Publishing Workflows for Lean Content Teams',
            'Practical Authorization Patterns for CMS Projects',
            'Creating Premium Landing Pages with Tailwind CSS',
            'Keeping Starter Kits Maintainable Over Time',
        ];

        foreach ($titles as $index => $title) {
            $post = Post::create([
                'user_id' => $index % 2 === 0 ? $admin->id : $superadmin->id,
                'category_id' => $categories[$index % $categories->count()]->id,
                'title' => $title,
                'slug' => app(GenerateUniqueSlug::class)->handle(Post::class, $title),
                'excerpt' => 'A concise implementation guide for teams building reusable Laravel web platforms.',
                'content' => "This starter article demonstrates the structure expected in a reusable CMS base.\n\nIt uses Blade views, Eloquent relationships, policies, form requests, and route middleware so future projects can extend the same foundation without moving into SPA architecture.\n\nThe goal is a practical baseline: public content, authenticated dashboards, admin content workflows, and superadmin controls.",
                'status' => PostStatus::Published,
                'published_at' => now()->subDays($index + 1),
            ]);

            $post->tags()->sync($tags->random(3)->pluck('id'));
        }

        Post::factory()->draft()->for($admin)->for($categories->first())->create([
            'title' => 'Draft Content Planning Note',
        ]);
    }
}

