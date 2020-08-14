<?php

namespace App;

use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'avatar', 'password','phone','status','last_login','birtday','gender','coupon_code_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function add(){
        $pass = bcrypt(request()->password);
        request()->merge(['password' => $pass]);
        User::create(request()->all());
    }

    public static function modify($id){
        $user = User::find($id);
        if(is_array(request()->role)){
            UserRole::where('user_id',$id)->delete();
            foreach(request()->role as $role_id){
                UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => $role_id
                ]);
            }
        }
    }

    public static function del($id){
        UserRole::where('user_id',$id)->delete();
        User::find($id)->delete();
    }
    
    public function scopeSearch($query){
        if(request()->key){
            $keyword = request()->key;
            $query->where('name','LIKE','%'.$keyword.'%');
        }
        return $query;
    }
    public function scopeChange_profile($query,$id){
        $user = $this->find($id);
        $model = $user->update(request()->except('_token','_method','id'));
        return $model?$model:false;
    }
    public function scopeChange_avatar($query,$id){
        $user = $this->find($id);
        $file_name =  $user->avatar;
        if(request()->upload){
            $file_name = time().'-'.request()->upload->getClientOriginalName();
            request()->upload->move('public/home/avatars',$file_name);
        }
        $model = $user->update(['avatar'=>$file_name]);
        return $model?$model:false;
    }

    public function hasPermission($route){
        $routes = $this->routes();
        if(in_array($route, $routes)){
            return true;
        }
        return false;
    }

    //route for user
    public function routes(){
        $data = [];
        foreach($this->getRoles as $route){
            $permission = json_decode($route->permissions);
            foreach($permission as $per){
                if(!in_array($per, $data)){
                    array_push($data, $per);
                }
            }
        }
        return $data;
    }

    public function getRoles(){
        return $this->belongsToMany(Role::class, 'user_roles','user_id','role_id');
    }
}
