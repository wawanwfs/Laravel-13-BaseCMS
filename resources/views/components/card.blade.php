@props(['class' => ''])
<div {{ $attributes->merge(['class' => "rounded-2xl border border-slate-200/80 bg-white/90 shadow-sm shadow-slate-200/60 backdrop-blur-xl dark:border-white/10 dark:bg-white/[0.06] dark:shadow-black/20 {$class}"]) }}>
    {{ $slot }}
</div>
