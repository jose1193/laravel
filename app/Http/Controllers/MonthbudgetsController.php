<?php

namespace App\Http\Controllers;

use App\Models\Monthbudgets;
use App\Models\Budgets;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB; // <-- Join Tables Query
use PDF;


class MonthbudgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request) //RECIBIR VARIABLE POR PARAMETROS CON REQUEST
    {
        $id=$request->id; //CONSULTA RECIBIDA POR PARAMETROS CON REQUEST
        $monthbudget = DB::table('monthbudgets')
        ->join('budgets', 'budgets.id', '=', 'monthbudgets.idbudget')
        ->where('monthbudgets.idbudget',$id)//<-- $var query
       ->select( 'monthbudgets.*', 'budgets.amount','budgets.totalbudget')
       ->get();
       $sum=  DB::table('monthbudgets')->where('idbudget',$id)->select('monthbudgets.*')->sum('price');
             
       $sum2=  DB::table('monthbudgets')->where('idbudget',$id)->select('monthbudgets.*')->sum('total');
       
        if (count($monthbudget)) { //CONDICION SI LA CONSULTA ES VALIDA O EXISTENTE  
       
       return view('monthbudgets.index',compact('monthbudget','sum','sum2','id'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);

        } 
        
        else { //CONDICION SI LA CONSULTA NO ES VALIDA O NO EXISTE , REDIRECCION A OTRA VISTA
           
            $response2 = Http::get('https://api.bluelytics.com.ar/v2/latest');
        $dataArray2=$response2->json();
        return view('monthbudgets.create',compact('dataArray2','id'));
        
    }

       
    }

     // Generate PDF
     public function downloadPdf(Request $request) {
        
        $id=$request->id; //CONSULTA RECIBIDA POR PARAMETROS CON REQUEST
        $datenow=$request->datenow;
        $iduser=$request->iduser;
        
        // retreive all records from db
        $monthbudget =DB::table('monthbudgets')
        ->join('budgets', 'budgets.id', '=', 'monthbudgets.idbudget')
        ->where('monthbudgets.idbudget',$id)//<-- $var query
       ->select( 'monthbudgets.*', 'budgets.amount','budgets.totalbudget','budgets.date')
       ->get();
       $sum=  DB::table('monthbudgets')->where('idbudget',$id)->select('monthbudgets.*')->sum('price');
             
       $sum2=  DB::table('monthbudgets')->where('idbudget',$id)->select('monthbudgets.*')->sum('total');
       
       
       $user = DB::table('users')->where('id', $iduser)->first();
        // share data to view
        view()->share('monthbudget.pdf',$monthbudget);
        $pdf = PDF::loadView('monthbudgets.pdf', ['monthbudget' => $monthbudget,
        'sum' => $sum, 'sum2' => $sum2, 'user' => $user ]);
       
        // download PDF file with download method
       
        $fileName = 'budget'.'-'.$user->name .'-'.$user->lastname. '-'.$datenow. '.' . 'pdf' ;
       
        return $pdf->download($fileName);
        
      }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id=$request->id; //CONSULTA RECIBIDA POR PARAMETROS CON REQUEST
        $response2 = Http::get('https://api.bluelytics.com.ar/v2/latest');
        $dataArray2=$response2->json();
        return view('monthbudgets.create',compact('dataArray2','id'));
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
       
        return redirect()->route('monthbudgets.index',['id' => $request->idbudget]) //VARIABLE CONSULTA POR PARAMETROS CON REQUEST
                        ->with('success','Data created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monthbudgets  $Monthbudgets
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Monthbudgets $monthbudget)
    {
        $id=$request->id; //CONSULTA RECIBIDA POR PARAMETROS CON REQUEST
        return view('monthbudgets.show',compact('monthbudget','id'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monthbudgets  $monthbudget
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Monthbudgets $monthbudget)
    {
        $id = $request->id;
        $response2 = Http::get('https://api.bluelytics.com.ar/v2/latest');
        $dataArray2=$response2->json();
        return view('monthbudgets.edit',compact('monthbudget','dataArray2','id'));
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
      
        return redirect()->route('monthbudgets.index',['id' => $request->idbudget]) //VARIABLE CONSULTA POR PARAMETROS CON REQUEST
                        ->with('success','Data updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monthbudgets  $Monthbudgets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Monthbudgets $monthbudget )
    {
        $id = $request->idbudget;
        $monthbudget->delete();
       
        return redirect()->route('monthbudgets.index', ['id' => $id])
                        ->with('success','Data deleted successfully');
    }

    
}
