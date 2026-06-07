<x-layouts.app title="BaseCMS Starter - Laravel Blade CMS Foundation" meta-description="A premium Laravel Blade-only CMS starter kit with roles, blog, dashboards, and reusable components.">
    <section class="relative overflow-hidden px-4 py-16 sm:py-20">
        <div class="absolute inset-0 -z-10 bg-[linear-gradient(135deg,rgba(20,184,166,.14),transparent_34%),linear-gradient(180deg,#f8fafc,#eef2f7)] dark:bg-[linear-gradient(135deg,rgba(20,184,166,.16),transparent_34%),linear-gradient(180deg,#020617,#0f172a)]"></div>
        <div class="mx-auto grid max-w-7xl items-center gap-12 lg:grid-cols-[1fr_520px]">
            <div>
                <p class="inline-flex items-center gap-2 rounded-full border border-teal-200 bg-teal-50 px-4 py-2 text-sm font-semibold text-teal-800 dark:border-teal-400/20 dark:bg-teal-400/10 dark:text-teal-200">
                    <x-icon name="sparkles" class="size-4" /> Base Blog CMS Starter Kit
                </p>
                <h1 class="mt-6 max-w-4xl text-4xl font-semibold leading-tight tracking-tight sm:text-6xl">A reusable Laravel foundation for content-first websites.</h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600 dark:text-slate-300">Build blogs, company sites, dashboards, portals, and internal tools from a Blade-only architecture with roles, policies, reusable UI, dark mode, and CMS workflows already in place.</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <x-button :href="route('blog.index')">Explore Blog <x-icon name="arrow-right" class="size-4" /></x-button>
                    @guest
                        <x-button :href="route('register')" variant="secondary">Create Account</x-button>
                    @endguest
                </div>
            </div>
            <div class="relative h-[430px] [perspective:1200px] max-lg:hidden">
                <div class="absolute left-10 top-4 w-72 rotate-[-7deg] rounded-3xl border border-white/70 bg-white/85 p-5 shadow-2xl shadow-slate-300/60 backdrop-blur-xl transition duration-500 hover:rotate-0 dark:border-white/10 dark:bg-white/10 dark:shadow-black/30">
                    <p class="text-sm text-slate-500 dark:text-slate-400">CMS Health</p>
                    <p class="mt-3 text-4xl font-semibold">98%</p>
                    <div class="mt-5 h-3 rounded-full bg-slate-200 dark:bg-white/10"><div class="h-3 w-[88%] rounded-full bg-teal-500"></div></div>
                </div>
                <div class="absolute right-2 top-28 w-80 rotate-[6deg] rounded-3xl border border-white/10 bg-slate-950 p-6 text-white shadow-2xl shadow-slate-400/40 transition duration-500 hover:rotate-0 dark:shadow-black/40">
                    <p class="text-sm text-teal-200">Publishing Queue</p>
                    <p class="mt-4 text-2xl font-semibold">Drafts, reviews, and live articles</p>
                    <div class="mt-6 grid grid-cols-3 gap-3 text-center text-sm">
                        <span class="rounded-2xl bg-white/10 p-3">Role</span>
                        <span class="rounded-2xl bg-white/10 p-3">Policy</span>
                        <span class="rounded-2xl bg-white/10 p-3">Toast</span>
                    </div>
                </div>
                <div class="absolute bottom-6 left-16 w-80 rotate-[-2deg] rounded-3xl border border-white/70 bg-white/90 p-5 shadow-2xl shadow-slate-300/70 backdrop-blur-xl dark:border-white/10 dark:bg-white/10 dark:shadow-black/30">
                    <p class="font-semibold">Reusable Blade System</p>
                    <p class="mt-2 text-sm text-slate-600 dark:text-slate-300">Layouts, cards, inputs, badges, blog cards, stats, and dashboard navigation.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="px-4 py-16">
        <div class="mx-auto grid max-w-7xl gap-4 md:grid-cols-4">
            @foreach ($stats as $label => $value)
                    <x-card class="p-6 reveal transition duration-200 hover:-translate-y-0.5 hover:shadow-xl">
                        <p class="text-sm capitalize text-slate-500 dark:text-slate-400">{{ $label }}</p>
                        <p class="mt-3 text-3xl font-semibold">{{ $value }}</p>
                    </x-card>
            @endforeach
        </div>
    </section>

    <section class="px-4 py-16">
        <div class="mx-auto max-w-7xl">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold uppercase tracking-[.2em] text-rose-600 dark:text-rose-300">Feature Set</p>
                <h2 class="mt-3 text-3xl font-semibold">Built for reusable website work.</h2>
            </div>
            <div class="mt-8 grid gap-4 md:grid-cols-3">
                @foreach (['Blade-only auth and dashboards', 'Role middleware plus policies', 'Blog CMS with slugs and archives', 'Central toast notifications', 'Light and dark theme support', 'Factories, seeders, and tests'] as $feature)
                    <x-card class="reveal p-6 transition duration-200 hover:-translate-y-0.5 hover:shadow-xl">
                        <div class="mb-4 grid size-10 place-items-center rounded-xl bg-teal-50 text-teal-700 dark:bg-teal-400/10 dark:text-teal-200">
                            <x-icon name="check-circle" class="size-5" />
                        </div>
                        <p class="text-lg font-semibold">{{ $feature }}</p>
                        <p class="mt-3 text-sm leading-6 text-slate-600 dark:text-slate-300">A practical baseline that can be adapted for content, service, portfolio, portal, and internal admin projects.</p>
                    </x-card>
                @endforeach
            </div>
        </div>
    </section>

    <section class="px-4 py-16">
        <div class="mx-auto max-w-7xl">
            <div class="flex items-end justify-between gap-4">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[.2em] text-teal-600 dark:text-teal-300">Latest Writing</p>
                    <h2 class="mt-3 text-3xl font-semibold">Blog preview</h2>
                </div>
                <x-button :href="route('blog.index')" variant="secondary">View all <x-icon name="arrow-right" class="size-4" /></x-button>
            </div>
            <div class="mt-8 grid gap-5 md:grid-cols-3">
                @forelse ($featuredPosts as $post)
                    <x-blog-card :post="$post" />
                @empty
                    <x-card class="p-6 md:col-span-3">No published posts yet.</x-card>
                @endforelse
            </div>
        </div>
    </section>

    <section class="px-4 py-16">
        <div class="mx-auto flex max-w-7xl flex-col gap-6 rounded-[2rem] bg-slate-950 p-8 text-white shadow-2xl shadow-slate-300 dark:shadow-black/40 md:flex-row md:items-center md:justify-between md:p-12">
            <div class="max-w-3xl">
                <h2 class="text-3xl font-semibold">Start from a real CMS base instead of a blank page.</h2>
                <p class="mt-4 text-slate-300">Use the seeded accounts to explore user, admin, and superadmin workflows, then adapt the foundation for your next Laravel site.</p>
            </div>
            <x-button :href="route('login')" variant="secondary" class="border-white/20 bg-white/10 text-white hover:bg-white/15">Open dashboard</x-button>
        </div>
    </section>
</x-layouts.app>
