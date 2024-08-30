<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.product.index',[
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        // $dataProduct = Product::with(['category'])->get();
        return view('dashboard.product.create',[
            'categories' => Category::all(),
            'product' => Product::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        do {
            $code = random_int(1000000, 9999999);
        } while (Product::where("code_product", "=", $code)->first());

        $validatedData = $request->validate([
            'code_product' => 'int',
            'id_category' => 'required|',
            'name_product' => 'required|string',
            'slug_product' => 'required|string',
            'price' => 'required|int',
            'stock' => ''
           ]);

           $validatedData['code_product'] = $code;
           $product = Product::create($validatedData);
           return redirect('dashboard/product')->with('createProduct', 'pembuatan produk berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
          $dataProduct = Product::with(['category'])->get();
        return view('dashboard.product.edit',[
            'categories' => Category::all(),
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'id_product' => 'required|int',
            'id_category' => 'required|',
            'name_product' => 'required|string',
            'slug_product' => 'required|string',
            'price' => 'required|int',
            // 'stock' => 'required|int'
        ]);

        Product::where('slug_product', $product->slug_product)->update($validatedData);
        return redirect('/dashboard/product')->with('updateProduct', 'update produk berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect('/dashboard/product')->with('deleteProduct', 'hapus produk berhasil');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug_product', $request->name); 
        return response()->json(['slug_product' => $slug]);
    }
}
