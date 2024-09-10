<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {   
        $startWeek = Carbon::now()->startOfWeek();
        $endWeek = Carbon::now()->endOfWeek();
        $queryWeek = Transaction::selectRaw('DAYOFWEEK(created_at) as day_of_week, SUM(total_amount) as total_amount')
        ->whereBetween('created_at', [$startWeek, $endWeek])
        ->groupBy('day_of_week')
        ->orderBy('day_of_week')
        ->get();
        // dd($queryWeek);

        $daysOfWeek = [
            2 => 'Senin', 
            3 => 'Selasa', 
            4 => 'Rabu', 
            5 => 'Kamis', 
            6 => 'Jumat', 
            7 => 'Sabtu', 
            1 => 'Minggu'
        ];
        
        $dataForChart = [];
        
        foreach ($daysOfWeek as $key => $day) {
            $dataForChart[$key] = 0;
        }
        
        // dd( $dataForChart);
        foreach ($queryWeek as $data) {
            // dd($data);
            $dataForChart[$data->day_of_week] = $data->total_amount;
        }

        // dd($dataForChart);
        
        $finalData = array_values($dataForChart);
        // dd($finalData);

        
        $startMonth = Carbon::now()->startOfYear();
        $endMonth = Carbon::now()->endOfYear();
        $queryMonth = Transaction::selectRaw('MONTH(created_at) as month_of_year, SUM(total_amount) as total_amount')
        ->whereBetween('created_at', [$startMonth, $endMonth])
        ->groupBy('month_of_year')
        ->orderBy('month_of_year')
        ->get();
        // dd($queryMonth);

        $monthOfYear = [
            1 => 'Januari', 
            2 => 'Februari', 
            3 => 'Maret', 
            4 => 'April', 
            5 => 'Mei', 
            6 => 'Juni', 
            7 => 'Juli', 
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];
        // dd($monthOfYear);
        
        $dataForChartMonth = [];
        
        foreach ($monthOfYear as $key => $month) {
            $dataForChartMonth[$key] = 0;
        }
        
        // dd( $dataForChartMonth);
        foreach ($queryMonth as $data) {
            // dd($data);
            $dataForChartMonth[$data->month_of_year] = $data->total_amount;
        }

        // dd($dataForChartMonth);
        
        $finalDataMonth = array_values($dataForChartMonth);
        // dd($finalDataMonth);


        
        return view('dashboard.index',[
            'transaction' => Transaction::count(),
            'product' => Product::count(),
            'totalAmount' => Transaction::get()->sum('total_amount'),
            'finalData' => $finalData,
            'finalDataMonth' => $finalDataMonth,
        ]);
    }
}
