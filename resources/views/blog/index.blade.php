<x-layouts.app title="Blog - BaseCMS Starter">
    <section class="px-4 py-14">
        <div class="mx-auto max-w-7xl">
            <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <div>
                    <h1 class="text-4xl font-semibold">Blog</h1>
                    <p class="mt-3 max-w-2xl text-slate-600 dark:text-slate-300">Published articles from the starter CMS.</p>
                </div>
                <form class="flex w-full gap-2 md:w-auto" method="GET" action="{{ route('blog.index') }}">
                    <x-input name="search" placeholder="Search posts" value="{{ request('search') }}" />
                    <x-button><x-icon name="search" class="size-4" /> Search</x-button>
                </form>
            </div>
            <div class="mt-8 flex flex-wrap gap-2">
                @foreach ($categories as $category)
                    <a href="{{ route('blog.category', $category) }}"><x-badge>{{ $category->name }} {{ $category->posts_count }}</x-badge></a>
                @endforeach
                @foreach ($tags->take(8) as $tag)
                    <a href="{{ route('blog.tag', $tag) }}"><x-badge tone="green">{{ $tag->name }}</x-badge></a>
                @endforeach
            </div>
            <div class="mt-8 grid gap-5 md:grid-cols-3">
                @forelse ($posts as $post)
                    <x-blog-card :post="$post" />
                @empty
                    <x-card class="p-6 md:col-span-3">No published posts match this search.</x-card>
                @endforelse
            </div>
            <x-pagination-wrapper :items="$posts" />
        </div>
    </section>
</x-layouts.app>
