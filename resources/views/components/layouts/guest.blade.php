@props(['title' => 'Authentication'])
<x-layouts.app :title="$title">
    <section class="relative min-h-[calc(100dvh-5rem)] overflow-hidden px-4 py-16">
        <div class="absolute inset-0 -z-10 bg-[linear-gradient(180deg,#f8fafc,#eef2f7),radial-gradient(circle_at_20%_20%,rgba(20,184,166,.16),transparent_28%)] dark:bg-[linear-gradient(180deg,#020617,#0f172a),radial-gradient(circle_at_20%_20%,rgba(20,184,166,.18),transparent_28%)]"></div>
        <div class="mx-auto grid max-w-5xl items-center gap-10 lg:grid-cols-[1fr_420px]">
            <div class="hidden lg:block">
                <p class="inline-flex items-center gap-2 rounded-full border border-teal-200 bg-teal-50 px-4 py-2 text-sm font-semibold text-teal-800 dark:border-teal-400/20 dark:bg-teal-400/10 dark:text-teal-200"><x-icon name="shield" class="size-4" /> CMS Foundation</p>
                <h1 class="mt-4 text-5xl font-semibold leading-tight">Secure Blade workflows for content teams.</h1>
                <p class="mt-5 max-w-xl text-lg text-slate-600 dark:text-slate-300">Sign in to manage content, review dashboards, and keep reusable Laravel projects moving from one clean base.</p>
            </div>
            <x-card class="p-6 shadow-2xl shadow-slate-200/70 dark:shadow-black/30">
                {{ $slot }}
            </x-card>
        </div>
    </section>
</x-layouts.app>
