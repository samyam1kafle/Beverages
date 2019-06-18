<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use App\Http\Requests\userUpdateValidation;
use App\Listeners\TestEventListener;
use App\Models\AllUser;
use App\Http\Requests\userValidation;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

class AllUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = AllUser::orderBy('role','asc')->paginate(10);
        return view('Backend/Users/index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::all();
        return view('Backend/Users/create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userValidation $request)
    {
        $featured = $request->file('image');
        $name = time() . $featured->getClientOriginalName();
        $resize = Image::make($featured);
        $resize->resize('600','600')->save('uploads/Users/' . $name);
//        $featured->move('uploads/Users',$name);
        $created = AllUser::create([
            'name' => $request->name,
            'image' => $name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $success = $created->save();

        if ($success) {
            event(new TestEvent($created));
            return redirect()->route('users.index')->with('success', 'User Registration Successful user need to verify the email');
        } else {
            return redirect()->back()->with('Error', 'Registration Failed');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = AllUser::findOrFail($id);
        $roles = Roles::all();
        return view('Backend/Users/edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(userUpdateValidation $request, $id)
    {
        $update = AllUser::findOrFail($id);
        if($request->hasFile('image')){
            if ($update->image != null){
                unlink(public_path().'/uploads/Users/'.$update->image);
            }
            $featured = $request->file('image');
            $name = time(). $featured->getClientOriginalName();
            $resize = Image::make($featured);
            $resize->resize('600','600')->save('uploads/Users/'.$name);

//           $featured->move('uploads/Users',$name);
            $update->image = $name;
        }
        $update->name = $request->name;
        $update->email = $request->email;
        $update->role = $request->role;
        $updated = $update->update();
        if($updated){
            return redirect()->route('users.index')->with('success','User Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = AllUser::findOrFail($id);

        if($delete->image != Null){
            unlink(public_path().'/uploads/Users/'.$delete->image);
        }
        if($delete->delete()){
            return redirect()->route('users.index')->with('delete','User Removed Successfully');
        }
    }
}
