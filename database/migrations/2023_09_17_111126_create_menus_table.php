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
            $table->string('name_en', 100)->comment('メニュー名前');
            $table->text('description')->nullable()->comment('メニュー概要');
            $table->text('description_en')->nullable()->comment('メニュー概要');
            $table->text('detail')->nullable()->comment('メニュー詳細');
            $table->text('detail_en')->nullable()->comment('メニュー詳細');
            $table->string('slug')->comment('スラッグ');
            $table->string('code')->comment('メニューコード');
            $table->integer('selling_price')->comment('価格');
            $table->integer('discount_price')->nullable()->comment('価格');
            $table->string('menu_photo_path')->nullable()->comment('メニュー画像');
            $table->boolean('hot_deals')->default(0);
            $table->boolean('featured')->default(0);
            $table->boolean('special_offer')->default(0);
            $table->boolean('special_deals')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
