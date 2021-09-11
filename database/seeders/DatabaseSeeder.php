<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::truncate();

        \App\Models\User::create([
            'name'      => 'Muji',
            'email'     => 'muji@gmail.com',
            'password'  => bcrypt('12345678'),
            'role' => 'ADMIN'
        ]);
    }
}
