<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
      return $this->belongsTo('App\Category', 'id', 'product_id');
    }

    public function productVariants()
    {
      return $this->hasMany('App\Variant', 'id', 'variant_id');
    }
}
