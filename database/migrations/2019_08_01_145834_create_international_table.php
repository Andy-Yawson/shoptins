<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternationalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('international', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link');
            $table->integer('quantity');
            $table->string('weight');
            $table->string('origin');
            $table->string('destination');
            $table->string('other');
            $table->integer('shopper_assist');
            $table->integer('self_shopper');
            $table->string('address');
            $table->string('code');
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('international');
    }
}
