<?php

namespace Tests\Feature;

use App\Enums\PostStatus;
use App\Enums\UserRole;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CmsStarterTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_and_auth_pages_load(): void
    {
        foreach (['/', '/blog', '/about', '/contact', '/terms', '/privacy', '/login', '/register', '/forgot-password'] as $uri) {
            $this->get($uri)->assertOk();
        }
    }

    public function test_user_can_register_login_and_logout(): void
    {
        $this->post('/register', [
            'name' => 'New User',
            'email' => 'new@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ])->assertRedirect(route('dashboard'));

        $this->assertAuthenticated();
        auth()->logout();

        User::where('email', 'new@example.com')->first()->update([
            'password' => Hash::make('password'),
        ]);

        $this->post('/login', [
            'email' => 'new@example.com',
            'password' => 'password',
        ])->assertRedirect(route('dashboard'));

        $this->post('/logout')->assertRedirect(route('home'));
        $this->assertGuest();
    }

    public function test_user_role_cannot_access_admin_crud_and_receives_toast_redirect(): void
    {
        $user = User::factory()->role(UserRole::User)->create();

        $this->actingAs($user)
            ->get(route('admin.posts.index'))
            ->assertRedirect(route('dashboard'))
            ->assertSessionHas('toast.message', 'You do not have permission to access this page.');

        $this->actingAs($user)
            ->followingRedirects()
            ->get(route('admin.posts.index'))
            ->assertOk()
            ->assertSee('You do not have permission to access this page.');
    }

    public function test_admin_can_manage_posts_categories_and_tags(): void
    {
        $admin = User::factory()->role(UserRole::Admin)->create();
        $category = Category::factory()->create();
        $tag = Tag::factory()->create();

        $this->actingAs($admin)
            ->post(route('admin.posts.store'), [
                'category_id' => $category->id,
                'title' => 'Admin Published Post',
                'excerpt' => 'A practical excerpt for testing.',
                'content' => 'Post body content.',
                'status' => PostStatus::Published->value,
                'tags' => [$tag->id],
            ])
            ->assertRedirect(route('admin.posts.index'));

        $post = Post::where('title', 'Admin Published Post')->first();
        $this->assertNotNull($post);

        $this->actingAs($admin)
            ->put(route('admin.posts.update', $post), [
                'category_id' => $category->id,
                'title' => 'Admin Updated Post',
                'excerpt' => 'A practical excerpt for testing.',
                'content' => 'Updated body content.',
                'status' => PostStatus::Draft->value,
                'tags' => [$tag->id],
            ])
            ->assertRedirect(route('admin.posts.index'));

        $this->assertDatabaseHas('posts', ['title' => 'Admin Updated Post']);

        $this->actingAs($admin)
            ->post(route('admin.categories.store'), ['name' => 'News', 'description' => 'News posts'])
            ->assertRedirect(route('admin.categories.index'));

        $this->actingAs($admin)
            ->post(route('admin.tags.store'), ['name' => 'Release'])
            ->assertRedirect(route('admin.tags.index'));
    }

    public function test_admin_cannot_access_user_management(): void
    {
        $admin = User::factory()->role(UserRole::Admin)->create();

        $this->actingAs($admin)
            ->get(route('superadmin.users.index'))
            ->assertRedirect(route('dashboard'))
            ->assertSessionHas('toast.message', 'You do not have permission to access this page.');
    }

    public function test_standard_flash_error_renders_as_toast(): void
    {
        $this->withSession(['error' => 'Something went wrong.'])
            ->get(route('about'))
            ->assertOk()
            ->assertSee('Something went wrong.');
    }

    public function test_error_pages_render_with_custom_ui(): void
    {
        $this->get('/missing-page')
            ->assertNotFound()
            ->assertSee('Page not found')
            ->assertSee('Back home');

        foreach ([400, 401, 403, 419, 429, 500, 503] as $status) {
            $this->view("errors.{$status}")
                ->assertSee((string) $status)
                ->assertSee('Back home');
        }
    }

    public function test_superadmin_can_access_and_manage_user_management(): void
    {
        $superadmin = User::factory()->role(UserRole::Superadmin)->create();

        $this->actingAs($superadmin)
            ->get(route('superadmin.users.index'))
            ->assertOk();

        $this->actingAs($superadmin)
            ->post(route('superadmin.users.store'), [
                'name' => 'Managed User',
                'email' => 'managed@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'role' => UserRole::Admin->value,
                'is_active' => '1',
            ])
            ->assertRedirect(route('superadmin.users.index'));

        $this->assertDatabaseHas('users', [
            'email' => 'managed@example.com',
            'role' => UserRole::Admin->value,
        ]);
    }

    public function test_published_posts_are_public_and_draft_posts_are_hidden_unless_authorized(): void
    {
        $admin = User::factory()->role(UserRole::Admin)->create();
        $category = Category::factory()->create();

        $published = Post::factory()->for($admin)->for($category)->create([
            'title' => 'Public Article',
            'status' => PostStatus::Published,
            'published_at' => now(),
        ]);

        $draft = Post::factory()->draft()->for($admin)->for($category)->create([
            'title' => 'Private Draft',
        ]);

        $this->get(route('blog.index'))->assertSee('Public Article')->assertDontSee('Private Draft');
        $this->get(route('blog.show', $published))->assertOk()->assertSee('Public Article');
        $this->get(route('blog.show', $draft))->assertNotFound();
        $this->actingAs($admin)->get(route('blog.show', $draft))->assertOk()->assertSee('Private Draft');
    }
}
