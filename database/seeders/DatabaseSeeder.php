<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Admin;
use App\Models\AdminProfile;
use App\Models\Employee;
use App\Models\EmployeeProfile;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Shop;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(OwnerSeeder::class);
        $this->call(OwnerProfileSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(AdminProfileSeeder::class);
        Admin::factory(3)->create();
        AdminProfile::factory(3)->create();
        Employee::factory(10)->create();
        EmployeeProfile::factory(10)->create();
        User::factory(200)->create();
        UserProfile::factory(200)->create();
        $this->call(ShopSeeder::class);
        Shop::factory(5)->create();
        $this->call(MenuCategorySeeder::class);
    }
}
