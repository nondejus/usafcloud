<?php

use Illuminate\Database\Seeder;
use App\Models\References\MilitaryRank;

class MilitaryRanksTableSeeder extends Seeder
{
    protected $enlisted_ranks = [
        [
            'name' => 'Airman Basic',
            'abbr' => 'AB',
            'pay_grade' => 'E-1',
        ], [
            'name' => 'Airman',
            'abbr' => 'Amn',
            'pay_grade' => 'E-2',
        ], [
            'name' => 'Airman First Class',
            'abbr' => 'A1C',
            'pay_grade' => 'E-3',
        ], [
            'name' => 'Senior Airman',
            'abbr' => 'SrA',
            'pay_grade' => 'E-4',
        ], [
            'name' => 'Staff Sergeant',
            'abbr' => 'SSgt',
            'pay_grade' => 'E-5',
        ], [
            'name' => 'Technical Sergeant',
            'abbr' => 'TSgt',
            'pay_grade' => 'E-6',
        ], [
            'name' => 'Master Sergeant',
            'abbr' => 'MSgt',
            'pay_grade' => 'E-7',
        ], [
            'name' => 'Senior Master Sergeant',
            'abbr' => 'SMSgt',
            'pay_grade' => 'E-8',
        ], [
            'name' => 'Chief Master Sergeant',
            'abbr' => 'CMSgt',
            'pay_grade' => 'E-9',
        ],
    ];

    protected $officer_ranks = [
        [
            'name' => 'Second Lieutenant',
            'abbr' => '2d Lt',
            'pay_grade' => 'O-1',
        ], [
            'name' => 'First Lieutenant',
            'abbr' => '1st Lt',
            'pay_grade' => 'O-2',
        ], [
            'name' => 'Captain',
            'abbr' => 'Capt',
            'pay_grade' => 'O-3',
        ], [
            'name' => 'Major',
            'abbr' => 'Maj',
            'pay_grade' => 'O-4',
        ], [
            'name' => 'Lieutentant Colonel',
            'abbr' => 'Lt Col',
            'pay_grade' => 'O-5',
        ], [
            'name' => 'Colonel',
            'abbr' => 'Col',
            'pay_grade' => 'O-6',
        ], [
            'name' => 'Brigadier General',
            'abbr' => 'Brig Gen',
            'pay_grade' => 'O-7',
        ], [
            'name' => 'Major General',
            'abbr' => 'Maj Gen',
            'pay_grade' => 'O-8',
        ], [
            'name' => 'Lieutenant General',
            'abbr' => 'Lt Gen',
            'pay_grade' => 'O-9',
        ], [
            'name' => 'General',
            'abbr' => 'Gen',
            'pay_grade' => 'O-10',
        ],
    ];

    public function run()
    {
        // collect($this->enlisted_ranks)->map(function ($item, $classification) {
        //     factory(MilitaryRank::class)->create([
        //         'name' => $item['name'],
        //         'abbr' => $item['abbr'],
        //         'pay_grade' => $item['pay_grade'],
        //         'display_order' => 0,
        //         'classification_id' => function () {
        //             return '';
        //         },
        //         'branch_id' => factory(MilitaryBranch::class)->create()->id,
        //         'active' => true
        //     ]);
        // });
    }
}
