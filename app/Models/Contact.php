<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name','email','message'];
    
    public function scopeSearch($query){
        if(request()->key){
            $keyword = request()->key;
            $query->where('name','LIKE','%'.$keyword.'%');
        }
        return $query;
     }

    public function scopeAdd(){
        $model = $this->create([
           'name'=>request()->name,
           'email'=>request()->email,
           'message'=>request()->message,
        ]);
        return $model?$model->id:false;
     }
}
