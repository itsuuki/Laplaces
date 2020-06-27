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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('uregion')->nullable();
            $table->integer('uphoto')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('review_id');
            $table->unsignedBigInteger('favorite_id');
            $table->unsignedBigInteger('reservation_id');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade')->nullable()->default(NULL);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade')->nullable()->default(NULL);
            $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade')->nullable()->default(NULL);
            $table->foreign('favorite_id')->references('id')->on('favorites')->onDelete('cascade')->nullable()->default(NULL);
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade')->nullable()->default(NULL);
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
