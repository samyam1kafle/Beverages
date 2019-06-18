<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    public function index(Request $request){
        return view('Backend/MailUsers/inbox');

    }

    public function send_mail(Request $request){
        if($request->isMethod('get')){
            return view('Backend/MailUsers/sendmail');
        }
        if($request->isMethod('post')){
            $request->validate([
                'email' => 'required|email',
                'subject' =>'required',
                'message'=>'required|min:50'
            ]);

            $data = array(
                'email'      =>  $request->email,
                'message'   =>   $request->message,
                'subject'   => $request->subject
            );

            Mail::to($request->email)->send(new SendMail($data));
            return redirect()->back()->with('success','Mail successfully sent to the user');
        }


    }

    public function detail_message(Request $request){
        if($request->isMethod('get')){
            return view('Backend/MailUsers/maildetail');
        }
    }
}
