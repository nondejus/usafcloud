<?php

use App\Models\User\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    $firstName = $faker->firstName;
    $lastName = $faker->lastName;

    return [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'middle_name' => $faker->firstName,
        'suffix' => (rand(0, 1)) ? $faker->suffix : '',
        'nickname' => (rand(0, 1)) ? $faker->firstName : '',
        'email' => strtolower("{$firstName}.{$lastName}@us.af.mil"),
        'email_verified_at' => now(),
        'date_of_birth' => '',
        'gender_id' => null,
        'avatar' => null,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'password_reset_required' => (rand(0, 1)),
        'last_password_reset' => now(),
        'last_login' => null,
        'remember_token' => Str::random(10),
    ];
});
