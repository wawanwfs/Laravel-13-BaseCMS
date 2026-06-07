<x-layouts.dashboard title="Create Category"><x-card class="p-6"><form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-4">@include('admin.categories.partials.form', ['category' => null])<x-button>Create category</x-button></form></x-card></x-layouts.dashboard>

