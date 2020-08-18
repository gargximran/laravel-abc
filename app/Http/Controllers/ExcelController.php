<?php

namespace App\Http\Controllers;

use App\Exports\lastOneMonth;
use App\Exports\lastSevenDaySaleDetail;
use App\Exports\totalSale;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ExcelController extends Controller
{
    public function last7Day(){
        return Excel::download(new lastSevenDaySaleDetail, Carbon::now()->subDays(7)."->".Carbon::now().".xlsx");
    }



    public function last1Month(){
        return Excel::download(new lastOneMonth, Carbon::now()->subDays(30)."->".Carbon::now().".xlsx");
    }


    public function totalSale(){
        return Excel::download(new totalSale, "total".Carbon::now().".xlsx");
    }
}
