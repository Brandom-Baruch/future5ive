<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function getFeatureAttribute()
    {	
    	if($this->image)
    		return '/images/categories/'.$this->image;
    	else

        $firstProduct = $this->products()->first();
    	if($firstProduct)
        	return $firstProduct->feature;

        return 'images/defecto.jpg';
    }
}
