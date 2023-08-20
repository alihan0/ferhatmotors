<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function revenue(){
        $month = Advert::where('status', 7)->whereMonth('sold_date', now()->month)->whereYear('sold_date', now()->year)->get();
        $year  = Advert::where('status', 7)->whereYear('sold_date', now()->year)->get();
        $all   = Advert::where('status', 7)->get();

        $monthprice = $month->sum('sold_price');
        $yearprice = $year->sum('sold_price');
        $allprice = $all->sum('sold_price');

        return view('layout.report.revenue', ['month' => $month, 'year' => $year, 'all' => $all, 'monthprice' => $monthprice, 'yearprice' => $yearprice, 'allprice' => $allprice, 'users' => User::all()]);
    }

    public function get_user_report(Request $request){

        if($request->id){
            $user = User::find($request->id);
            if($user){
                $adv = Advert::where('user',$user->id)->where('status', 7)->get();
                $userprice = $adv->sum('sold_price');

                return response(['useradvert' => $adv, 'userprice' => $userprice]);
            }
        }

    }
}
