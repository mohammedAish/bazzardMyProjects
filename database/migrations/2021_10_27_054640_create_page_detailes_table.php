<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageDetailesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_detailes', function (Blueprint $table) {
            $table->id();
            $table->string('page_id');
            $table->string('store_id');
            $table->text('desc_ar');
            $table->text('desc');
            //$table->string('intro_ar');
            //$table->string('intro');
            $table->string('image');
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('page_detailes');
    }
}
