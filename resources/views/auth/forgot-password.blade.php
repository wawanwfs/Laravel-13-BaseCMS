<x-layouts.guest title="Forgot Password - BaseCMS Starter">
    <h1 class="text-2xl font-semibold">Forgot password</h1>
    <form class="mt-6 space-y-4" method="POST" action="{{ route('password.email') }}">
        @csrf
        <div>
            <label class="text-sm font-medium" for="email">Email</label>
            <x-input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required autofocus />
            @error('email') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
        </div>
        <x-button class="w-full">Send reset link</x-button>
    </form>
</x-layouts.guest>
