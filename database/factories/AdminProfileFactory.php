<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminProfile>
 */
class AdminProfileFactory extends Factory
{
    // protected $model = AdminProfile::class;

    public function definition()
    {
        return [
            'admin_id' => Admin::all()->random()->id,
            'lastname' => fake()->lastName(),
            'firstname' => fake()->firstName(),
            'lastname_kana' => fake()->lastKanaName(),
            'firstname_kana' => fake()->firstKanaName(),
            'admin_photo_path' => fake()->url(),
            'birth' => fake()->dateTimeBetween('1950-01-01', '2005-12-31'),
            'gender' => fake()->randomElement(['男', '女', 'その他']),
            'zipcode' => fake()->postcode(),
            'address1' => fake()->prefecture(),
            'address2' => fake()->city(),
            'address3' => fake()->streetName(),
            'address4' => fake()->streetName(),
            'phone_number' => fake()->phoneNumber(),
            'website' => fake()->url(),
            'facebook' => fake()->url(),
            'twitter' => fake()->url(),
            'instagram' => fake()->url(),
            'youtube' => fake()->url(),
            'line' => fake()->url(),
            'status' => fake()->randomElement(['利用中', '停止中', '退会']),
            'role' => fake()->randomElement(['SuperAdmin', 'Admin', 'SubAdmin']),
            'start_date' => fake()->dateTimeBetween('2023-01-01', '2023-04-30'),
            'last_login_at' => fake()->dateTimeBetween('2023-01-01', '2023-09-20'),
        ];
    }
}
