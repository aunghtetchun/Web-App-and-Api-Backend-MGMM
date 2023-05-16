<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
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
            $table->string('name');
            $table->string('logo');
            $table->string('type');
            $table->integer('category_id');
            $table->string('updated')->nullable();
            $table->string('size');
            $table->string('version');
            $table->string('requirement')->nullable();
            $table->string('developer')->nullable();
            $table->longText('description');
            $table->longText('features')->nullable();
            $table->longText('video')->nullable();
            $table->longText('link1');
            $table->longText('link2')->nullable();
            $table->longText('link3')->nullable();
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
}
