<?php

namespace App\Http\Controllers;

use App\Models\Sendbudgets;
use App\Models\Budgets;
use App\Models\Emails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // <-- Join Tables Query
use Mail;
use PDF;

class SendbudgetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $iduser=auth()->user()->id;
         $sendbudgets = DB::table('sendbudgets')
        ->join('budgets', 'budgets.id', '=', 'sendbudgets.idbudget')
        ->join('users', 'users.id', '=', 'sendbudgets.iduser')
        ->where('users.id', $iduser )//<-- $var query
        ->select('sendbudgets.date','budgets.*'
        ,DB::raw('COUNT(*) AS total'))
        ->groupBy('sendbudgets.idbudget','sendbudgets.date')
        ->get();
                
             

        if (count($sendbudgets)) { //CONDICION SI LA CONSULTA ES VALIDA O EXISTENTE  
        
        return view('sendbudgets.index',compact('sendbudgets'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        else {
            $emails =DB::table('emails')
        ->join('users', 'users.id', '=', 'emails.iduser')
        ->where('users.id', $iduser)//<-- $var query
       ->select( 'emails.*', 'users.id','users.name')
       ->get();

        $budgets =DB::table('budgets')
        ->join('users', 'users.id', '=', 'budgets.iduser')
        ->where('users.id', $iduser)//<-- $var query
       ->select( 'budgets.*')
       ->get();
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
        $iduser=auth()->user()->id;
       
        $emails =DB::table('emails')
        ->join('users', 'users.id', '=', 'emails.iduser')
        ->where('users.id', $iduser)//<-- $var query
       ->select( 'emails.*', 'users.id','users.name')
       ->get();

        $budgets =DB::table('budgets')
        ->join('users', 'users.id', '=', 'budgets.iduser')
        ->where('users.id', $iduser)//<-- $var query
       ->select( 'budgets.*')
       ->get();

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
            'email' => 'required',
            'date' => 'required',
            'iduser' => 'required',
        ]);

        $data = $request->all();
        foreach ($data['email'] as $index => $dataNumber) {
            Sendbudgets::create([
               
                'idbudget' => $data['idbudget'],
                'email' => $data['email'][$index],
                'date' => $data['date'],
                'iduser' => $data['iduser'],
               
            ]);

           
           
        }
       
        
  $id=$request->idbudget; //CONSULTA RECIBIDA POR PARAMETROS CON REQUEST
  $datenow=$request->datenow;
  $iduser=auth()->user()->id;
  
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
  view()->share('sendbudgets.pdf',$monthbudget);


// Email to users

  $pdf = PDF::loadView('sendbudgets.pdf', ['monthbudget' => $monthbudget,
  'sum' => $sum, 'sum2' => $sum2, 'user' => $user ]);
        
  $fileName = 'budget'.'-'.$user->name .'-'.$user->lastname. '-'.$datenow. '.' . 'pdf' ;
  
  // sending mail to users.
  $email=$request->email; //variable con emails array seleccionados
  // Send Email

  Mail::send('sendbudgets.pdf', ['monthbudget' => $monthbudget,
  'sum' => $sum, 'sum2' => $sum2, 'user' => $user ],
   function($message)use($monthbudget, $pdf,$fileName,$email ) {
      $message->to($email,$email)
              ->subject('Web App - '.$fileName)
              ->attachData($pdf->output(), $fileName);
  });
// end sending mail to users.

        
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
        $iduser=auth()->user()->id;
        $sendbudgetsquery = DB::table('sendbudgets')
        ->join('budgets', 'budgets.id', '=', 'sendbudgets.idbudget')
        ->join('users', 'users.id', '=', 'sendbudgets.iduser')
        ->where('users.id', $iduser)//<-- $var query
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