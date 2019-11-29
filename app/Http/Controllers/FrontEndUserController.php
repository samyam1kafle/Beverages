<?php

namespace App\Http\Controllers;


use App\Events\TestEvent;
use App\Mail\NewUserWelcome;
use App\Models\AllUser;
use App\Models\Category;
use App\Http\Requests\userValidation;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;


class FrontEndUserController extends Controller
{
    use RegistersUsers;


    public function registerview()
    {
        $category = Category::all();
        return view('FrontEnd/User/registration', compact('category'));
    }

    public function storeregistered(userValidation $request)
    {
        if (AllUser::where('email', '=', $request->email)->first()) {
            return redirect()->back()->with('Error', 'User email already exists try another email. ');
        } else {
            $featured = $request->file('image');
            $name = time() . $featured->getClientOriginalName();
            $resize = Image::make($featured);
            $resize->resize('600', '600')->save('uploads/Users/' . $name);
            $created = AllUser::create([
                'name' => $request->name,
                'image' => $name,
                'role' => 44,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            $created->sendEmailVerificationNotification();

            $success = $created->save();
            if ($success) {
//              return redirect()->route('verify')->with('delete','Please verify you email to enjoy all the features of our site.');
                $this->guard()->login($created);

                return redirect()->route('home-index')->with('success', 'Registration Successful Please verify you email to enjoy all the features of our site.');
            } else {
                return redirect()->back()->with('Error', 'Registration Failed');
            }
        }


    }


    public function update_user(Request $request)
    {
        if ($request->isMethod('post')) {
            $user_password = Auth::user()->password;
            $old_password = $request->old_password;
            if (Hash::check($old_password, $user_password)) {
                $request->validate([
                    'password' => 'confirmed'
                ]);
                $update = AllUser::findOrFail(Auth::user()->id);
                $update->name = $request->name;
                $update->image = $request->image;
                $update->role = $request->role;
                $update->email = Auth::user()->email;
                $update->email_verified_at = Auth::user()->email_verified_at;
                $update->password = bcrypt($request->password);
                $update->remember_token = Auth::user()->remember_token;
                $updated = $update->update();
                if ($updated) {
                    return redirect()->back()->with('success', 'Password Updated Successfully');
                }
            } else {
                return redirect()->back()->with('Error', 'Old Password didn\'t match our records please try again.');
            }

        }
    }

    public function update_user_photo(Request $request)
    {
        $update = AllUser::findOrFail(Auth::user()->id);
        if ($request->hasFile('image')) {
            if ($update->image != null) {
                unlink(public_path() . '/uploads/Users/' . $update->image);
            }
            $image = $request->file('image');
            $name = time() . $image->getClientOriginalName();
            $resize = Image::make($image);
            $resize->resize('600', '600')->save('uploads/Users/' . $name);
            $update->image = $name;
        }
        $update->name = $request->name ? $request->name : Auth::user()->name;
        $update->role = Auth::user()->role;
        $update->email = Auth::user()->email;
        $update->email_verified_at = Auth::user()->email_verified_at;
        $update->password = Auth::user()->password;
        $update->remember_token = Auth::user()->remember_token;

        $updated = $update->update();
        if ($updated) {
            return redirect()->back()->with('success', 'Password Updated Successfully');
        } else {
            return redirect()->back()->with('Error', 'Old Password didn\'t match our records please try again.');
        }
    }

}
