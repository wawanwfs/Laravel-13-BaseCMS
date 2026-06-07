<x-layouts.guest title="Register - BaseCMS Starter">
    <h1 class="text-2xl font-semibold">Register</h1>
    <form class="mt-6 space-y-4" method="POST" action="{{ route('register') }}">
        @csrf
        <div>
            <label class="text-sm font-medium" for="name">Name</label>
            <x-input id="name" name="name" value="{{ old('name') }}" autocomplete="name" required />
            @error('name') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="text-sm font-medium" for="email">Email</label>
            <x-input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required />
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
        <x-button class="w-full">Create account</x-button>
    </form>
    <p class="mt-5 text-sm">Already registered? <a href="{{ route('login') }}" class="font-semibold">Login</a></p>
</x-layouts.guest>
