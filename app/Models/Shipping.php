<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['name','status','priority'];

    public function scopeSearch($query){
        if(request()->key){
            $keyword = request()->key;
            $query->where('name','LIKE','%'.$keyword.'%');
        }
        return $query;
    }
    public function scopeModify($query,$id){
        $shipping = $this->find($id);
        $model = $shipping->update(request()->except('id','_token','_method'));
        return $model?$model:false;
    }
}
