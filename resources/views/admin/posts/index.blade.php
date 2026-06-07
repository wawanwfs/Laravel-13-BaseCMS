<x-layouts.dashboard title="Posts">
    <div class="mb-4 flex justify-end"><x-button :href="route('admin.posts.create')"><x-icon name="plus" class="size-4" /> New post</x-button></div>
    <x-card class="overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-100 dark:bg-white/5"><tr><th class="p-4">Title</th><th>Status</th><th>Category</th><th>Actions</th></tr></thead>
            <tbody class="divide-y divide-slate-200 dark:divide-white/10">
                @foreach ($posts as $post)
                    <tr>
                        <td class="p-4 font-medium">{{ $post->title }}</td>
                        <td><x-badge :tone="$post->status->value === 'published' ? 'green' : 'amber'">{{ $post->status->label() }}</x-badge></td>
                        <td>{{ $post->category->name }}</td>
                        <td class="space-x-2">
                            <a href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                            <form class="inline" method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('Delete this post?')">@csrf @method('DELETE')<button class="text-rose-600">Delete</button></form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card>
    <x-pagination-wrapper :items="$posts" />
</x-layouts.dashboard>
