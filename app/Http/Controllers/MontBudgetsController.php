<?php

namespace App\Http\Controllers;

use App\Models\MontBudgets;
use Illuminate\Http\Request;

class MontBudgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        if ($request->ajax()) {
  
            $data = MontBudgets::latest()->get();
  
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('montBudget');
    }
       
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MontBudgets::updateOrCreate([
                    'id' => $request->montbudget_id
                ],
                [
                    'unitquantity' => $request->unitquantity, 
                    'price' => $request->price,
                    'total' => $request->total,
                    'dollar' => $request->dollar,
                    'date' => $request->date
                ]);        
     
        return response()->json(['success'=>'Product saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MontBudgets  $montbudget
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $montmudget = MontBudgets::find($id);
        return response()->json($montmudget);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MontBudgets  $montbudget
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MontBudgets::find($id)->delete();
      
        return response()->json(['success'=>'Product deleted successfully.']);
    }
}
