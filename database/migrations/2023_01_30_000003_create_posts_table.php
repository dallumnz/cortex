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
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('title');
            $table->longText('description');
            $table->string('keywords');
            $table->string('tags');
            $table->boolean('status');
            $table->boolean('visibility');
            $table->boolean('featured');
            $table->boolean('breaking');
            $table->boolean('recommended');
            $table->boolean('headline');
            $table->string('post_type');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->unsignedBigInteger('created_by');

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
        Schema::dropIfExists('posts');
    }
};
