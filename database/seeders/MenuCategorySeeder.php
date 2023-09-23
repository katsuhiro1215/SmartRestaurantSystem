<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuCategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('menu_categories')->insert([
            [
                'name' => 'セットメニュー',
                'description' => null,
            ],
            [
                'name' => 'メインメニュー',
                'description' => null,
            ],
            [
                'name' => 'ドリンクメニュー',
                'description' => null,
            ],
            [
                'name' => 'サイドメニュー',
                'description' => null,
            ],
        ]);
    }
}
