<x-layouts.dashboard title="User Management">
    <div class="mb-4 flex justify-end"><x-button :href="route('superadmin.users.create')"><x-icon name="plus" class="size-4" /> New user</x-button></div>
    <x-card class="overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-100 dark:bg-white/5"><tr><th class="p-4">Name</th><th>Email</th><th>Role</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody class="divide-y divide-slate-200 dark:divide-white/10">
                @foreach ($users as $user)
                    <tr>
                        <td class="p-4 font-medium">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><x-badge>{{ $user->role->label() }}</x-badge></td>
                        <td>{{ $user->is_active ? 'Active' : 'Inactive' }}</td>
                        <td class="space-x-2">
                            <a href="{{ route('superadmin.users.show', $user) }}">View</a>
                            <a href="{{ route('superadmin.users.edit', $user) }}">Edit</a>
                            @if (auth()->id() !== $user->id)
                                <form class="inline" method="POST" action="{{ route('superadmin.users.destroy', $user) }}" onsubmit="return confirm('Delete this user?')">@csrf @method('DELETE')<button class="text-rose-600">Delete</button></form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card>
    <x-pagination-wrapper :items="$users" />
</x-layouts.dashboard>
