<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Budgets;
use App\Models\Monthbudgets;
use DB;

class ChartJSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser=auth()->user()->id;
        $sum=  DB::table('budgets')->where('year',date('Y'))->select('budgets.*')->sum('amount');
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
 
}