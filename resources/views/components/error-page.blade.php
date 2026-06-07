@props([
    'code',
    'title',
    'message',
    'eyebrow' => 'Something needs attention',
    'icon' => 'alert-circle',
])

<x-layouts.app :title="$code . ' - ' . $title" :meta-description="$message">
    <section class="relative overflow-hidden px-4 py-16 sm:py-20">
        <div class="absolute inset-0 -z-10 bg-[linear-gradient(180deg,#f8fafc,#eef2f7),radial-gradient(circle_at_22%_18%,rgba(20,184,166,.15),transparent_28%)] dark:bg-[linear-gradient(180deg,#020617,#0f172a),radial-gradient(circle_at_22%_18%,rgba(20,184,166,.18),transparent_28%)]"></div>
        <div class="mx-auto grid min-h-[calc(100dvh-14rem)] max-w-6xl items-center gap-10 lg:grid-cols-[1fr_420px]">
            <div>
                <p class="inline-flex items-center gap-2 rounded-full border border-teal-200 bg-teal-50 px-4 py-2 text-sm font-semibold text-teal-800 dark:border-teal-400/20 dark:bg-teal-400/10 dark:text-teal-200">
                    <x-icon :name="$icon" class="size-4" />
                    {{ $eyebrow }}
                </p>
                <h1 class="mt-6 max-w-3xl text-4xl font-semibold tracking-tight sm:text-6xl">{{ $title }}</h1>
                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600 dark:text-slate-300">{{ $message }}</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <x-button :href="route('home')">
                        <x-icon name="home" class="size-4" />
                        Back home
                    </x-button>
                    <x-button :href="route('blog.index')" variant="secondary">
                        <x-icon name="book-open" class="size-4" />
                        Browse blog
                    </x-button>
                    @auth
                        <x-button :href="route('dashboard')" variant="secondary">
                            <x-icon name="bar-chart" class="size-4" />
                            Dashboard
                        </x-button>
                    @endauth
                </div>
            </div>

            <x-card class="relative overflow-hidden p-8">
                <div class="absolute -right-12 -top-12 size-40 rounded-full bg-teal-500/10 blur-2xl"></div>
                <div class="relative">
                    <div class="grid size-16 place-items-center rounded-3xl bg-slate-950 text-white shadow-xl shadow-slate-300/60 dark:bg-white dark:text-slate-950 dark:shadow-black/30">
                        <x-icon :name="$icon" class="size-8" />
                    </div>
                    <p class="mt-8 text-sm font-semibold uppercase tracking-[.25em] text-slate-500 dark:text-slate-400">Error code</p>
                    <p class="mt-3 text-7xl font-semibold tracking-tight text-slate-950 dark:text-white">{{ $code }}</p>
                    <div class="mt-8 rounded-2xl border border-slate-200 bg-slate-50 p-4 text-sm leading-6 text-slate-600 dark:border-white/10 dark:bg-white/5 dark:text-slate-300">
                        If this keeps happening, return to a safe page and try the action again from there.
                    </div>
                </div>
            </x-card>
        </div>
    </section>
</x-layouts.app>

