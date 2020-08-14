<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helper\Uploads;

class Blog extends Model
{
    protected $fillable = ['name','slug','image','content','status','meta_title','meta_desc','meta_key','category_id'];

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class,'blog_id','id');
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
            'content'=>request()->content,
            'status'=>request()->status,
            'meta_title'=>request()->meta_title,
            'meta_desc'=>request()->meta_desc,
            'meta_key'=>request()->meta_key,
            'category_id'=>request()->category_id,
        ]);
        return $model?$model->id:false;
    }
    public function scopeModify($query,$id){
        $blog = $this->find($id);
        if(request()->image){
            request()->merge(['image'=>str_replace(url('public/image').'/','',request()->image)]);
        };
        request()->merge(['slug'=>\Str::slug(request()->name)]);
        $model = $blog->update(request()->except('_token','_method','id'));
        return $model?$model:false;
    }
    public function scopeRemove($query,$id){
        $blog = $this->find($id);
        $blog->delete();
    }
}
