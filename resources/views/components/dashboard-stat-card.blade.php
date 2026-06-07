@props(['label', 'value'])
<x-card class="group relative overflow-hidden p-5 transition duration-200 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-slate-200/70 dark:hover:shadow-black/30">
    <div class="absolute right-4 top-4 size-12 rounded-full bg-teal-500/10 blur-xl transition group-hover:bg-teal-500/20"></div>
    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">{{ $label }}</p>
    <p class="mt-3 text-3xl font-semibold tracking-tight">{{ $value }}</p>
</x-card>
