<?php

namespace App\Http\Controllers\Admin;

use App\Actions\GenerateUniqueSlug;
use App\Enums\PostStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $this->authorize('viewAny', Post::class);

        return view('admin.posts.index', [
            'posts' => Post::with(['category', 'user', 'tags'])
                ->when($request->filled('status'), fn ($query) => $query->where('status', $request->string('status')))
                ->latest()
                ->paginate(15)
                ->withQueryString(),
            'statuses' => PostStatus::cases(),
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', Post::class);

        return view('admin.posts.create', $this->formData());
    }

    public function store(StorePostRequest $request, GenerateUniqueSlug $slugger): RedirectResponse
    {
        $validated = $request->validated();
        $post = Post::create([
            ...$validated,
            'user_id' => $request->user()->id,
            'slug' => $slugger->handle(Post::class, $validated['title']),
            'published_at' => $this->publishedAt($validated['status'], $validated['published_at'] ?? null),
        ]);
        $post->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('admin.posts.index')->with('toast', [
            'type' => 'success',
            'message' => 'Post created.',
        ]);
    }

    public function show(Post $post): View
    {
        $this->authorize('view', $post);

        return view('admin.posts.show', [
            'post' => $post->load(['category', 'user', 'tags']),
        ]);
    }

    public function edit(Post $post): View
    {
        $this->authorize('update', $post);

        return view('admin.posts.edit', [
            ...$this->formData(),
            'post' => $post->load('tags'),
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post, GenerateUniqueSlug $slugger): RedirectResponse
    {
        $validated = $request->validated();
        $post->update([
            ...$validated,
            'slug' => $slugger->handle(Post::class, $validated['title'], $post->id),
            'published_at' => $this->publishedAt($validated['status'], $validated['published_at'] ?? null),
        ]);
        $post->tags()->sync($validated['tags'] ?? []);

        return redirect()->route('admin.posts.index')->with('toast', [
            'type' => 'success',
            'message' => 'Post updated.',
        ]);
    }

    public function destroy(Post $post): RedirectResponse
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('toast', [
            'type' => 'warning',
            'message' => 'Post deleted.',
        ]);
    }

    private function formData(): array
    {
        return [
            'categories' => Category::orderBy('name')->get(),
            'tags' => Tag::orderBy('name')->get(),
            'statuses' => PostStatus::cases(),
        ];
    }

    private function publishedAt(string $status, ?string $publishedAt): ?Carbon
    {
        if ($status !== PostStatus::Published->value) {
            return $publishedAt ? Carbon::parse($publishedAt) : null;
        }

        return $publishedAt ? Carbon::parse($publishedAt) : now();
    }
}

