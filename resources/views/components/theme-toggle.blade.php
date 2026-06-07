<button type="button" class="grid size-11 cursor-pointer place-items-center rounded-full border border-slate-200 bg-white text-slate-700 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:bg-slate-50 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-teal-500/25 active:translate-y-0 dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15" @click="toggle()" aria-label="Toggle theme" title="Toggle theme">
    <span x-show="!isDark" x-cloak><x-icon name="moon" class="size-5" /></span>
    <span x-show="isDark" x-cloak><x-icon name="sun" class="size-5" /></span>
</button>
