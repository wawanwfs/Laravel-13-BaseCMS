@php
    $currentUser = auth()->user();
    $item = function (string $route, string $label, string $icon, string|array $match) {
        $active = request()->routeIs(...(array) $match);
        return [
            'href' => route($route),
            'label' => $label,
            'icon' => $icon,
            'class' => $active
                ? 'bg-slate-950 text-white shadow-lg shadow-slate-950/10 dark:bg-white dark:text-slate-950'
                : 'text-slate-600 hover:bg-slate-100 hover:text-slate-950 dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white',
        ];
    };
    $links = [
        $item('dashboard', 'My Dashboard', 'home', 'dashboard'),
    ];
    if ($currentUser->isAdmin() || $currentUser->isSuperadmin()) {
        $links[] = $item('admin.dashboard', 'Admin Overview', 'bar-chart', 'admin.dashboard');
        $links[] = $item('admin.posts.index', 'Posts', 'file-text', 'admin.posts.*');
        $links[] = $item('admin.categories.index', 'Categories', 'folder', 'admin.categories.*');
        $links[] = $item('admin.tags.index', 'Tags', 'tag', 'admin.tags.*');
    }
    if ($currentUser->isSuperadmin()) {
        $links[] = $item('superadmin.users.index', 'Users', 'users', 'superadmin.users.*');
    }
    $links[] = $item('profile.show', 'Profile', 'user', 'profile.*');
@endphp
<aside class="h-fit rounded-2xl border border-white/70 bg-white/85 p-4 shadow-sm backdrop-blur-xl dark:border-white/10 dark:bg-white/[0.06]">
    <div class="mb-5 rounded-2xl bg-slate-100 p-4 dark:bg-white/10">
        <div class="flex items-center gap-3">
            <div class="grid size-11 place-items-center rounded-2xl bg-teal-600 text-white">
                <x-icon name="shield" class="size-5" />
            </div>
            <div class="min-w-0">
                <p class="truncate font-semibold">{{ $currentUser->name }}</p>
                <p class="text-sm text-slate-500 dark:text-slate-400">{{ $currentUser->role->label() }}</p>
            </div>
        </div>
    </div>
    <nav class="space-y-1 text-sm font-medium" aria-label="Dashboard navigation">
        @foreach ($links as $link)
            <a class="flex min-h-11 items-center gap-3 rounded-xl px-3 py-2.5 transition focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-teal-500/25 {{ $link['class'] }}" href="{{ $link['href'] }}">
                <x-icon :name="$link['icon']" class="size-4 shrink-0" />
                <span>{{ $link['label'] }}</span>
            </a>
        @endforeach
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="flex min-h-11 w-full cursor-pointer items-center gap-3 rounded-xl px-3 py-2.5 text-left text-slate-600 transition hover:bg-slate-100 hover:text-slate-950 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-teal-500/25 dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white">
                <x-icon name="log-out" class="size-4 shrink-0" />
                <span>Logout</span>
            </button>
        </form>
    </nav>
</aside>
