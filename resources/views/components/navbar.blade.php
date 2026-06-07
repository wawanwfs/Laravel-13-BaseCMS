@php
    $navLink = 'min-h-11 rounded-xl px-3 py-2.5 transition focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-teal-500/25';
    $active = 'bg-slate-100 text-slate-950 dark:bg-white/10 dark:text-white';
    $inactive = 'text-slate-600 hover:bg-slate-100 hover:text-slate-950 dark:text-slate-300 dark:hover:bg-white/10 dark:hover:text-white';
@endphp
<header class="sticky top-0 z-40 border-b border-slate-200/70 bg-white/85 backdrop-blur-xl dark:border-white/10 dark:bg-slate-950/85" x-data="{ open: false }">
    <nav class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4">
        <a href="{{ route('home') }}" class="flex min-h-11 items-center gap-3 rounded-xl font-semibold transition focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-teal-500/25">
            <span class="grid size-11 place-items-center rounded-2xl bg-slate-950 text-white shadow-lg shadow-slate-300/70 dark:bg-white dark:text-slate-950 dark:shadow-none">
                <x-icon name="sparkles" class="size-5" />
            </span>
            <span class="tracking-tight">BaseCMS</span>
        </a>
        <div class="hidden items-center gap-1 text-sm font-medium md:flex">
            <a class="{{ $navLink }} {{ request()->routeIs('blog.*') ? $active : $inactive }}" href="{{ route('blog.index') }}">Blog</a>
            <a class="{{ $navLink }} {{ request()->routeIs('about') ? $active : $inactive }}" href="{{ route('about') }}">About</a>
            <a class="{{ $navLink }} {{ request()->routeIs('contact') ? $active : $inactive }}" href="{{ route('contact') }}">Contact</a>
        </div>
        <div class="hidden items-center gap-3 md:flex">
            <x-theme-toggle />
            @auth
                <x-button :href="route('dashboard')"><x-icon name="bar-chart" class="size-4" /> Dashboard</x-button>
            @else
                <x-button :href="route('login')" variant="ghost">Login</x-button>
                <x-button :href="route('register')">Register</x-button>
            @endauth
        </div>
        <button type="button" class="grid size-11 cursor-pointer place-items-center rounded-xl border border-slate-200 bg-white shadow-sm transition focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-teal-500/25 md:hidden dark:border-white/10 dark:bg-white/10" @click="open = ! open" :aria-expanded="open.toString()" aria-controls="mobile-navigation" aria-label="Toggle navigation">
            <span x-show="!open"><x-icon name="menu" class="size-5" /></span>
            <span x-show="open" x-cloak><x-icon name="x" class="size-5" /></span>
        </button>
    </nav>
    <div id="mobile-navigation" class="border-t border-slate-200 bg-white/95 px-4 py-4 shadow-xl dark:border-white/10 dark:bg-slate-950/95 md:hidden" x-show="open" x-transition x-cloak>
        <div class="flex flex-col gap-2 text-sm font-medium">
            <a class="{{ $navLink }} {{ request()->routeIs('blog.*') ? $active : $inactive }}" href="{{ route('blog.index') }}">Blog</a>
            <a class="{{ $navLink }} {{ request()->routeIs('about') ? $active : $inactive }}" href="{{ route('about') }}">About</a>
            <a class="{{ $navLink }} {{ request()->routeIs('contact') ? $active : $inactive }}" href="{{ route('contact') }}">Contact</a>
            @auth
                <a class="{{ $navLink }} {{ request()->routeIs('dashboard', 'admin.*', 'superadmin.*') ? $active : $inactive }}" href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a class="{{ $navLink }} {{ request()->routeIs('login') ? $active : $inactive }}" href="{{ route('login') }}">Login</a>
                <a class="{{ $navLink }} {{ request()->routeIs('register') ? $active : $inactive }}" href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </div>
</header>
