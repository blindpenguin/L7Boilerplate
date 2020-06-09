<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'name' => 'Administrator',
            'email' => 'info@example.com',
            'password' => \Illuminate\Support\Facades\Hash::make('changeme')
        ]);

        $user->assignRole('superadmin');
    }
}
