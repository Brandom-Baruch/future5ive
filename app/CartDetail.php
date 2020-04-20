<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    public function product ()
    {
    	return $this->belongsTo(Product::class);
    }
}
