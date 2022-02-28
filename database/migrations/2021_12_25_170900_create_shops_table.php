<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name',191);
            $table->text('overview');
            $table->foreignId('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->default('')->nullable();
            $table->foreignId('erea_id')->references('id')->on('ereas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('genre_id')->references('id')->on('genres')->onUpdate('cascade')->onDelete('cascade');
            $table->string('image',191);
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
        Schema::dropIfExists('shops');
    }
}
