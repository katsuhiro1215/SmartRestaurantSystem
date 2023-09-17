<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('ブログカテゴリー名');
            $table->string('description')->nullable()->comment('ブログカテゴリー概要');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_categories');
    }
};
