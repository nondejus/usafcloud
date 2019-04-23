<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\References\MilitaryRank;
use App\Models\References\MilitaryBranch;
use App\Models\References\MilitaryRankClassification;

$factory->define(MilitaryRank::class, function () {
    return [
        'name' => '',
        'abbr' => '',
        'pay_grade' => '',
        'display_order' => 0,
        'classification_id' => factory(MilitaryRankClassification::class)->create()->id,
        'branch_id' => factory(MilitaryBranch::class)->create()->id,
        'active' => true
    ];
});
