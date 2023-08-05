<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [

                'user_name'	=> 'AbdelHady Mohamed',
                'name'		=> 'abdelhady360',
                'email'		=> 'admin@egypt.com',
                'password'	=> bcrypt('admin'),
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ] //php artisan db:seed  | php artisan migrate:refresh
        ]);
    }
}
