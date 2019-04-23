<?php

use Illuminate\Database\Seeder;
use App\Models\References\MilitaryBranch;

class MilitaryBranchesTableSeeder extends Seeder
{
    protected $branches = [
        [
            'name' => 'United States Air Force',
            'abbr' => 'USAF',
            'display_order' => 1
        ], [
            'name' => 'United States Marine Corps',
            'abbr' => 'USMC',
            'display_order' => 0
        ], [
            'name' => 'United States Navy',
            'abbr' => 'USN',
            'display_order' => 0
        ], [
            'name' => 'United States Army',
            'abbr' => 'USA',
            'display_order' => 0
        ], [
            'name' => 'United States Coast Guard',
            'abbr' => 'USCG',
            'display_order' => 0
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect($this->branches)->map(function ($item) {
            factory(MilitaryBranch::class)->create([
                'name' => $item['name'],
                'abbr' => $item['abbr'],
                'display_order' => $item['display_order'],
            ]);
        });
    }
}
