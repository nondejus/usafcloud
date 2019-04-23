<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Models\User\UserContactInfo;

$factory->define(UserContactInfo::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\Models\User\User::class)->create()->id,
        'cell_phone' => $faker->phoneNumber,
        'personal_email' => $faker->safeEmail,
    ];
});
