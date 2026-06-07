@csrf
<div><label class="text-sm font-medium">Title</label><x-input name="title" value="{{ old('title', $post?->title) }}" required />@error('title') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror</div>
<div><label class="text-sm font-medium">Category</label><x-select name="category_id" required><option value="">Select category</option>@foreach ($categories as $category)<option value="{{ $category->id }}" @selected(old('category_id', $post?->category_id) == $category->id)>{{ $category->name }}</option>@endforeach</x-select>@error('category_id') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror</div>
<div><label class="text-sm font-medium">Excerpt</label><x-textarea name="excerpt" rows="3" required>{{ old('excerpt', $post?->excerpt) }}</x-textarea>@error('excerpt') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror</div>
<div><label class="text-sm font-medium">Content</label><x-textarea name="content" rows="10" required>{{ old('content', $post?->content) }}</x-textarea>@error('content') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror</div>
<div class="grid gap-4 md:grid-cols-2">
    <div><label class="text-sm font-medium">Status</label><x-select name="status">@foreach ($statuses as $status)<option value="{{ $status->value }}" @selected(old('status', $post?->status?->value ?? 'draft') === $status->value)>{{ $status->label() }}</option>@endforeach</x-select></div>
    <div><label class="text-sm font-medium">Published at</label><x-input name="published_at" type="datetime-local" value="{{ old('published_at', $post?->published_at?->format('Y-m-d\\TH:i')) }}" /></div>
</div>
<div><label class="text-sm font-medium">Featured image URL</label><x-input name="featured_image" value="{{ old('featured_image', $post?->featured_image) }}" /></div>
<div>
    <p class="text-sm font-medium">Tags</p>
    <div class="mt-2 grid gap-2 sm:grid-cols-2 md:grid-cols-3">
        @foreach ($tags as $tag)
            <label class="flex min-h-11 items-center gap-2 rounded-xl border border-slate-200 px-3 py-2 text-sm transition hover:bg-slate-50 dark:border-white/10 dark:hover:bg-white/5"><input class="size-4 rounded border-slate-300 text-teal-600 focus:ring-teal-500" type="checkbox" name="tags[]" value="{{ $tag->id }}" @checked(in_array($tag->id, old('tags', $post?->tags->pluck('id')->all() ?? [])))> {{ $tag->name }}</label>
        @endforeach
    </div>
</div>
