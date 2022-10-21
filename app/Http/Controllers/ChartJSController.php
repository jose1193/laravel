<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Budgets;
use App\Models\Monthbudgets;
use App\Models\Monthlyfoods;
use DB;

class ChartJSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function selectchartbudget()
    {
      $iduser=auth()->user()->id;
      $budgets = DB::table('budgets')
      ->join('users', 'users.id', '=', 'budgets.iduser')
      ->where('users.id', $iduser)//<-- $var query
                  ->selectRaw('count(budgets.year) as groupyear, year')
                  ->groupBy('year')
                  ->get();
                
     
        return view('chart.select-chart-budget',compact('budgets'));
    }

    public function budgetchart(Request $request)
    {
      $iduser=auth()->user()->id;
      $year=$request->year;
       
        $sum=  DB::table('budgets')->where('year',$year)->select('budgets.*')->sum('amount');
 $record = Budgets::where('iduser',$iduser)->get();


     $data = [];
 
     foreach($record as $row) {
        $data['labels'][] = $row->date;
        $data['data'] []= $row->amount;
      }
 
    $data['chart_data'] = json_encode($data);
    return view('chart.budgets', $data,compact('sum'));
    }

   
    public function chartmonthbudgets(Request $request)
    {
       
        $id=$request->id;
        
        $sum=  DB::table('monthbudgets')->where('idbudget',$id)->select('monthbudgets.*')->sum('total');
        
        $record = Monthbudgets::where('idbudget',$id)->get();


     $data = [];
 
     foreach($record as $row) {
        $data['labels'][] = $row->description;
        $data['data'] []= $row->total;
      }
 
    $data['chart_data'] = json_encode($data);
    return view('chart.monthbudgets', $data,compact('sum','id'));
    }
 


    public function selectchartmarket()
    {
      $iduser=auth()->user()->id;
      $monthlyfoods = DB::table('monthlyfoods')
      ->join('users', 'users.id', '=', 'monthlyfoods.users_id')
      ->where('users.id', $iduser)//<-- $var query
                  ->selectRaw('count(monthlyfoods.year) as groupyear, year')
                  ->groupBy('year')
                  ->get();
                
     
        return view('chart.select-chart-market',compact('monthlyfoods'));
    }

    public function chartmarket(Request $request)
    {
        $iduser=auth()->user()->id;
        $year=$request->year;
        $sum=  DB::table('monthlyfoods')->where('year',$year)->select('monthlyfoods.*')->sum('total_market');
        $sum2=  DB::table('monthlyfoods')->where('year',$year)->select('monthlyfoods.*')->sum('amount');
        $record = Monthlyfoods::where('users_id',$iduser)->get();


     $data = [];
 
     foreach($record as $row) {
        $data['labels'][] = $row->date;
        $data['data'] []= $row->total_market;
      }
 
    $data['chart_data'] = json_encode($data);
    return view('chart.chart-market', $data,compact('sum','sum2'));
    }


}