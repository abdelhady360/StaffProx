<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UaeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('uaes')->insert([
            [

                'uae'	=> 'أبوظبي',
                'slug'	=> 'abu-dhabi',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'uae'	=> 'دبي',
                'slug'	=> 'dubai',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],

            //php artisan db:seed  | php artisan migrate:refresh
        ]);
    }
}
