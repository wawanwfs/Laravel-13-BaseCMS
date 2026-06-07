<x-layouts.dashboard title="My Dashboard">
    <div class="grid gap-5 md:grid-cols-3">
        <x-dashboard-stat-card label="Role" :value="$user->role->label()" />
        <x-dashboard-stat-card label="Account" :value="$user->is_active ? 'Active' : 'Inactive'" />
        <x-dashboard-stat-card label="Joined" :value="$user->created_at->format('M Y')" />
    </div>
    <x-card class="mt-6 p-6">
        <div class="flex items-center justify-between gap-4">
            <div>
                <p class="text-sm font-medium text-teal-700 dark:text-teal-300">Reading queue</p>
                <h2 class="mt-1 text-xl font-semibold">Latest posts</h2>
            </div>
            <x-button :href="route('blog.index')" variant="secondary">Browse</x-button>
        </div>
        <div class="mt-4 divide-y divide-slate-200 dark:divide-white/10">
            @forelse ($latestPosts as $post)
                <a class="flex min-h-14 items-center justify-between gap-4 rounded-xl px-3 py-3 transition hover:bg-slate-100 hover:text-teal-700 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-teal-500/25 dark:hover:bg-white/10 dark:hover:text-teal-300" href="{{ route('blog.show', $post) }}">
                    <span>{{ $post->title }}</span>
                    <x-icon name="arrow-right" class="size-4 shrink-0" />
                </a>
            @empty
                <p class="py-4 text-sm text-slate-500 dark:text-slate-400">No published posts yet.</p>
            @endforelse
        </div>
    </x-card>
</x-layouts.dashboard>
