<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('categories','id')->nullOnDelete();
            $table->foreignId('store_id')->constrant('stores','id');
            $table->string('name');
            $table->string('name_ar')->nullable();
            //$table->string('slug')->unique();
            $table->text('desc')->nullable();
            $table->text('desc_ar')->nullable();
            $table->string('image')->nullable();
            $table->enum('status', ['active', 'inactive']);
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
        Schema::dropIfExists('categories');
    }
}
