<?php

namespace App\Http\Controllers\Admin;

use App\Actions\GenerateUniqueSlug;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $this->authorize('viewAny', Category::class);

        return view('admin.categories.index', [
            'categories' => Category::withCount('posts')->orderBy('name')->paginate(15),
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', Category::class);

        return view('admin.categories.create');
    }

    public function store(StoreCategoryRequest $request, GenerateUniqueSlug $slugger): RedirectResponse
    {
        Category::create([
            ...$request->validated(),
            'slug' => $slugger->handle(Category::class, $request->string('name')->toString()),
        ]);

        return redirect()->route('admin.categories.index')->with('toast', [
            'type' => 'success',
            'message' => 'Category created.',
        ]);
    }

    public function show(Category $category): View
    {
        $this->authorize('view', $category);

        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category): View
    {
        $this->authorize('update', $category);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, Category $category, GenerateUniqueSlug $slugger): RedirectResponse
    {
        $category->update([
            ...$request->validated(),
            'slug' => $slugger->handle(Category::class, $request->string('name')->toString(), $category->id),
        ]);

        return redirect()->route('admin.categories.index')->with('toast', [
            'type' => 'success',
            'message' => 'Category updated.',
        ]);
    }

    public function destroy(Category $category): RedirectResponse
    {
        $this->authorize('delete', $category);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('toast', [
            'type' => 'warning',
            'message' => 'Category deleted.',
        ]);
    }
}
