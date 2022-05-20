<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrant('users','id')->nullable();
            $table->string('company_id')->constrant('commpanies','company_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('how_sell_products')->nullable();
            $table->string('what_going_sell')->nullable();
            $table->string('business_registered')->nullable();
            $table->string('theme')->default('ecommerce1');
            $table->string('setting')->nullable();
            $table->string('logo')->nullable();
            $table->enum('plan',['free','premium','enterprise'])->default('free');
            $table->enum('status',['active','inactive'])->default('active');
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
        Schema::dropIfExists('stores');
    }
}
