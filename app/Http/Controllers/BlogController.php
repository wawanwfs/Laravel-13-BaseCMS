<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(Request $request): View
    {
        $posts = Post::published()
            ->with(['category', 'user', 'tags'])
            ->when($request->string('search')->isNotEmpty(), function ($query) use ($request) {
                $search = $request->string('search')->toString();
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('excerpt', 'like', "%{$search}%");
                });
            })
            ->latest('published_at')
            ->paginate(9)
            ->withQueryString();

        return view('blog.index', [
            'posts' => $posts,
            'categories' => Category::withCount(['posts' => fn ($query) => $query->published()])->get(),
            'tags' => Tag::withCount(['posts' => fn ($query) => $query->published()])->get(),
        ]);
    }

    public function show(Post $post): View
    {
        abort_unless($post->isPublished() || auth()->user()?->can('view', $post), 404);

        return view('blog.show', [
            'post' => $post->load(['category', 'user', 'tags']),
        ]);
    }

    public function category(Category $category): View
    {
        return view('blog.archive', [
            'title' => "Category: {$category->name}",
            'posts' => $category->posts()->published()->with(['category', 'user', 'tags'])->latest('published_at')->paginate(9),
        ]);
    }

    public function tag(Tag $tag): View
    {
        return view('blog.archive', [
            'title' => "Tag: {$tag->name}",
            'posts' => $tag->posts()->published()->with(['category', 'user', 'tags'])->latest('published_at')->paginate(9),
        ]);
    }
}

