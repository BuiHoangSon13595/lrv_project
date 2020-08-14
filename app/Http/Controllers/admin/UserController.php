<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::search()->paginate(15);
        return view('admin.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id,User $user)
    {
        $data = User::find($id)->getRoles;
        return view('admin.user.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id, User $user)
    {
        $user = User::find($id);
        $roles_assigned = $user->getRoles->pluck('name','id')->toArray();
        $roles = Role::orderBy('name','ASC')->get();
        $user = User::find($id);
        return view('admin.user.EditUser',compact('user','roles','roles_assigned'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, User $user)
    {
        $user = User::find($id);
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'unique:users,phone,'.$user->id,
        ];
        $messages = [

        ];

        if($request->password){
            $rules['confirm_password'] = 'required|same:password';
        }
        $request->validate($rules, $messages);
    
        User::modify($id);
        return redirect()->route('admin.User.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,User $user)
    {
       User::del($id);
        return redirect()->route('admin.User.index');
    }
}
