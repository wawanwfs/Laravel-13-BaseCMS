<x-layouts.dashboard title="Create Post">
    <x-card class="p-6">
        <form method="POST" action="{{ route('admin.posts.store') }}" class="space-y-4">
            @include('admin.posts.partials.form', ['post' => null])
            <x-button>Create post</x-button>
        </form>
    </x-card>
</x-layouts.dashboard>

