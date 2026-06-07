<x-layouts.dashboard title="Edit Post">
    <x-card class="p-6">
        <form method="POST" action="{{ route('admin.posts.update', $post) }}" class="space-y-4">
            @method('PUT')
            @include('admin.posts.partials.form', ['post' => $post])
            <x-button>Save post</x-button>
        </form>
    </x-card>
</x-layouts.dashboard>

