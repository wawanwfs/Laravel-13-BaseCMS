<x-layouts.dashboard :title="$user->name">
    <x-card class="p-6">
        <dl class="grid gap-4 md:grid-cols-2">
            <div><dt class="text-sm text-slate-500">Email</dt><dd>{{ $user->email }}</dd></div>
            <div><dt class="text-sm text-slate-500">Role</dt><dd>{{ $user->role->label() }}</dd></div>
            <div><dt class="text-sm text-slate-500">Status</dt><dd>{{ $user->is_active ? 'Active' : 'Inactive' }}</dd></div>
            <div><dt class="text-sm text-slate-500">Created</dt><dd>{{ $user->created_at->format('M d, Y') }}</dd></div>
        </dl>
    </x-card>
</x-layouts.dashboard>

