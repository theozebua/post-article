<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('dashboard.categories.index', [
            'title' => 'Categories',
            'categories' => Category::latest()->get()
        ]);
    }

    public function create(): View
    {
        return view('dashboard.categories.create', [
            'title' => 'Add new category'
        ]);
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $data = $request->validated();
        Category::create($data);

        return to_route('categories.index')->with('message', 'Category added successfully');
    }

    public function edit(Category $category): View
    {
        return view('dashboard.categories.edit', [
            'title' => 'Edit category',
            'category' => $category
        ]);
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $data = $request->validated();
        Category::where('id', $category->id)->update($data);

        return to_route('categories.index')->with('message', 'Category updated successfully');
    }

    public function destroy(Category $category): RedirectResponse
    {
        Category::destroy($category->id);

        return to_route('categories.index')->with('message', 'Category deleted successfully');
    }
}
