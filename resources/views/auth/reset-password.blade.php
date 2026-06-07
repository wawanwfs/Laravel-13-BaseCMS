<x-layouts.guest title="Reset Password - BaseCMS Starter">
    <h1 class="text-2xl font-semibold">Reset password</h1>
    <form class="mt-6 space-y-4" method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div>
            <label class="text-sm font-medium" for="email">Email</label>
            <x-input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" autocomplete="email" required />
            @error('email') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="text-sm font-medium" for="password">Password</label>
            <x-input id="password" name="password" type="password" autocomplete="new-password" required />
            @error('password') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="text-sm font-medium" for="password_confirmation">Confirm Password</label>
            <x-input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required />
        </div>
        <x-button class="w-full">Reset password</x-button>
    </form>
</x-layouts.guest>
