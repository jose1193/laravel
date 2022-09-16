<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

/** IMPORT CLASS SQL TABLE EMAILS **/
use App\Models\Emails;
/** END IMPORT CLASS SQL TABLE EMAILS **/

use Mail;

class ContactController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function contactForm()
    {
        $email = Emails::latest()->get(); /** <-- SQL TABLE EMAILS, FOREACH **/

        return view('contactForm',compact('email')); /** <-- PRINT VARIABLE , CAMPO TABLA **/
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function storeContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:60',
            'phone' => 'required|max:20|min:7',
            'subject' => 'required|max:30|min:4',
            'message' => 'required|min:4',
            'emailsend' => 'required',
        ]);

        $input = $request->all();

        Contact::create($input);

        //  Send mail to admin 
        \Mail::send('email.contactMail', array(
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'subject' => $input['subject'],
            'message' => $input['message'],
           
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to($request->emailsend, 'Admin')->subject($request->get('subject'));
        });

        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
    }
}