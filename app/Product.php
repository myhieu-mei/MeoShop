<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo("App\Category", "category_id", "id");
    }
    public function user(){
        return $this->belongsToMany("App\User", "carts", "user_id", "product_id");
    }

}
