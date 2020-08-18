<?php

namespace App\Exports;

use App\ProductSale;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;

class lastSevenDaySaleDetail implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $sales = ProductSale::orderBy('id', 'desc')->where('status', 3)->whereBetween('created_at', [Carbon::now()->subDays(7), Carbon::now()])->get();
        return view('Excel.lastSevenDay', compact('sales'));
    }
}
