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
            $table->string('BrandName');
            $table->string('productName');
            $table->string('productBrief');
            $table->text('productDescription');
            $table->float('productPrice');
            $table->tinyInteger('Availability')->default(0);
            $table->integer('Quantity');
            $table->integer('clickCount')->default(0);
            $table->integer('ReorderLevel');
            $table->tinyInteger('IsFeatured')->default(0);
            $table->string('Condition');
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
