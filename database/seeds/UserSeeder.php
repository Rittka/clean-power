<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void0
     */
    public function run()
    {
        User::create([
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'is_founder' => 1,
        ]);
    }
}
