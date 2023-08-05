<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sexes')->insert([
            [

                'sex'	=> 'ذكر',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'sex'	=> 'أنثي',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ] //php artisan db:seed  | php artisan migrate:refresh
        ]);
    }
}
