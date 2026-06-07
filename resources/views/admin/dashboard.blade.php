<x-layouts.dashboard title="Admin Dashboard">
    <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-5">
        @foreach ($stats as $label => $value)
            <x-dashboard-stat-card :label="str($label)->headline()" :value="$value" />
        @endforeach
    </div>
    <x-card class="mt-6 overflow-hidden">
        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-200 p-5 dark:border-white/10">
            <div>
                <p class="text-sm font-medium text-teal-700 dark:text-teal-300">Content activity</p>
                <h2 class="mt-1 text-xl font-semibold">Recent posts</h2>
            </div>
            <x-button :href="route('admin.posts.index')" variant="secondary">Manage posts</x-button>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-100 text-xs uppercase tracking-wide text-slate-600 dark:bg-white/5 dark:text-slate-300"><tr><th class="p-4">Title</th><th class="p-4">Status</th><th class="p-4">Category</th><th class="p-4">Author</th></tr></thead>
                <tbody class="divide-y divide-slate-200 dark:divide-white/10">
                    @foreach ($recentPosts as $post)
                        <tr class="transition hover:bg-slate-50 dark:hover:bg-white/5"><td class="p-4 font-medium">{{ $post->title }}</td><td class="p-4"><x-badge :tone="$post->status->value === 'published' ? 'green' : 'amber'">{{ $post->status->label() }}</x-badge></td><td class="p-4">{{ $post->category->name }}</td><td class="p-4">{{ $post->user->name }}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-card>
</x-layouts.dashboard>
