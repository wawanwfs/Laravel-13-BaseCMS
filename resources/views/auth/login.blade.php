<x-layouts.guest title="Login - BaseCMS Starter">
    <h1 class="text-2xl font-semibold">Login</h1>
    <form class="mt-6 space-y-4" method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label class="text-sm font-medium" for="email">Email</label>
            <x-input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required autofocus />
            @error('email') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="text-sm font-medium" for="password">Password</label>
            <x-input id="password" name="password" type="password" autocomplete="current-password" required />
            @error('password') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
        </div>
        <label class="flex min-h-11 items-center gap-2 rounded-xl text-sm"><input class="size-4 rounded border-slate-300 text-teal-600 focus:ring-teal-500" name="remember" type="checkbox" value="1"> Remember me</label>
        <x-button class="w-full">Login</x-button>
    </form>
    <div class="mt-5 flex justify-between text-sm">
        <a href="{{ route('password.request') }}">Forgot password?</a>
        <a href="{{ route('register') }}">Register</a>
    </div>
</x-layouts.guest>
