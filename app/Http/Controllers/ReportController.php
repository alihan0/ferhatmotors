<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function revenue(){
        $month = Advert::where('status', 7)->whereMonth('sold_date', now()->month)->whereYear('sold_date', now()->year)->get();
        $year  = Advert::where('status', 7)->whereYear('sold_date', now()->year)->get();
        $all   = Advert::where('status', 7)->get();

        return view('layout.report.revenue', ['month' => $month, 'year' => $year, 'all' => $all]);
    }
}
