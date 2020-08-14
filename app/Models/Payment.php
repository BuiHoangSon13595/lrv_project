<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
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
        $payment = $this->find($id);
        $model = $payment->update(request()->except('id','_token','_method'));
        return $model?$model:false;
    }
}
