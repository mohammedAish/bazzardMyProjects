<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->foreignId('category_id')->constrant('categories','id')->nullable();
            $table->foreignId('store_id')->constrant('stores','id');
            //$table->string('slug')->unique();
            $table->string('name');
            $table->string('name_ar')->nullable();
            $table->string('intro')->nullable();
            $table->string('intro_ar')->nullable();
            $table->string('desc')->nullable();
            $table->string('desc_ar')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('price');
            $table->integer('qty');
            $table->string('num_off_sales')->nullable();
            $table->enum('stock', ['in_stock', 'out_of_stock'])->default('in_stock');
            $table->integer('viewed')->unsigned()->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->unsignedInteger('saleprice')->nullable();
            $table->softDeletes();
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
