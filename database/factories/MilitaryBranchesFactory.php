<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\References\MilitaryBranch;

$factory->define(MilitaryBranch::class, function () {
    return [
        'name' => '',
        'abbr' => '',
        'display_order' => 0,
    ];
});
