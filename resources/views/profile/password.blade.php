<x-layouts.dashboard title="Change Password">
    <x-card class="p-6">
        <form method="POST" action="{{ route('profile.password.update') }}" class="space-y-4">
            @csrf
            @method('PUT')
            <div><label class="text-sm font-medium">Current password</label><x-input name="current_password" type="password" autocomplete="current-password" required />@error('current_password') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror</div>
            <div><label class="text-sm font-medium">New password</label><x-input name="password" type="password" autocomplete="new-password" required />@error('password') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror</div>
            <div><label class="text-sm font-medium">Confirm password</label><x-input name="password_confirmation" type="password" autocomplete="new-password" required /></div>
            <x-button>Update password</x-button>
        </form>
    </x-card>
</x-layouts.dashboard>
