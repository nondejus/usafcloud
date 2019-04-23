<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\References\Gender;

$factory->define(Gender::class, function () {
    return [
        'title' => '',
        'display_order' => 0,
        'active' => true,
    ];
});
