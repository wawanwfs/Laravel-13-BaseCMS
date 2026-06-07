@props(['variant' => 'primary', 'href' => null])
@php
    $classes = [
        'primary' => 'bg-slate-950 text-white shadow-lg shadow-slate-950/10 hover:-translate-y-0.5 hover:bg-slate-800 active:translate-y-0 dark:bg-white dark:text-slate-950 dark:shadow-black/20 dark:hover:bg-slate-200',
        'secondary' => 'border border-slate-200 bg-white text-slate-800 shadow-sm hover:-translate-y-0.5 hover:bg-slate-50 active:translate-y-0 dark:border-white/10 dark:bg-white/10 dark:text-white dark:hover:bg-white/15',
        'danger' => 'bg-rose-600 text-white shadow-lg shadow-rose-600/15 hover:-translate-y-0.5 hover:bg-rose-700 active:translate-y-0',
        'ghost' => 'text-slate-700 hover:bg-slate-100 dark:text-slate-200 dark:hover:bg-white/10',
    ][$variant] ?? '';
    $base = "min-h-11 cursor-pointer items-center justify-center gap-2 rounded-xl px-4 py-2.5 text-sm font-semibold transition duration-200 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-teal-500/25 disabled:cursor-not-allowed disabled:opacity-50 {$classes}";
@endphp
@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "inline-flex {$base}"]) }}>{{ $slot }}</a>
@else
    <button {{ $attributes->merge(['class' => "inline-flex {$base}"]) }}>{{ $slot }}</button>
@endif
