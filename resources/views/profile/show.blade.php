<x-layouts.dashboard title="Profile">
    <x-card class="p-6">
        <dl class="grid gap-4 md:grid-cols-2">
            <div><dt class="text-sm text-slate-500">Name</dt><dd class="font-semibold">{{ $user->name }}</dd></div>
            <div><dt class="text-sm text-slate-500">Email</dt><dd class="font-semibold">{{ $user->email }}</dd></div>
            <div><dt class="text-sm text-slate-500">Role</dt><dd class="font-semibold">{{ $user->role->label() }}</dd></div>
            <div><dt class="text-sm text-slate-500">Status</dt><dd class="font-semibold">{{ $user->is_active ? 'Active' : 'Inactive' }}</dd></div>
        </dl>
        <div class="mt-6 flex flex-wrap gap-3">
            <x-button :href="route('profile.edit')"><x-icon name="user" class="size-4" /> Edit profile</x-button>
            <x-button :href="route('profile.password')" variant="secondary"><x-icon name="shield" class="size-4" /> Change password</x-button>
        </div>
    </x-card>
</x-layouts.dashboard>
