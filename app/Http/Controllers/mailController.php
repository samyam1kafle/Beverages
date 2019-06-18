<?php

namespace App\Http\Controllers;

use App\Mail\NewUserWelcome;
use App\Mail\SubscriptionMail;
use App\Models\AllUser;
use App\Models\subscribers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
//    public function index(Request $request)
//    {
////        dd($request->email);
//        $email = $request->email;
//
//        $data = [
//            'title' => 'Congratulations your subscription is successful.',
//            'content'=>'You will get notified for every new products in our site.'
//        ];
//
//      Mail::send('Backend.mail',$data,function($message){
//            $message->to('email','Samyam Kafle')->subject('Registration Successful');
//        });
//    }

    public function index(Request $request)
    {
        if (subscribers::where('email', '=', $request->email)->where('status', '=', true)->first()) {

            return redirect()->back()->with('Error', 'User already subscribed to our site.');

        } elseif ($user = subscribers::where('email', '=', $request->email)->where('status', '=', false)->first()) {

            $usercreated = subscribers::find($user->id);

            $usercreated->status = 1;
            $subscribed = $usercreated->update();
            Mail::to($usercreated->email)->send(new NewUserWelcome());

            if ($subscribed) {
                return redirect()->back()->with('success', 'Subscription Successfully Done');
            }
        } else {
            $subscribed = subscribers::create([
                'email' => $request->email,
                'status' => 1
            ]);

            Mail::to($subscribed->email)->send(new NewUserWelcome());
            if ($subscribed) {
                return redirect()->back()->with('success', 'Subscription Successfully Done');
            }
        }


    }

public function unsubscribe(Request $request){
//    if (subscribers::where('email', '=', $request->email)->where('status', '=', true)->first()) {
//
////        return redirect()->back()->with('Error', 'User already subscribed to our site.');
//
//    } elseif ($user = subscribers::where('email', '=', $request->email)->where('status', '=', false)->first()) {
//
//        $usercreated = subscribers::find($user->id);
//
//        $usercreated->status = 1;
//        $subscribed = $usercreated->update();
//        Mail::to($request->email)->send(new SubscriptionMail());
//
//        if ($subscribed) {
//            return redirect()->back()->with('success', 'Subscription Successfully Done');
//        }
//    } else {
//        $subscribed = subscribers::create([
//            'email' => $request->email,
//            'status' => 1
//        ]);
//
//        Mail::to($request->email)->send(new SubscriptionMail());
//        if ($subscribed) {
//            return redirect()->back()->with('success', 'Subscription Successfully Done');
//        }
//    }
}
}
