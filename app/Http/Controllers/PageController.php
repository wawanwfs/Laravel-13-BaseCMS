<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('pages.home', [
            'featuredPosts' => Post::published()->with(['category', 'user', 'tags'])->latest('published_at')->take(3)->get(),
            'stats' => [
                'posts' => Post::published()->count(),
                'categories' => Category::count(),
                'tags' => Tag::count(),
                'authors' => User::whereHas('posts')->count(),
            ],
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function contact(): View
    {
        return view('pages.contact');
    }

    public function terms(): View
    {
        return view('pages.terms');
    }

    public function privacy(): View
    {
        return view('pages.privacy');
    }
}

