<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcriber extends Model
{
    protected $fillable = ['email','status'];

    public function scopeAdd(){
        $model = $this->create([
           'email'=>request()->email,
        ]);
        return $model?$model->id:false;
     }
     
    public function scopeSearch($query){
        if(request()->key){
            $keyword = request()->key;
            $query->where('email','LIKE','%'.$keyword.'%');
        }
        return $query;
 }
}
