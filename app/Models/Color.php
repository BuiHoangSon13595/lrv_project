<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['name', 'status','priority'];

    public function product_detail()
    {
        return $this->hasMany(Product_detail::class,'color_id','id');
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
            'status'=>request()->status,
            'priority'=>request()->priority,
        ]);
        return $model?$model->id:false;
    }
    public function scopeModify($query,$id){
        $color = $this->find($id);
        $color->update(request()->except('_method','_token','id'));
    }
    public function scopeRemove($query,$id){
        $color = $this->find($id);
        $count = $color->product_detail()->count();
        if($count>0){
            $message = 'Đang có '.$count.' sản phẩm!';
        }else{
            $color->delete();
            $message = 'Xóa thành công';
        }
        return $message;
    }
}
