<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\User\User;
use Faker\Generator as Faker;
use App\Models\Notifications\Notification;

$factory->define(Notification::class, function (Faker $faker) {
    return [
        'notifiable_id' => factory(User::class)->create()->id,
        'notifiable_type' => User::class,
        'title' => $faker->sentence(4),
        'content' => $faker->sentences(3, true),
        'action_text' => $faker->words(3, true),
        'action_url' => $faker->url,
        'viewed' => false,
        'read' => false,
        'snoozed' => true,
        'snoozed_until' => null,
        'payload' => null,
    ];
});
