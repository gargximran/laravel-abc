<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        Toastr::success('Welcome to the ABC Dashboard'," " ,["positionClass" => "toast-top-center","progressBar" => false,]);
        return view('backend.pages.home');
    }
}
