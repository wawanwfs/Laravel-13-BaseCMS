<x-layouts.dashboard title="Edit User">
    <x-card class="p-6"><form method="POST" action="{{ route('superadmin.users.update', $user) }}" class="space-y-4">@method('PUT')@include('superadmin.users.partials.form', ['managedUser' => $user])<x-button>Save user</x-button></form></x-card>
</x-layouts.dashboard>

