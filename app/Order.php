<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   public function customer(){
      return $this->belongsTo("App\Customer", "customer_id", "id");
  }
  public function promotion(){
   return $this->belongsTo("App\Promotion", "promo_code", "code");
}
}
