<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\References\CivilianGrades;

$factory->define(CivilianGrades::class, function () {
    return [
        'name' => '',
        'abbr' => '',
        'display_order' => 0,
    ];
});
