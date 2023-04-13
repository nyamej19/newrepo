<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyhomes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('price');
            $table->string('paymentType');
            $table->string('availability');
            $table->string('Name');
            $table->string('email');
            $table->string('phone');
            $table->string('homeId');
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
        Schema::dropIfExists('buyhomes');
    }
};
