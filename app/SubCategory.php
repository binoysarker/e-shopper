<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable= ['sub_category_name'];
    protected $hidden=['category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function getSubCategories()
    {
        $SubCategoryName = request('sub_category_name');
        if ($SubCategoryName == request('sub_category_name')){
            return static::where('sub_category_name','like',"%$SubCategoryName%")->get();
        }
    }

}
