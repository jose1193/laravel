<?php

namespace App\Http\Controllers;

use App\Models\Budgets;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;
use DataTables;// import DATATABLES

class BudgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $iduser=auth()->user()->id;
        $budget =DB::table('budgets')
        ->join('users', 'users.id', '=', 'budgets.iduser')
        ->where('users.id', $iduser)//<-- $var query
       ->select( 'budgets.*', 'users.id','users.name')
       ->get();

       if (count($budget)) { //CONDICION SI LA CONSULTA ES VALIDA O EXISTENTE  
      
        return view('budgets.index',compact('budget'))
                ->with('i', (request()->input('page', 1) - 1) * 5);

       }

       else { //CONDICION SI LA CONSULTA NO ES VALIDA O NO EXISTE , REDIRECCION A OTRA VISTA
           
        $response = Http::get('https://api.bluelytics.com.ar/v2/latest');
        $dataArray=$response->json();
        return view('budgets.create',compact('dataArray'));
    
}
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Http::get('https://api.bluelytics.com.ar/v2/latest');
        $dataArray=$response->json();
        return view('budgets.create',compact('dataArray'));
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
            'amount' => 'required|max:20|min:2',
            'dollarchange' => 'required|max:20|min:2',
            'totalbudget' => 'required|max:20|min:2',
            'date' => 'required',
            'iduser' => 'required',
            
        ]);
      
        Budgets::create($request->all());
       
        return redirect()->route('budgets.index')
                        ->with('success','Budget created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Budgets  $Budgets
     * @return \Illuminate\Http\Response
     */
    public function show(Budgets $budget)
    {
        return view('budgets.show',compact('budget'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budgets  $Budgets
     * @return \Illuminate\Http\Response
     */
    public function edit(Budgets $budget)
    {
        return view('budgets.edit',compact('budget')); // <-- variable $budget a consultar
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Budgets  $Budgets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budgets $budget)
    {
        $request->validate([
            'amount' => 'required|max:20|min:2',
            'dollarchange' => 'required|max:20|min:2',
            'totalbudget' => 'required|max:20|min:2',
            'date' => 'required',
           
        ]);
      
        $budget->update($request->all());
      
        return redirect()->route('budgets.index')
                        ->with('success','Budget updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budgets  $Budgets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budgets $budget)
    {
        $budget->delete();
       
        return redirect()->route('budgets.index')
                        ->with('success','Budget deleted successfully');
    }
}
