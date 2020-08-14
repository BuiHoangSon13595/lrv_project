<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helper\Uploads;
use App\Helper\Colors;
use App\Helper\Images;
use App\Models\Product_detail;
use App\Models\Product_image;
use App\Models\Favorite;

class Product extends Model
{
    protected $fillable = ['name','image','slug','price','sale_price','sumary','content','meta_title','meta_desc','meta_key','category_id','brand_id'];
    
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }
    public function getcolor()
    {
        return $this->belongsToMany(Color::class,'product_details','product_id','color_id');
    }
    public function getimage()
    {
        return $this->hasMany(Product_image::class,'product_id','id');
    }
    public function getcomments()
    {
        return $this->hasMany(Rating::class,'product_id','id');
    }
    public function star_rating()
    {
        $count = $this->getcomments->count();
        if(empty($count)){
            return 0;
        }
        $starCountnumber = $this->getcomments->sum('star_number');
        $average = ROUND($starCountnumber/$count);
        return $average;
    }
    public function scopeSearch($query){
        if(request()->key){
            $keyword = request()->key;
            $query->where('name','LIKE','%'.$keyword.'%');
        }
        return $query;
    }
    public function scopePrice($query){
        if(request()->min_price && request()->max_price){
            $min = request()->min_price;
            $max = request()->max_price;
            if($min < $max){
                return $query->where('price','>=',$min)
                    ->where('price','<='.$max);
            }
        }
    }
    public function scopeCat($query){
        if(request()->cat_id){
            $id = request()->cat_id;
            $query->where('category_id',$id);
        }
        return $query;
    }

    public function scopeOrder($query){
        $orderby = request()->orderby;
        if($orderby){       
            switch($orderby){
                case 'desc':
                    return $query->orderBy('id','DESC');
                break;
                case 'asc':
                    return $query->orderBy('id','ASC');
                break;
                case 'price_max':
                    return $query->orderBy('sale_price','ASC');
                break;
                case 'price_min':
                    return $query->orderBy('sale_price','DESC');
                break;
               default:
                    return $query->orderBy('id','DESC');
                break;
            }
        }
        return $query;
    }

    public function scopeAdd(){
        $model = $this->create([
            'name'=>request()->name,
            'slug'=>\Str::slug(request()->name),
            'image'=>str_replace(url('public/image').'/','',request()->image),
            'price'=>request()->price,
            'sale_price'=>request()->sale_price,
            'sumary'=>request()->sumary,
            'content'=>request()->content,
            'category_id'=>request()->category_id,
            'brand_id'=>request()->brand_id,
            'meta_title'=>request()->meta_title,
            'meta_desc'=>request()->meta_desc,
            'meta_key'=>request()->meta_key
        ]);
        Colors::add($model);
        Images::add($model);
        return $model?$model->id:false;
    }
    public function scopeModify($query,$id){
        $pro = $this->find($id);
        if(request()->image){
            request()->merge(['image'=>str_replace(url('public/image').'/','',request()->image)]);
        };
        request()->merge(['slug'=>\Str::slug(request()->name)]);
        $model = $pro->update(request()->except('_method','_token','id'));
        Colors::update_color($pro,$id);
        Images::update_image($pro,$id);
        return $model?$model:false;
    }
    public function scopeRemove($query,$id){
        $pro = $this->find($id);
        Product_detail::where(['product_id'=>$pro->id])->delete();
        Product_image::where(['product_id'=>$pro->id])->delete();
        Favorite::where(['product_id'=>$pro->id])->delete();
        $pro->delete();
    }
    
}
