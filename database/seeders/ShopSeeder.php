<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    public function run()
    {
        DB::table('shops')->insert([
            [
                'admin_id' => 1,
                'name' => 'かつコード',
                'type' => '本店',
                'description' => null,
                'email' => 'info@katsucode.jp',
                'shop_photo_path' => null,
                'shop_logo_path' => null,
                'zipcode' => '6308303',
                'address1' => '奈良県',
                'address2' => '奈良市',
                'address3' => '南紀寺町',
                'address4' => '2丁目274-3萠黄アパート103号',
                'phone_number' => '090-9580-9257',
                'fax_number' => null,
                'website' => 'https://katsu-coach.com/',
                'facebook' => 'https://www.facebook.com/katsuhiro.kakoi/',
                'twitter' => 'https://twitter.com/KatsuhiroKakoi',
                'instagram' => 'https://www.instagram.com/katsuhiro.k1215/',
                'youtube' => 'https://www.youtube.com/channel/UC1wqTr1OLcwdT_iyPUR_QKQ',
                'line' => null,
                'established_date' => '2022-05-13',
                'status' => 1,
            ],
        ]);
    }
}
