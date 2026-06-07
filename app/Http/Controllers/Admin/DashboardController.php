<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'stats' => [
                'posts' => Post::count(),
                'published' => Post::published()->count(),
                'categories' => Category::count(),
                'tags' => Tag::count(),
                'users' => User::count(),
            ],
            'recentPosts' => Post::with(['category', 'user'])->latest()->take(6)->get(),
        ]);
    }
}

