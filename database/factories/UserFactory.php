<?php

use App\Models\Auth\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
 */

$factory->define(User::class, function (Faker $faker) {
    $firstName = $faker->firstName();
    $lastName = $faker->lastName;
    return [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'middle_name' => $faker->firstName(),
        'email' => strtolower("{$firstName}.{$lastName}@us.af.mil"),
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'last_password_reset' => now(),
        'remember_token' => Str::random(10),
    ];
});
