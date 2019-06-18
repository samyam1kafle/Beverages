<?php

namespace App\Http\Controllers;

use App\Mail\NewUserWelcome;
use App\Models\AllUser;
use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    public function login(Request $request)
    {

        if ($request->isMethod('post')) {
            $request->validate([
                'password'=>'required',
                'email'=>'required'

            ]);
            $password = $request->password;
            $email = $request->email;
            $remember = $request->remember;

            if(Auth::attempt(['email'=>$email,'password'=>$password],$remember)){
                if(Auth::user()->email_verified_at == null){
                    session::flush();
                    Auth::logout();
                    return redirect()->route('login')->with('delete','Please verify your email to login');
                }
                if (Auth::user()->role == 41){
                    return redirect()->route('admin')->with('success', 'Login Successful Welcome to the admin pannel');
                }else{
                    return redirect()->route('home-index')->with('success', 'Login Successful');
                }
            }else {
                return redirect()->back()->with('Error', 'Records Not found');
            }


        } elseif ($request->isMethod('get')) {
            $category = Category::all();
            return view('FrontEnd/User/login', compact('category'));
        } else {
            return redirect()->route('Register')->with('Error', "No Records Found ")->with("New User ? SignUp");
        }
    }

    public function signout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login')->with('delete', 'Logged Out Successfully');

    }

    public function verify(){
//        if(Auth::user()->email_verified_at != null){
//            $this->guard()->login(Auth::user());
//            Mail::to(Auth::user()->email)->send(new NewUserWelcome(Auth::user()));
//            return redirect()->route('home-index')->with('success', 'Registration Successful');
//        }
        return redirect()->route('home-index')->with('delete','Please Verify your Email to enjoy all the features of our site.');



    }
}
