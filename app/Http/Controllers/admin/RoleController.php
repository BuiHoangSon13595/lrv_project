<?php

namespace App\Http\Controllers\admin;

use Route;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Role::search()->paginate(15);
        return view('admin.role.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routes = [];
        $routes = Role::view_add($routes);
        return view('admin.role.AddRole',compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Role::add();
        return redirect()->route('admin.Role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Role $role)
    {
        $routes = [];
        $model = Role::find($id);
        $permissions = json_decode($model->permissions);
        $routes = Role::view_modify($id, $routes);
        return view('admin.role.EditRole',compact('routes','model','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, Role $role)
    {
        Role::modify($id);
        return redirect()->route('admin.Role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Role $role)
    {
       Role::del($id);
        
        return redirect()->route('admin.Role.index');
    }
}
