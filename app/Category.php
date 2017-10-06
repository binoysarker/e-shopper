<?php

namespace App;

use App\Http\Controllers\ProductController;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable= ['categoryName'];
    protected $hidden=['user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subCategories()
    {
       return $this->hasMany(SubCategory::class);
    }
}
