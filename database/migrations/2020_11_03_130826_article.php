<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Article extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->tinyInteger('status')->default(0);
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('publish_at')->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->longText('body')->nullable();

            $table->foreign('category_id')->references('id')->on('article_categories');
        });

        Schema::create('article_category', function (Blueprint $table) {
            $table->bigInteger('article_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();

            $table->foreign('article_id')->references('id')->on('articles')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('article_categories')->cascadeOnDelete();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('article_category');
        Schema::drop('articles');
        Schema::drop('article_categories');
    }
}
