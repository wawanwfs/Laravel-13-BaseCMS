<footer class="border-t border-slate-200 bg-white py-10 dark:border-white/10 dark:bg-slate-950">
    <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 text-sm text-slate-500 md:flex-row md:items-center md:justify-between dark:text-slate-400">
        <p>&copy; {{ date('Y') }} BaseCMS Starter. Built with Laravel and Blade.</p>
        <div class="flex flex-wrap gap-2">
            <a class="rounded-lg px-3 py-2 transition hover:bg-slate-100 hover:text-slate-900 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-teal-500/25 dark:hover:bg-white/10 dark:hover:text-white" href="{{ route('terms') }}">Terms</a>
            <a class="rounded-lg px-3 py-2 transition hover:bg-slate-100 hover:text-slate-900 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-teal-500/25 dark:hover:bg-white/10 dark:hover:text-white" href="{{ route('privacy') }}">Privacy</a>
        </div>
    </div>
</footer>
