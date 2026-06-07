<x-layouts.dashboard title="Edit Profile">
    <x-card class="p-6">
        <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
            @csrf
            @method('PATCH')
            <div>
                <label class="text-sm font-medium">Name</label>
                <x-input name="name" value="{{ old('name', $user->name) }}" autocomplete="name" required />
                @error('name') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="text-sm font-medium">Email</label>
                <x-input name="email" type="email" value="{{ old('email', $user->email) }}" autocomplete="email" required />
                @error('email') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
            </div>
            <x-button>Save profile</x-button>
        </form>
    </x-card>
    <x-card class="mt-6 p-6">
        <h2 class="text-lg font-semibold">Delete account</h2>
        <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4 flex flex-col gap-3 md:flex-row">
            @csrf
            @method('DELETE')
            <x-input name="password" type="password" autocomplete="current-password" placeholder="Confirm password" required />
            <x-button variant="danger">Delete</x-button>
        </form>
        @error('password') <p class="mt-2 text-sm text-rose-600">{{ $message }}</p> @enderror
    </x-card>
</x-layouts.dashboard>
