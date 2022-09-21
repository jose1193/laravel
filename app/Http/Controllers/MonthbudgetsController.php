<?php

namespace App\Http\Controllers;

use App\Models\Monthbudgets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB; // <-- Join Tables Query


class MonthbudgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monthbudget = DB::table('monthbudgets')
             ->join('budgets', 'budgets.id', '=', 'monthbudgets.idbudget')
             ->where('monthbudgets.idbudget','1') //<-- $var query
            ->select('monthbudgets.*', 'budgets.id','budgets.amount','budgets.totalbudget')
            ->get();

       
        $sum = Monthbudgets::sum('dollar');
        $sum2 = Monthbudgets::sum('total');

        
        return view('monthbudgets.index',compact('monthbudget','sum','sum2'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $response2 = Http::get('https://api.bluelytics.com.ar/v2/latest');
        $dataArray2=$response2->json();
        return view('monthbudgets.create',compact('dataArray2'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'unitquantity' => 'required|max:30|min:1',
            'price' => 'required|max:30|min:1',
            'total' => 'required|max:30|min:1',
            'dollar' => 'required|max:30|min:1',
            'date' => 'required|max:30|min:3',
            'idbudget' => 'required|max:30|min:1',
            'description' => 'required|max:30|min:3',
        ]);
      
        Monthbudgets::create($request->all());
       
        return redirect()->route('monthbudgets.index')
                        ->with('success','Data created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monthbudgets  $Monthbudgets
     * @return \Illuminate\Http\Response
     */
    public function show(Monthbudgets $monthbudget)
    {
        return view('monthbudgets.show',compact('monthbudget'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monthbudgets  $monthbudget
     * @return \Illuminate\Http\Response
     */
    public function edit(Monthbudgets $monthbudget)
    {
        $response2 = Http::get('https://api.bluelytics.com.ar/v2/latest');
        $dataArray2=$response2->json();
        return view('monthbudgets.edit',compact('monthbudget','dataArray2'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monthbudgets  $Monthbudgets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monthbudgets $monthbudget)
    {
        $request->validate([
            'unitquantity' => 'required|max:30|min:1',
            'price' => 'required|max:30|min:1',
            'total' => 'required|max:30|min:1',
            'dollar' => 'required|max:30|min:1',
            'date' => 'required|max:30|min:3',
            'idbudget' => 'required|max:30|min:1',
            'description' => 'required|max:30|min:3',
        ]);
      
        $monthbudget->update($request->all());
      
        return redirect()->route('monthbudgets.index')
                        ->with('success','Data updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monthbudgets  $Monthbudgets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monthbudgets $monthbudget)
    {
        $monthbudget->delete();
       
        return redirect()->route('monthbudgets.index')
                        ->with('success','Data deleted successfully');
    }
}
