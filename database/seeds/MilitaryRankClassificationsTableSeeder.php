<?php

use Illuminate\Database\Seeder;
use App\Models\References\MilitaryRankClassification;

class MilitaryRankClassificationsTableSeeder extends Seeder
{
    protected $enlisted_classifications = [
        'Airman',
        'Noncommissioned Officer',
        'Senior Noncommissioned Officer',
    ];

    protected $officer_classifications = [
        'Company Grade Officer',
        'Field Grade Officer',
        'General Officer',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect($this->enlisted_classifications)->map(function ($item) {
            factory(MilitaryRankClassification::class)->create([
                'name' => $item,
            ]);
        });

        collect($this->officer_classifications)->map(function ($item) {
            factory(MilitaryRankClassification::class)->create([
                'name' => $item,
            ]);
        });
    }
}
