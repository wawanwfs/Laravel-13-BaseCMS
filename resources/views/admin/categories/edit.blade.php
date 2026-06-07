<x-layouts.dashboard title="Edit Category"><x-card class="p-6"><form method="POST" action="{{ route('admin.categories.update', $category) }}" class="space-y-4">@method('PUT')@include('admin.categories.partials.form', ['category' => $category])<x-button>Save category</x-button></form></x-card></x-layouts.dashboard>

