<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helper\Uploads;

class Homes extends Model
{
    public function scopeSearch($query){
        if(request()->key){
            $keyword = request()->key;
            $query->where('name','LIKE','%'.$keyword.'%');
        }
        return $query;
    }
}
