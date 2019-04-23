<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\References\MilitaryRankClassification;

$factory->define(MilitaryRankClassification::class, function () {
    return [
        'name' => '',
        'display_order' => 0,
    ];
});
