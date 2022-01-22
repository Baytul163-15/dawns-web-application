<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    public function type(){
        return $this->belongsTo(Type::class,'type_id','id');
    }
}
