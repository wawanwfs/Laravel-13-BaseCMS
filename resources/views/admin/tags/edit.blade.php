<x-layouts.dashboard title="Edit Tag"><x-card class="p-6"><form method="POST" action="{{ route('admin.tags.update', $tag) }}" class="space-y-4">@method('PUT')@include('admin.tags.partials.form', ['tag' => $tag])<x-button>Save tag</x-button></form></x-card></x-layouts.dashboard>

