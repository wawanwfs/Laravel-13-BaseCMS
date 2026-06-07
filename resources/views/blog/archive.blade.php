<x-layouts.app :title="$title">
    <section class="px-4 py-14">
        <div class="mx-auto max-w-7xl">
            <h1 class="text-4xl font-semibold">{{ $title }}</h1>
            <div class="mt-8 grid gap-5 md:grid-cols-3">
                @forelse ($posts as $post)
                    <x-blog-card :post="$post" />
                @empty
                    <x-card class="p-6 md:col-span-3">No published posts here yet.</x-card>
                @endforelse
            </div>
            <x-pagination-wrapper :items="$posts" />
        </div>
    </section>
</x-layouts.app>

