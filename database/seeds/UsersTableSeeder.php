<?php

use App\Models\User\User;
use Illuminate\Database\Seeder;
use App\Models\References\Gender;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
            'first_name' => 'Wyatt',
            'last_name' => 'Castaneda',
            'middle_name' => '',
            'suffix' => '',
            'nickname' => 'Wyatt',
            'email' => 'wyatt.castaneda.1@us.af.mil',
            'email_verified_at' => now(),
            'date_of_birth' => null,
            'gender_id' => Gender::where('title', 'male')->first()->id,
            'avatar' => null,
            'password' => '$2y$10$Q4xbKPtpiu6xa2jKOtS4ze2TvmqcuwiW.m0Pg44fSuNj8IjxAYri6',
            'last_password_reset' => now(),
            'last_login' => null,
        ]);

        factory(User::class, 5)->create();
    }
}
