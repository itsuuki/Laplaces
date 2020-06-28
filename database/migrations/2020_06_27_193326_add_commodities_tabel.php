<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommoditiesTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commodities', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->default(NULL);
            $table->unsignedBigInteger('shop_id')->nullable()->default(NULL);
            $table->unsignedBigInteger('favorite_id')->nullable()->default(NULL);
            $table->unsignedBigInteger('image_id')->nullable()->default(NULL);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->foreign('favorite_id')->references('id')->on('favorites')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commodities', function (Blueprint $table) {
            //
        });
    }
}
