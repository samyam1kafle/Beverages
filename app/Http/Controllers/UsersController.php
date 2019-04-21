<?php

namespace App\Http\Controllers;

use App\Http\Requests\userUpdateValidation;
use App\Http\Requests\userValidation;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('role','asc')->paginate(5);
        return view('Backend/Users/index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
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
        $featured->move('uploads/Users',$name);
        $created = User::create([
            'name'=>$request->name,
            'image'=>$name,
            'role'=>$request->role,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);

        $success = $created->save();
        if($success){
            return redirect()->route('users.index')->with('message','User Created Successfully');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
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
       $update = User::findOrFail($id);
       if($request->hasFile('image')){
           if ($update->image != Null){
                unlink(public_path().'/uploads/Users/'.$update->image);
           }
           $featured = $request->file('image');
           $name = time(). $featured->getClientOriginalName();
          $update->image = $featured->move('/uploads/Users',$name);
       }
       $update->name = $request->name;
       $update->email = $request->email;
       $update->role = $request->role;
       $updated = $update->save();
    if($updated){
        return redirect()->route('users.index')->with('message','User Updated Successfully');
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
        $delete = User::findOrFail($id);
        if($delete->delete()){
            return redirect()->route('users.index')->with('message','Deleted Successfully');
        }
    }
}
