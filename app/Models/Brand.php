<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helper\Uploads;

class Brand extends Model
{
    protected $fillable = ['name', 'slug','image'];

    public function product(){
        return $this->hasMany(Product::class,'brand_id','id');
    }

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
            'slug'=>\Str::slug(request()->name),
            'image'=>str_replace(url('public/image').'/','',request()->image),
        ]);
        return $model?$model->id:false;
    }
    public function scopeModify($query,$id){
        $brand =$this->find($id);
        if(request()->image){
            request()->merge(['image'=>str_replace(url('public/image').'/','',request()->image)]);
        }
        request()->merge(['slug'=>\Str::slug(request()->name),]);
        $model = $brand->update(request()->except('_token','_method','id'));
        return $model?$model:false;
    }
    public function scopeRemove($query,$id){
        $pro = $this->find($id);
        $count = $pro->product()->count();
        if($count>0){
            $mes = 'Đang có '.$count.' sản phẩm!';
        }else{
            Uploads::remove_img($pro->image,'brands');
            $pro->delete();
            $mes = 'Xóa thành công!';
        }
        return $mes;
    }
}
