<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(OwnerSeeder::class);
        $this->call(OwnerProfileSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(AdminProfileSeeder::class);
    }
}
