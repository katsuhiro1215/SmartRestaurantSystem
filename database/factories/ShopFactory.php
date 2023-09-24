<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    protected $model = Shop::class;

    public function definition()
    {
        return [
            'admin_id' => Admin::all()->random()->id,
            'name' => fake()->name(),
            'type' => fake()->name(),
            'description' => fake()->realText(),
            'email' => fake()->unique()->safeEmail(),
            'shop_photo_path' => fake()->url(),
            'shop_logo_path' => fake()->url(),
            'zipcode' => fake()->postcode(),
            'address1' => fake()->prefecture(),
            'address2' => fake()->city(),
            'address3' => fake()->streetName(),
            'address4' => fake()->streetName(),
            'phone_number' => fake()->phoneNumber(),
            'fax_number' => fake()->phoneNumber(),
            'website' => fake()->url(),
            'facebook' => fake()->url(),
            'twitter' => fake()->url(),
            'instagram' => fake()->url(),
            'youtube' => fake()->url(),
            'line' => fake()->url(),
            'established_date' => fake()->dateTimeBetween('1900-01-01', '2022-12-31'),
            'status' => fake()->boolean(1, 0),
        ];
    }
}
