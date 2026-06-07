<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(Request $request): View|RedirectResponse
    {
        if ($request->user()->isSuperadmin()) {
            return redirect()->route('admin.dashboard');
        }

        if ($request->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return view('dashboard.user', [
            'user' => $request->user(),
            'latestPosts' => Post::published()->with(['category', 'user'])->latest('published_at')->take(5)->get(),
        ]);
    }
}

