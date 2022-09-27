<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'market1',
            'email' => 'market1@market.com',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => 'market2',
            'email' => 'market2@market.com',
            'password' => bcrypt('123456')
        ]);
    }
}
