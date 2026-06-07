<x-layouts.dashboard :title="$post->title">
    <x-card class="p-6">
        <x-badge>{{ $post->status->label() }}</x-badge>
        <p class="mt-4 text-slate-600 dark:text-slate-300">{{ $post->excerpt }}</p>
        <div class="mt-6 whitespace-pre-line">{{ $post->content }}</div>
    </x-card>
</x-layouts.dashboard>

