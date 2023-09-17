<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_category_id')->constrained();
            $table->string('name', 100)->comment('メニュー名前');
            $table->string('description')->comment('メニュー概要');
            $table->integer('price')->comment('価格');
            $table->string('menu_photo_path')->nullable()->comment('メニュー画像');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
