<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->datetime('reservation_datetime')->comment('予約日時');
            $table->integer('reservation_people')->comment('予約人数');
            $table->string('reservation_request')->comment('要望');
            $table->integer('reservation_status')->comment('予約ステータス');
            $table->integer('reservation_information')->comment('備考欄');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
