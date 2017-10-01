<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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
}