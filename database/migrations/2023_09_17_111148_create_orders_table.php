<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('table_number')->comment('テーブル番号');
            $table->string('order_status')->comment('受付中、調理中、注文完了など');
            $table->datetime('order_datetime')->comment('注文日時');
            $table->string('payment_status')->comment('支払いステータス');
            $table->string('information')->comment('備考欄');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
