<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->constrant('stores','id')->nullable();
            $table->string('user_name');
            $table->string('merchant_id')->nullable();
            $table->string('full_name')->nullable();
            $table->string('email')->unique();
            $table->string('address')->nullable();
            $table->enum('type', ['superadmin','admins', 'merchants','users'])->default('merchants');
            $table->date('birthday')->nullable();
            $table->string('avatar')->nullable();
            $table->string('country')->nullable();
            $table->string('phone_number')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('email_verified_at')->nullable();
            $table->json('abilities')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
