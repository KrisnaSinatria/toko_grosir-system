<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.inventory.index',[
            'inventories' => Inventory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   

        return view('dashboard.inventory.create',[
            'suppliers' => Supplier::all(),
            'products' => Product::all(),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_product' => 'required|exists:products,id',
            'id_supplier' => 'required|exists:suppliers,id',
            'stock' => 'required|integer',
            'order_date' => 'required|date',
            'operation' => 'required',
           ]);


           $stock = Product::find($validatedData['id_product']);
           
           if($request->input('operation') == 'plus'){
               $stock->stock += $request->stock;
               $stock->save();
           }else{
            if($stock->stock < $request->stock){
                return redirect()->back()->with('errorStock', 'Pengoperasian stock tidak valid.');  
            }else{
            $stock->stock -= $request->stock;
            $stock->save();
            }
           }
           
           Inventory::create($validatedData);
            return redirect('dashboard/inventory')->with('createInventory', 'pembuatan inventaris berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        return view('dashboard.inventory.edit',[
            'suppliers' => Supplier::all(),
            'products' => Product::all(),
            'inventory' => $inventory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        $validatedData = $request->validate([
            'id_product' => 'required|exists:products,id',
            'id_supplier' => 'required|exists:suppliers,id',
            'stock' => 'required|integer|min:1',
            'order_date' => 'required|date',
           ]);

           $stock = Product::find($validatedData['id_product']);
           //    $product->stock += $validatedData['stock'];
           
          
           
           
           if($request->input('operation') == 'plus'){
               $stock->stock += $request->finalstock;
               $stock->save();
           }else{
            if($stock->stock < $request->finalstock){
                return redirect()->back()->with('errorStock', 'Pengoperasian stock tidak valid.');
            }else{
            $stock->stock -= $request->finalstock;
            $stock->save();
            }
           }

        $validatedData['stock'] = $stock->stock;
        Inventory::where('id', $inventory->id)->update($validatedData);
        return redirect('/dashboard/inventory')->with('updateInventory', 'update inventaris berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        Inventory::destroy($inventory->id);
        return redirect('/dashboard/inventory')->with('deleteInventory', 'hapus inventaris berhasil');
    }
}
