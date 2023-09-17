<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('order_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->foreignId('menu_id')->constrained();
            $table->integer('quantity')->comment('数量');
            $table->integer('price')->comment('価格');
            $table->string('option')->comment('オプション');
            $table->text('information')->comment('備考欄');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_menus');
    }
};
