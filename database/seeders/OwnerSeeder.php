<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    public function run()
    {
        DB::table('owners')->insert([
            [
                'email' => 'katsuhiro.k1215@gmail.com',
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
