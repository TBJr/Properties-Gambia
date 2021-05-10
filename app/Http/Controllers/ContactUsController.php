<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\ContactUS;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    /**
     * Show the application dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    public function contactUS()
    {
        // return view('admin.pages.contact-us');
        return view('welcome');
    }

    /**
     * 
     */
    public function contactSaveData(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
                       'subject' => 'required',
            'message' => 'required'
        ]);

        ContactUS::create($request->all());

        Mail::send('admin.emails.contactus',
            array(
                'name'          =>  $request->get('name'),
                'email'         =>  $request->get('email'),
                                    'subject' => $request->get('subject'),
                'user_message'  =>  $request->get('message')
            ), function($message) use ($request)
        {
            $message->from('sims.wfp@gmail.com');
            // $message->to('info@propertiesgambia.co.uk', 'Admin')->subject($request->get('subject'));
            $message->to('tjaybrowne@gmail.com', 'Admin')->subject($request->get('subject'));
        });

        return back()->with('success', 'Thanks for contacting us!');
    }
}
