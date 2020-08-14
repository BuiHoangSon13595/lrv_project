<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helper\Uploads;

class Banner extends Model
{
    protected $fillable = ['name', 'description','image','status','link','priority','position'];
    // public function product(){
    //     return $this->hasMany(Product::class,'banner_id','id');
    // }

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
            'image'=>str_replace(url('public/image').'/','',request()->image),
            'description'=>request()->description,
            'status'=>request()->status,
            'link'=>request()->link,
            'priority'=>request()->priority,
            'position'=>request()->position,
        ]);
        return $model?$model->id:false;
    }
    public function scopeModify($query,$id){
        $banner =$this->find($id);
        request()->merge(['image'=>str_replace(url('public/image').'/','',request()->image)]);
        $model = $banner->update(request()->except('_token','_method','id'));
        return $model?$model:false;
    }
}
