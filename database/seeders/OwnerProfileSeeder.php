<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnerProfileSeeder extends Seeder
{
    public function run()
    {
        DB::table('owner_profiles')->insert([
            [
                'owner_id' => 1,
                'lastname' => '栫',
                'firstname' => '勝宏',
                'lastname_kana' => 'カコイ',
                'firstname_kana' => 'カツヒロ',
                'owner_photo_path' => null,
                'birth' => '1981-12-15',
                'gender' => '男',
                'zipcode' => '6308303',
                'address1' => '奈良県',
                'address2' => '奈良市',
                'address3' => '南紀寺町',
                'address4' => '2丁目274-3萠黄アパート103号',
                'phone_number' => '090-9580-9257',
                'mobile_number' => '090-9580-9257',
                'fax_number' => null,
                'website' => 'https://katsu-coach.com/',
                'facebook' => 'https://www.facebook.com/katsuhiro.kakoi/',
                'twitter' => 'https://twitter.com/KatsuhiroKakoi',
                'instagram' => 'https://www.instagram.com/katsuhiro.k1215/',
                'youtube' => 'https://www.youtube.com/channel/UC1wqTr1OLcwdT_iyPUR_QKQ',
                'line' => null,
            ],
        ]);
    }
}
