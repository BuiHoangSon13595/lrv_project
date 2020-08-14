<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['product_id','client_id','star_number','comment'];

    public function scopeAdd(){
        $model = $this->create([
            'client_id'=>request()->client_id,
            'product_id'=>request()->product_id,
            'star_number'=>request()->star_number,
            'comment'=>request()->comment,
        ]);
        return $model?$model->id:false;
    }
    public function getclient()
    {
        return $this->hasOne(Client::class,'id','client_id');
    }
}
