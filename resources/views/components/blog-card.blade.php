@props(['post'])
<article class="group flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm shadow-slate-200/60 transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-200/80 dark:border-white/10 dark:bg-white/[0.06] dark:shadow-black/20 dark:hover:shadow-black/40">
    <a href="{{ route('blog.show', $post) }}" class="relative block aspect-[16/9] overflow-hidden bg-slate-900 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-teal-500/25">
        <div class="absolute inset-0 bg-[linear-gradient(135deg,rgba(20,184,166,.95),rgba(15,23,42,.92)_48%,rgba(244,63,94,.85))] transition duration-500 group-hover:scale-105"></div>
        <div class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-slate-900 shadow-sm">{{ $post->category->name }}</div>
        <div class="absolute bottom-4 left-4 right-4 flex items-center gap-2 text-xs font-medium text-white/85">
            <x-icon name="book-open" class="size-4" />
            <span>{{ $post->published_at?->format('M d, Y') }}</span>
        </div>
    </a>
    <div class="flex flex-1 flex-col p-5">
        <h2 class="mt-3 text-xl font-semibold leading-snug group-hover:text-teal-600 dark:group-hover:text-teal-300">
            <a class="rounded-lg focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-teal-500/25" href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
        </h2>
        <p class="mt-3 flex-1 text-sm leading-6 text-slate-600 dark:text-slate-300">{{ $post->excerpt }}</p>
        <div class="mt-5 flex items-center justify-between gap-3">
            <div class="flex flex-wrap gap-2">
                @foreach ($post->tags->take(2) as $tag)
                    <a class="rounded-full focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-teal-500/25" href="{{ route('blog.tag', $tag) }}"><x-badge>{{ $tag->name }}</x-badge></a>
                @endforeach
            </div>
            <a href="{{ route('blog.show', $post) }}" class="grid size-10 shrink-0 place-items-center rounded-full bg-slate-100 text-slate-700 transition group-hover:bg-slate-950 group-hover:text-white focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-teal-500/25 dark:bg-white/10 dark:text-slate-200 dark:group-hover:bg-white dark:group-hover:text-slate-950" aria-label="Read {{ $post->title }}">
                <x-icon name="arrow-right" class="size-4" />
            </a>
        </div>
    </div>
</article>
