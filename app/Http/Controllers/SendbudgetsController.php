<?php

namespace App\Http\Controllers;

use App\Models\Sendbudgets;
use App\Models\Budgets;
use App\Models\Emails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // <-- Join Tables Query

class SendbudgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sendbudgets = DB::table('sendbudgets')
        ->join('budgets', 'budgets.id', '=', 'sendbudgets.idbudget')
        ->select( 'sendbudgets.*', 'budgets.amount','budgets.totalbudget','budgets.dollarchange')
       ->get();

        if (count($sendbudgets)) { //CONDICION SI LA CONSULTA ES VALIDA O EXISTENTE  
        
        return view('sendbudgets.index',compact('sendbudgets'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        else {
            $emails = Emails::latest()->get();
        $budgets = Budgets::latest()->get();
        return view('sendbudgets.create',compact('emails','budgets'));

        }
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emails = Emails::latest()->get();
        $budgets = Budgets::latest()->get();
        return view('sendbudgets.create',compact('emails','budgets'));
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
            'idbudget' => 'required',
            'email' => 'required|email|max:30|min:6',
            'date' => 'required',
        ]);
      
        Sendbudgets::create($request->all());
       
        return redirect()->route('sendbudgets.index')
                        ->with('success','Data created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sendbudgets  $Sendbudgets
     * @return \Illuminate\Http\Response
     */
    public function show(Sendbudgets $sendbudgets)
    {
        $sendbudgetsquery = DB::table('sendbudgets')
        ->join('budgets', 'budgets.id', '=', 'sendbudgets.idbudget')
       
       ->select( 'sendbudgets.*', 'budgets.amount','budgets.totalbudget','budgets.dollarchange')
       ->get();
        return view('sendbudgets.show',compact('sendbudgets','sendbudgetsquery'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sendbudgets  $sendbudgets
     * @return \Illuminate\Http\Response
     */
    public function edit(Sendbudgets $sendbudgets)
    {
        return view('sendbudgets.edit',compact('sendbudgets'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sendbudgets  $Sendbudgets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sendbudgets $sendbudgets)
    {
        $request->validate([
            'idbudget' => 'required',
            'email' => 'required|email|max:30|min:6',
            'date' => 'required',
        ]);
      
        $post->update($request->all());
      
        return redirect()->route('sendbudgets.index')
                        ->with('success','Data updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sendbudgets  $Sendbudgets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sendbudgets $sendbudgets)
    {
        $sendbudgets->delete();
       
        return redirect()->route('sendbudgets.index')
                        ->with('success','Data deleted successfully');
    }
}