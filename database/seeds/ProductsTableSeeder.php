<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\ProductImage;
use App\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // model factory
        
        //factory(Category::class,5)->create();        
        //factory(Product::class,200)->create();        
        //factory(ProductImage::class,250)->create();

        
        $categories = factory(Category::class,4)->create(); 
        
        $categories->each(function($category){
            
        $products= factory(Product::class,5)->make();
        $category->products()->saveMany($products);  //relacion ente categoria y producto
        $products->each(function($p){
        $images = factory(ProductImage::class,3)->make();
        $p->images()->saveMany($images); // relacion entre producto e imagenes
                });
        });

    }
}
