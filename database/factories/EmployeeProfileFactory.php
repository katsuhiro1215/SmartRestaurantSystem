<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployeeProfile>
 */
class EmployeeProfileFactory extends Factory
{
    public function definition()
    {
        return [
            'employee_id' => Employee::all()->random()->id,
            'lastname' => fake()->lastName(),
            'firstname' => fake()->firstName(),
            'lastname_kana' => fake()->lastKanaName(),
            'firstname_kana' => fake()->firstKanaName(),
            'employee_photo_path' => fake()->url(),
            'birth' => fake()->dateTimeBetween('2000-01-01', '2020-12-31'),
            'gender' => fake()->randomElement(['男', '女', 'その他']),
            'zipcode' => fake()->postcode(),
            'address1' => fake()->prefecture(),
            'address2' => fake()->city(),
            'address3' => fake()->streetName(),
            'address4' => fake()->streetName(),
            'phone_number' => fake()->phoneNumber(),
            'status' => fake()->randomElement(['利用中', '停止中']),
            'role' => fake()->randomElement(['正社員', 'パート', 'アルバイト']),
            'start_date' => fake()->dateTimeBetween('2023-01-01', '2023-04-30'),
            'last_login_at' => fake()->dateTimeBetween('2023-01-01', '2023-09-20'),
        ];
    }
}
