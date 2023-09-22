<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admin_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained();
            $table->string('lastname', 40)->comment('姓');
            $table->string('firstname', 40)->comment('名');
            $table->string('lastname_kana', 50)->comment('セイ');
            $table->string('firstname_kana', 50)->comment('メイ');
            $table->string('admin_photo_path')->nullable()->comment('ユーザー写真');
            $table->date('birth')->nullable()->comment('生年月日');
            $table->string('gender', 10)->nullable()->comment('性別');
            $table->string('zipcode', 10)->nullable()->comment('郵便番号');
            $table->string('address1', 20)->nullable()->comment('都道府県名');
            $table->string('address2', 30)->nullable()->comment('市区町村名');
            $table->string('address3', 50)->nullable()->comment('町域名');
            $table->string('address4', 100)->nullable()->comment('それ以降の住所');
            $table->string('phone_number', 20)->nullable()->comment('連絡先');
            $table->string('website')->nullable()->comment('URL');
            $table->string('facebook')->nullable()->comment('Facebook URL');
            $table->string('twitter')->nullable()->comment('Twitter URL');
            $table->string('instagram')->nullable()->comment('Instagram URL');
            $table->string('youtube')->nullable()->comment('YouTube URL');
            $table->string('line')->nullable()->comment('LINE URL');
            $table->string('status', 20)->default('利用中')->comment('利用中, 停止中、退会');
            $table->string('role', 20)->comment('SuperAdmin, Admin, SubAdmin');
            $table->date('start_date')->comment('利用開始日');
            $table->datetime('last_login_at')->nullable()->comment('最終ログイン日時');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_profiles');
    }
};
