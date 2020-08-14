<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('status')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamp('birthday')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->tinyInteger('coupon_code_id')->nullable();
            $table->string('code')->nullable()->index();
            $table->timestamp('time_code')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('clients');
    }
}
