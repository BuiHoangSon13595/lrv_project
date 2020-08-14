<?php

namespace App\Models;

use App\Models\Favorite;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email','avatar','password','phone','status','last_login','birthday','gender','coupon_code_id','rememberToken'
    ];

    public function scopeSearch($query){
        if(request()->key){
            $keyword = request()->key;
            $query->where('name','LIKE','%'.$keyword.'%');
        }
        return $query;
    }

    public function scopeAdd(){
        $file_name = '';
        $pass = bcrypt(request()->password);
        if(request()->upload){
            $file_name = time().'-'.request()->upload->getClientOriginalName();
            request()->upload->move('public/home/avatars',$file_name);
        }
        $model = $this->create([
            'name' => request()->name,
            'email' => request()->email,
            'avatar' => $file_name,
            'phone' => request()->phone,
            'gender' => request()->gender,
            'birthday' => request()->birthday,
            'password' => $pass
        ]);
        return $model?$model:false;
    }

    public function scopeModify($query,$id){
        $client = $this->find($id); 
        $file_name =  $client->avatar;
        if(request()->upload){
            $file_name = time().'-'.request()->upload->getClientOriginalName();
            request()->upload->move('public/home/avatars',$file_name);
        }

        $model = $client->update([
            'name' => request()->name,
            'email' => request()->email,
            'avatar' => $file_name,
            'phone' => request()->phone,
            'gender' => request()->gender,
            'birthday' => request()->birthday,
            'password' =>request()->password ? bcrypt(request()->password) : $client->password
        ]);
        return $model?$model:false;
    }

    public function scopeRemove($query,$id){
        $client = $this->find($id);
        Favorite::where('client_id',$id)->delete();
        $client->delete();
    }
}
