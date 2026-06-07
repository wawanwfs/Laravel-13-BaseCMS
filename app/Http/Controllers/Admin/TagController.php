<?php

namespace App\Http\Controllers\Admin;

use App\Actions\GenerateUniqueSlug;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\StoreTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View
    {
        $this->authorize('viewAny', Tag::class);

        return view('admin.tags.index', [
            'tags' => Tag::withCount('posts')->orderBy('name')->paginate(15),
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', Tag::class);

        return view('admin.tags.create');
    }

    public function store(StoreTagRequest $request, GenerateUniqueSlug $slugger): RedirectResponse
    {
        Tag::create([
            ...$request->validated(),
            'slug' => $slugger->handle(Tag::class, $request->string('name')->toString()),
        ]);

        return redirect()->route('admin.tags.index')->with('toast', [
            'type' => 'success',
            'message' => 'Tag created.',
        ]);
    }

    public function show(Tag $tag): View
    {
        $this->authorize('view', $tag);

        return view('admin.tags.show', compact('tag'));
    }

    public function edit(Tag $tag): View
    {
        $this->authorize('update', $tag);

        return view('admin.tags.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, Tag $tag, GenerateUniqueSlug $slugger): RedirectResponse
    {
        $tag->update([
            ...$request->validated(),
            'slug' => $slugger->handle(Tag::class, $request->string('name')->toString(), $tag->id),
        ]);

        return redirect()->route('admin.tags.index')->with('toast', [
            'type' => 'success',
            'message' => 'Tag updated.',
        ]);
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $this->authorize('delete', $tag);
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('toast', [
            'type' => 'warning',
            'message' => 'Tag deleted.',
        ]);
    }
}
