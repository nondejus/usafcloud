<?php

use Illuminate\Database\Seeder;
use App\Models\References\Gender;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Gender::class)->create(['title' => 'Male']);
        factory(Gender::class)->create(['title' => 'Female']);
        factory(Gender::class)->create(['title' => 'Prefer not to say']);
    }
}
