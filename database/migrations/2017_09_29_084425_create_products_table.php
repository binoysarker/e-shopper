<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->string('brand_name');
            $table->string('product_name');
            $table->string('product_brief');
            $table->text('product_description');
            $table->float('product_price');
            $table->tinyInteger('_availability')->default(0);
            $table->integer('quantity');
            $table->integer('click_count')->default(0);
            $table->integer('reorder_level');
            $table->tinyInteger('is_featured')->default(0);
            $table->string('condition');
            $table->string('product_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
