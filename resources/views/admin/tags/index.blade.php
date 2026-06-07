<x-layouts.dashboard title="Tags">
    <div class="mb-4 flex justify-end"><x-button :href="route('admin.tags.create')"><x-icon name="plus" class="size-4" /> New tag</x-button></div>
    <x-card class="overflow-hidden"><table class="w-full text-left text-sm"><thead class="bg-slate-100 dark:bg-white/5"><tr><th class="p-4">Name</th><th>Posts</th><th>Actions</th></tr></thead><tbody class="divide-y divide-slate-200 dark:divide-white/10">@foreach ($tags as $tag)<tr><td class="p-4 font-medium">{{ $tag->name }}</td><td>{{ $tag->posts_count }}</td><td class="space-x-2"><a href="{{ route('admin.tags.edit', $tag) }}">Edit</a><form class="inline" method="POST" action="{{ route('admin.tags.destroy', $tag) }}" onsubmit="return confirm('Delete this tag?')">@csrf @method('DELETE')<button class="text-rose-600">Delete</button></form></td></tr>@endforeach</tbody></table></x-card>
    <x-pagination-wrapper :items="$tags" />
</x-layouts.dashboard>
