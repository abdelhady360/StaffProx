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
        $this->call(UserSeeder::class);
        $this->call(SexSeeder::class);
        $this->call(LegalFormSeeder::class);
        $this->call(UaeSeeder::class);
        $this->call(AuthoritySeeder::class);
    }
}
