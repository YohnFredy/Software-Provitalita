<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'is_final' => $request->has('is_final'),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Categoría creada correctamente');
    }

    public function edit(Category $category)
    {

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {

        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')->ignore($category->id),
            ],
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'is_final' => $request->has('is_final'),
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Categoría actualizada correctamente');
    }

    public function show(Category $category)
    {
        // Obtener las subcategorías para mostrarlas
        $subcategories = Category::where('parent_id', $category->id)->get();

        return view('admin.categories.show', compact('category', 'subcategories'));
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'categoria eliminada.');
    }
}
