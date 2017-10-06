<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id','sub_category_id','productName','productBrief','productDescription','productPrice','Quantity','Condition','BrandName','product_file'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public static function getProduct()
    {
        return static ::where('id',1)->first();
    }

    public static function getProductsByName()
    {
        $getProductsByName = request('BrandName');
        if ($getProductsByName == request('BrandName')){
            return static::where('BrandName','like',"%$getProductsByName%")->get();
        }
    }
}
