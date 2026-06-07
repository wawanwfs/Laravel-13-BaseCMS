<x-layouts.dashboard title="Create Tag"><x-card class="p-6"><form method="POST" action="{{ route('admin.tags.store') }}" class="space-y-4">@include('admin.tags.partials.form', ['tag' => null])<x-button>Create tag</x-button></form></x-card></x-layouts.dashboard>

