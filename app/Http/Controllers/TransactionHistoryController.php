<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('items.product')->get();
        return view('dashboard.transaction.historyTransaction.index', [
            'transactions' => $transactions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $history)
    {
        $products = Product::all();
        $history->load('products');
        $selectedProductIds = $history->products->pluck('id')->toArray();
        return view('dashboard.transaction.historyTransaction.edit',[

            'history' => $history,
            'products' => $products,
            'selectedProductIds' => $selectedProductIds,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $history)
{
    $validatedData = $request->validate([
        'paid_amount' => 'required',
    ]);

    $totalAmount = 0;
    $productQuantities = [];

    foreach ($request->products as $product) {
        if (!isset($productQuantities[$product['id']])) {
            $productQuantities[$product['id']] = 0;
        }
        $productQuantities[$product['id']] += $product['quantity'];
    }

    foreach ($productQuantities as $productId => $quantity) {
        $productData = Product::find($productId);
        if ($quantity > $productData->stock) {
            return redirect()->back()->with('errorAmount', "{$productData->name_product} tidak mencukupi. Stok tersedia: {$productData->stock}.");
        }
        $totalAmount += $productData->price * $quantity;
    }

    $paidAmount = $request->paid_amount;
    $changeAmount = $paidAmount - $totalAmount;

    if ($paidAmount < $totalAmount) {
        return redirect()->back()->with('errorTransaction', 'pembayaran tidak valid');
    }

    $history->update([
        'total_amount' => $totalAmount,
        'paid_amount' => $paidAmount,
        'change_amount' => $changeAmount,
    ]);

    $existingItems = $history->transactionItems()->get();
    $existingItemIds = $existingItems->pluck('pivot.id_product')->toArray();

    $newItems = [];
    foreach ($productQuantities as $productId => $quantity) {
        $productData = Product::find($productId);
        
        if (in_array($productId, $existingItemIds)) {
            $existingItem = $existingItems->firstWhere('pivot.id_product', $productId);
            $productData->stock += $existingItem->pivot->quantity;
        }
        $productData->stock -= $quantity; 
        $productData->save();

        $newItems[$productId] = [
            'quantity' => $quantity,
            'price' => $productData->price,
        ];
    }

    $history->transactionItems()->sync($newItems);

    return redirect('/dashboard/transaction/history')->with('success', 'Transaksi berhasil diperbarui');
}

    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
