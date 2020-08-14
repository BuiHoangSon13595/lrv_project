<?php

namespace App\Models;
use Route;
use App\Models\Role;
use App\Models\UserRole;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','permissions'];

    public function scopeSearch($query){
        if(request()->key){
            $keyword = request()->key;
            $query->where('name','LIKE','%'.$keyword.'%');
        }
        return $query;
    }

    public static function view_add($routes){
        $all = Route::getRoutes();
        foreach($all as $r){
            $name = $r->getName();
            $pos = strpos($name,'admin');
            if($pos !== false){
                if(!in_array($name, $routes)){
                    array_push($routes, $name);
                }
            }
        }
        return $routes;
    }

    public static function add(){
        $routes = json_encode(request()->route);
        Role::create([
            'name'=>request()->name,
            'permissions'=>$routes
        ]);
    }

    public static function view_modify($id, $routes){
        $all = Route::getRoutes();
        foreach($all as $r){
            $name = $r->getName();
            $pos = strpos($name,'admin');
            if($pos !== false){
                if(!in_array($name, $routes)){
                    array_push($routes, $name);
                }
            }
        }
        return $routes;
    }

    public static function modify($id){
        $routes = json_encode(request()->route);
        Role::find($id)->update([
            'name' => request()->name,
            'permissions'=>$routes
        ]);
    }

    public static function del($id){
        UserRole::where('role_id',$id)->delete();
        Role::find($id)->delete();
    }
}
