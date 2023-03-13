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
        Schema::create('analytics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('session')->nullable();
            $table->string('uri')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->string('country')->nullable();
            $table->string('browser')->nullable();
            $table->string('os')->nullable();
            $table->string('user_id')->nullable();
            $table->string('post_id')->nullable();
            $table->text('meta')->nullable();

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
        Schema::dropIfExists('analytics');
    }
};
