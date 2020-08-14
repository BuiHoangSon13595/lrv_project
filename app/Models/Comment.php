<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['client_id','blog_id','status','content'];

    public function user_comment()
    {
        return $this->hasOne(Client::class,'id','client_id');
    }
    public function blog_comment()
    {
        return $this->hasOne(Blog::class,'id','blog_id');
    }
    public function scopeAdd(){
        $model = $this->create([
            'client_id'=>request()->client_id,
            'blog_id'=>request()->blog_id,
            'content'=>request()->content,
        ]);
        return $model?$model->id:false;
    }
    public function scopeSearch($query){
        if(request()->key){
            $keyword = request()->key;
            $query->where('name','LIKE','%'.$keyword.'%');
        }
        return $query;
    }
    public function scopeModify($query,$id){
        $comment = $this->find($id);
        $model = $comment->update(request()->except('_method','_token','id'));
        return $model?$model:false;
    }
}
