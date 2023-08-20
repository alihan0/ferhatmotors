<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Expense;
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

    public function expense(){
        $month = Expense::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->get();
        $year  = Expense::whereYear('created_at', now()->year)->get();
        $all   = Expense::all();

        $monthprice = $month->sum('amount');
        $yearprice = $year->sum('amount');
        $allprice = $all->sum('amount');

        return view('layout.report.expense', ['month' => $month, 'year' => $year, 'all' => $all, 'monthprice' => $monthprice, 'yearprice' => $yearprice, 'allprice' => $allprice, 'users' => User::all()]);
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
    public function get_user_expense_report(Request $request){
        if($request->id){
            $user = User::find($request->id);
            if($user){
                $expense = Expense::where('user', $user->id)->with('Advert')->get();
                $userprice = $expense->sum('amount');

                return response(['expense' => $expense, 'userprice' => $userprice]);
            }
        }
    }
}
