<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminProfileSeeder extends Seeder
{
    public function run()
    {
        DB::table('admin_profiles')->insert([
            [
                'admin_id' => 1,
                'lastname' => '山田',
                'firstname' => '太郎',
                'lastname_kana' => 'ヤマダ',
                'firstname_kana' => 'タロウ',
                'admin_photo_path' => null,
                'birth' => '2001-01-01',
                'gender' => '男',
                'zipcode' => '6308303',
                'address1' => '奈良県',
                'address2' => '奈良市',
                'address3' => '南紀寺町',
                'address4' => '2丁目274-3萠黄アパート103号',
                'phone_number' => '090-9580-9257',
                'website' => 'https://katsu-coach.com/',
                'facebook' => 'https://www.facebook.com/katsuhiro.kakoi/',
                'twitter' => 'https://twitter.com/KatsuhiroKakoi',
                'instagram' => 'https://www.instagram.com/katsuhiro.k1215/',
                'youtube' => 'https://www.youtube.com/channel/UC1wqTr1OLcwdT_iyPUR_QKQ',
                'line' => null,
                'status' => '利用中',
                'role' => 'SuperAdmin',
                'start_date' => '2022-10-01',
                'last_login_at' => now(),
            ],
        ]);
    }
}
