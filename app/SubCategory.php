<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable= ['SubCategoryName'];
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
        $SubCategoryName = request('SubCategoryName');
        if ($SubCategoryName == request('SubCategoryName')){
            return static::where('SubCategoryName','like',"%$SubCategoryName%")->get();
        }
    }

}
