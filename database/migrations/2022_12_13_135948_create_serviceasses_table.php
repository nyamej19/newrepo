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
        Schema::create('serviceasses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('mode-of-conduct');
            $table->string('service-satisfaction');
            $table->string('time-report');
            $table->string('service-state');
            $table->string('service-personId');
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
        Schema::dropIfExists('serviceasses');
    }
};
