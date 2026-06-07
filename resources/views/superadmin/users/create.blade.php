<x-layouts.dashboard title="Create User">
    <x-card class="p-6"><form method="POST" action="{{ route('superadmin.users.store') }}" class="space-y-4">@include('superadmin.users.partials.form', ['managedUser' => null])<x-button>Create user</x-button></form></x-card>
</x-layouts.dashboard>

