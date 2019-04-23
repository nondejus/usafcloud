<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\References\MilitaryBranches;

$factory->define(MilitaryBranches::class, function () {
    return [
        'name' => '',
        'abbr' => '',
        'display_order' => 0,
    ];
});
