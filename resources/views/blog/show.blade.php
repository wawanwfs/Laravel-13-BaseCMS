<x-layouts.app :title="$post->title">
    <article class="px-4 py-14">
        <div class="mx-auto max-w-3xl">
            <a href="{{ route('blog.index') }}" class="text-sm font-semibold text-teal-700 dark:text-teal-300">Back to blog</a>
            <h1 class="mt-5 text-4xl font-semibold leading-tight md:text-5xl">{{ $post->title }}</h1>
            <div class="mt-5 flex flex-wrap items-center gap-3 text-sm text-slate-500 dark:text-slate-400">
                <span>{{ $post->user->name }}</span>
                <span>{{ $post->published_at?->format('M d, Y') }}</span>
                <a class="text-teal-700 dark:text-teal-300" href="{{ route('blog.category', $post->category) }}">{{ $post->category->name }}</a>
            </div>
            <div class="mt-8 aspect-[16/8] rounded-3xl bg-gradient-to-br from-teal-500 via-slate-950 to-rose-500"></div>
            <div class="prose prose-slate mt-10 max-w-none dark:prose-invert">
                @foreach (preg_split("/\n\s*\n/", $post->content) as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>
            <div class="mt-8 flex flex-wrap gap-2">
                @foreach ($post->tags as $tag)
                    <a href="{{ route('blog.tag', $tag) }}"><x-badge>{{ $tag->name }}</x-badge></a>
                @endforeach
            </div>
        </div>
    </article>
</x-layouts.app>

