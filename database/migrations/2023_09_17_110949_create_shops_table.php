<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained();
            $table->string('name', 50)->comment('店舗名');
            $table->string('type', 20)->nullable()->comment('本店, 支店');
            $table->text('description')->nullable()->comment('店舗概要');
            $table->string('email')->unique()->comment('メールアドレス');
            $table->string('store_photo_path')->nullable()->comment('店舗写真');
            $table->string('store_logo_path')->nullable()->comment('店舗ロゴ');
            $table->string('zipcode', 10)->comment('郵便番号');
            $table->string('address1', 20)->comment('都道府県名');
            $table->string('address2', 30)->comment('市区町村名');
            $table->string('address3', 50)->comment('町域名');
            $table->string('address4', 100)->comment('それ以降の住所');
            $table->string('phone_number', 20)->comment('電話番号');
            $table->string('fax_number', 20)->nullable()->comment('FAX番号');
            $table->string('website')->nullable()->comment('URL');
            $table->string('facebook')->nullable()->comment('Facebook URL');
            $table->string('twitter')->nullable()->comment('Twitter URL');
            $table->string('instagram')->nullable()->comment('Instagram URL');
            $table->string('youtube')->nullable()->comment('YouTube URL');
            $table->string('line')->nullable()->comment('LINE URL');
            $table->date('established_date')->nullable()->comment('設立日');
            $table->boolean('status')->default(1)->comment('公開、非公開');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shops');
    }
};
