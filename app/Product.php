<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public function images()
   {
   	return $this->hasMany(ProductImage::class);
   }

    //relacion entre producto y categoria
    public function category(){
    	//Esta linea quiere decir que esto pertenece a una categoria
    	return $this->belongsTo(Category::class);
    }	

    //imagen destacada
    
    public function getFeatureAttribute()
    {	
    
    	$featuredImage = $this->images()->where('featured', true)->first();
    	//si no hay una imagen destacada
    	if(!$featuredImage){
    		$featuredImage = $this->images()->first();
    	}
    	//si hay una imagen destacada
    	if($featuredImage){
    		return $featuredImage->url;
    	}

    	//devolver una imagen por defecto
    	 return '/images/products/defecto.jpg';
    }
}
