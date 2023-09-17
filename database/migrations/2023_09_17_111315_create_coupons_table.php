<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('クーポン名');
            $table->string('code')->comment('クーポンコード');
            $table->integer('price')->comment('割引率、金額');
            $table->datetime('expiry')->comment('有効期限');
            $table->string('applicable_condition')->comment('適用条件');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coupons');
    }
};
