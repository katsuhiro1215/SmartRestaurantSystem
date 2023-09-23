<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    // protected $model = UserProfile::class;

    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'lastname' => fake()->lastName(),
            'firstname' => fake()->firstName(),
            'lastname_kana' => fake()->lastKanaName(),
            'firstname_kana' => fake()->firstKanaName(),
            'user_photo_path' => fake()->url(),
            'birth' => fake()->dateTimeBetween('2000-01-01', '2020-12-31'),
            'gender' => fake()->randomElement(['男', '女', 'その他']),
            'zipcode' => fake()->postcode(),
            'address1' => fake()->prefecture(),
            'address2' => fake()->city(),
            'address3' => fake()->streetName(),
            'address4' => fake()->streetName(),
            'phone_number' => fake()->phoneNumber(),
            'member_no' => fake()->numberBetween(10000, 99999),
            'membership_status' => fake()->randomElement(['会員', '非会員']),
        ];
    }
}
