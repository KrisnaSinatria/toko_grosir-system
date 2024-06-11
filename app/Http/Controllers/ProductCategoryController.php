<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.product.category.index',[
            'categories' => Category::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.product.category.create',[
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_category' => 'required|max:255',
            'slug_category' => 'required|max:255',
        ]);
        Category::create($validatedData);
       return redirect('/dashboard/product/category')->with('createCategory', 'pembuatan category berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.product.category.edit',[
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name_category' => 'required',
            'slug_category' => 'required',
        ]);

        Category::where('slug_category', $category->slug_category)->update($validatedData);
        return redirect('/dashboard/product/category')->with('updateCategory', 'update category berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect('/dashboard/product/category')->with('deleteCategory', 'hapus category berhasil');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug_category', $request->name); 
        return response()->json(['slug_category' => $slug]);
    }
}
