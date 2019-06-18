<?php

namespace App\Http\Controllers;
use App\Models\AllUser;
use App\Models\Products;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class RoleControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::orderBy('id', 'asc')->paginate(10);

        return view('Backend/roles/index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend/roles/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);

        $new_role = Roles::create($request->all());
        if ($new_role) {
            Session::flash('success', 'New Role Created Successfully');
            return redirect()->route('roles.index');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Roles::findOrFail($id);
        return view('Backend/roles/edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Roles::findOrFail($id);
        $updated = $update->update($request->all());
        if ($updated) {
            Session::flash('success', 'Role Updated Successfully');

            return redirect()->route('roles.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Roles::findOrFail($id);
        if(AllUser::where('role','=',$delete->id)->first()){
            return redirect()->back()->with('Error','Role is associated with users cannot delete the Role');
        }else{
            $deleted = $delete->delete();
            if ($deleted) {

                Session::flash('delete','Role Deleted Successfully');
                return redirect()->route('roles.index');
            }
        }


    }
}
