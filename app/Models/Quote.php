<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = ['name','address','message'];
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
           'address'=>request()->address,
           'message'=>request()->message,
        ]);
        return $model?$model->id:false;
     }

     public function scopeModify($query,$id){
        $model = $this->where('id',$id)->update([
           'name'=>request()->name,
            'address'=>request()->address,
           'message'=>request()->message
        ]);
        return $model?$model:false;
     }
}
