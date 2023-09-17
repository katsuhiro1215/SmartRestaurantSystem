<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservation_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained();
            $table->string('action')->comment('操作');
            $table->datetime('action_datetime')->comment('操作日時');
            $table->string('comment')->comment('スタッフコメント');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservation_logs');
    }
};
