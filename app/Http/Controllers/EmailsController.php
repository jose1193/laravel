<?php

namespace App\Http\Controllers;

use App\Models\Emails;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $email = Emails::latest()->get();
      
        return view('emails.index',compact('email'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emails.create');
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
            'email' => 'required|email|unique:emails',
            'name' => 'required|max:20|min:6',
            'iduser' => 'required',
            
        ]);
      
        Emails::create($request->all());
       
        return redirect()->route('emails.index')
                        ->with('success','Email created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emails  $Emails
     * @return \Illuminate\Http\Response
     */
    public function show(Emails $email)
    {
        return view('emails.show',compact('email'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emails  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Emails $email)
    {
        return view('emails.edit',compact('email')); // <-- variable $email a consultar
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Emails  $Emails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emails $email)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|max:20|min:6',
            'iduser' => 'required',
           
        ]);
      
        $email->update($request->all());
      
        return redirect()->route('emails.index')
                        ->with('success','Email updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emails  $Email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emails $email)
    {
        $email->delete();
       
        return redirect()->route('emails.index')
                        ->with('success','Email deleted successfully');
    }
}
