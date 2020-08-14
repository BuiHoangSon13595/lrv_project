<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = ['name', 'slug'];

   public function product(){
      return $this->hasMany(Product::class,'category_id','id');
   }

   public function getblog(){
      return $this->hasMany(Blog::class,'category_id','id');
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
      ]);
      return $model?$model->id:false;
   }
   public function scopeModify($query,$id){
      $model = $this->where('id',$id)->update([
         'name'=>request()->name,
         'slug'=>\Str::slug(request()->name),
      ]);
      return $model?$model:false;
   }
   public function scopeRemove($query,$id){
      $pro =$this->find($id);
      $count = $pro->product()->count();
      if($count > 0){
         $mes = 'Đang có '.$count.' sản phẩm!';
      }else{
         $pro->delete();
         $mes = 'Xóa thành công!';
      }
      return $mes;
  }
}