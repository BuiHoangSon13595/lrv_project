<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Carbon\Carbon;
use Mail;
use App\Http\Requests\home\HomeResetPasswordRequest;

class ForgotPasswordController extends Controller
{
    public function getFormResetPassword(){
        return view('home.form_reset');
    }

    public function sendCodeResetPassword(Request $request){
        $email = $request->email;
        $checkClient = Client::where('email', $email)->first();
        if(!$checkClient){
            return redirect()->back()->with('error','Email does not exitst');
        }
        $code = bcrypt(md5(time().$email));
        $checkClient->code = $code;
        $checkClient->time_code = Carbon::now();
        $checkClient->save();

        $data = [
            'url' => route('send_link', ['code' => $checkClient->code, 'email' => $email])
        ];
        Mail::send('email.email', $data, function($message) use($email){
	        $message->to($email, 'Visitor')->subject('Get Password');
	    });
        return redirect()->back()->with('sucess','Email has been send to your email');
    }

    public function resetPassword(Request $request){
        $code = $request->code;
        $email = $request->email;
        $checkClient = Client::where([
            'code' => $code,
            'email' => $email
        ])->first();
        if(!$checkClient){
            return redirect()->route('reset_password')->with('error','Link is not correct. Please try again!');
        }
        return view('home.reset');
    }

    public function saveResetPassword(HomeResetPasswordRequest $request){
        if($request->password){
            $code = $request->code;
            $email = $request->email;
            $checkClient = Client::where([
                'code' => $code,
                'email' => $email
            ])->first();
            if(!$checkClient){
                return redirect()->route('reset_password')->with('error','Link is not correct. Please try again!');
            }
            $checkClient->password = bcrypt($request->password);
            $checkClient->save();
            return redirect()->route('login')->with('sucess','The password has been changed successfully');
        }
    }
}
