<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Requests\admin\AdminLoginRequest;
use App\Http\Requests\admin\AdminRegisterRequest;
use App\Helper\CartHelper;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function post_login(AdminLoginRequest $request)
    {
        $info = request()->only('email','password');
        if(Auth::attempt($info)){
            return redirect()->route('admin.index');
        }else{
            return redirect()->back();
        }
    }

    public function register()
    {
        return view('admin.register');
    }

    public function post_register(AdminRegisterRequest $request)
    {
        User::add();
        return redirect()->route('admin.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function error(){
        $code = request()->code;
        $errors = config('error.'.$code);
        return view('admin.error',$errors);
    }
    public function profile(){
        return view('admin.profile');
    }
    public function post_profile($id){
        User::change_profile($id);
        return redirect()->route('admin.index');
    }
    public function post_avatar($id){
        User::change_avatar($id);
        return redirect()->route('admin.index');
    }
}
