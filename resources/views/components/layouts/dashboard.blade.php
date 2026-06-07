@props(['title' => 'Dashboard'])
<x-layouts.app :title="$title">
    <div class="min-h-dvh border-t border-slate-200 bg-[radial-gradient(circle_at_20%_0%,rgba(20,184,166,.10),transparent_28%),linear-gradient(180deg,#f8fafc,#eef2f7)] dark:border-white/10 dark:bg-[radial-gradient(circle_at_20%_0%,rgba(20,184,166,.16),transparent_26%),linear-gradient(180deg,#020617,#0f172a)]">
        <div class="mx-auto grid max-w-7xl gap-6 px-4 py-6 lg:grid-cols-[280px_1fr]">
            <x-sidebar />
            <section class="min-w-0">
                <div class="mb-6 flex flex-wrap items-center justify-between gap-3 rounded-2xl border border-white/70 bg-white/70 p-4 shadow-sm backdrop-blur-xl dark:border-white/10 dark:bg-white/[0.06]">
                    <div>
                        <p class="text-sm font-medium text-teal-700 dark:text-teal-300">Dashboard</p>
                        <h1 class="text-2xl font-semibold">{{ $title }}</h1>
                    </div>
                    <x-theme-toggle />
                </div>
                {{ $slot }}
            </section>
        </div>
    </div>
</x-layouts.app>
