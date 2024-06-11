<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $changeAmount = session('change_amount');
        return view('dashboard.transaction.create', [
            'products' => $products,
            'changeAmount' => $changeAmount,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
    
        $transaction = Transaction::create([
            'total_amount' => $totalAmount,
            'paid_amount' => $paidAmount,
            'change_amount' => $changeAmount,
            'staff' => Auth::user()->id,
        ]);
    
        foreach ($productQuantities as $productId => $quantity) {
            $productData = Product::find($productId);
            TransactionItem::create([
                'id_transaction' => $transaction->id,
                'id_product' => $productId,
                'quantity' => $quantity,
                'price' => $productData->price,
            ]);
    
            $productData->stock -= $quantity;
            $productData->save();
        }
    
        return redirect('/dashboard/transaction/create')->with('change_amount', $changeAmount)->with('Transactionsuccess', 'Transaksi berhasil');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    // public function search(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data=Transaction::where('id_product','like','%'.$request->search."%")
    //         ->orwhere('slug_product','like','%'.$request->search."%")->get();
    //         $output .= '';
    //         if (count($data) > 0) {
    //             $output .= '
    //             <table class="table-auto w-full">
    //                 <thead>
    //                     <tr>
    //                         <th class="px-4 py-2 bg-gray-500 text-black">Id</th>
    //                         <th class="px-4 py-2 bg-gray-500 text-black">Id Produk</th>
    //                         <th class="px-4 py-2 bg-gray-500 text-black">Kategori</th>
    //                         <th class="px-4 py-2 bg-gray-500 text-black">Produk</th>
    //                         <th class="px-4 py-2 bg-gray-500 text-black">Harga</th>
    //                     </tr>
    //                 </thead>
    //                 <tbody>';
    //             foreach ($data as $product) {
    //                 $output .= '
    //                     <tr class="bg-gray-100 hover:bg-gray-500">
    //                         <td class="border px-4 py-2">' . $product->id . '</td>
    //                         <td class="border px-4 py-2">' . $product->id_product . '</td>
    //                         <td class="border px-4 py-2">' . $product->category->name_category . '</td>
    //                         <td class="border px-4 py-2">' . $product->name_product . '</td>
    //                         <td class="border px-4 py-2">' . $product->price . '</td>
    //                     </tr>';
    //             }
    //             $output .= '</tbody>
    //             </table>';
    //         } else {
    //             $output .= '<li class="list-group-item">No results found</li>';
    //         }

    //         return $output;
    //     }
    // }

}
