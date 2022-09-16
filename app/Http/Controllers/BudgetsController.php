<?php

namespace App\Http\Controllers;

use App\Models\Budgets;
use Illuminate\Http\Request;

class BudgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $budgets = Budgets::latest()->get();
      
        return view('budgets.index',compact('budgets'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('budgets.create');
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
    public function show(Budgets $budgets)
    {
        return view('budgets.show',compact('budgets'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Budgets  $Budgets
     * @return \Illuminate\Http\Response
     */
    public function edit(Budgets $budgets)
    {
        return view('budgets.edit',compact('budgets')); // <-- variable $budget a consultar
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Budgets  $Budgets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Budgets $budgets)
    {
        $request->validate([
            'amount' => 'required|max:20|min:2',
            'dollarchange' => 'required|max:20|min:2',
            'totalbudget' => 'required|max:20|min:2',
            'date' => 'required',
           
        ]);
      
        $budgets->update($request->all());
      
        return redirect()->route('budgets.index')
                        ->with('success','Budget updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Budgets  $Budgets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Budgets $budgets)
    {
        $budgets->delete();
       
        return redirect()->route('budgets.index')
                        ->with('success','Budget deleted successfully');
    }
}
