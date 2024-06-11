<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\TransactionItem;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        \Log::info('Search request received');
        if ($request->ajax()) {
            \Log::info('Handling AJAX request');
            $data = Transaction::where('id_product', 'like', '%' . $request->search . '%')
                ->orWhere('slug_product', 'like', '%' . $request->search . '%')
                ->get();
    
            $output = '';
            if (count($data) > 0) {
                \Log::info('Data found');
                $output .= '
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-gray-500 text-black">Id</th>
                            <th class="px-4 py-2 bg-gray-500 text-black">Id Produk</th>
                            <th class="px-4 py-2 bg-gray-500 text-black">Kategori</th>
                            <th class="px-4 py-2 bg-gray-500 text-black">Produk</th>
                            <th class="px-4 py-2 bg-gray-500 text-black">Harga</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach ($data as $product) {
                    $output .= '
                        <tr class="bg-gray-100 hover:bg-gray-500">
                            <td class="border px-4 py-2">' . $product->id . '</td>
                            <td class="border px-4 py-2">' . $product->id_product . '</td>
                            <td class="border px-4 py-2">' . $product->category->name_category . '</td>
                            <td class="border px-4 py-2">' . $product->name_product . '</td>
                            <td class="border px-4 py-2">' . $product->price . '</td>
                        </tr>';
                }
                $output .= '</tbody>
                </table>';
            } else {
                \Log::info('No data found');
                $output .= '<li class="list-group-item">No results found</li>';
            }
    
            return response()->json(['html' => $output]);
        }
    }
    
}
