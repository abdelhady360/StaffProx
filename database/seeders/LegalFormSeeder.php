<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegalFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('legal_forms')->insert([
            [
                'name'	=> 'مؤسسة فردية',
                'slug'	=> 'individual-foundation',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],[
                'name'	=> 'شركة ذات مسؤولية محدودة',
                'slug'	=> 'limited-liability-company',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],[
                'name'	=> 'شركة الشخص الواحد ذ م م',
                'slug'	=> 'sole-proprietorship-llc',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],[
                'name'	=> 'شركة الشخص الواحد ش م خ',
                'slug'	=> 'sole-proprietorship-pjsc',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],[
                'name'	=> 'مؤسسة مهنية',
                'slug'	=> 'professional-foundation',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],[
                'name'	=> 'شركة مهنية',
                'slug'	=> 'professional-company',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],[
                'name'	=> 'شركة مساهمة خاصة',
                'slug'	=> 'private-joint-stock-company',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],[
                'name'	=> 'شركة مساهمة عامة',
                'slug'	=> 'public-joint-stock-company',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],[
                'name'	=> 'شركة ضمان',
                'slug'	=> 'guarantee-company',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],[
                'name'	=> 'شركة توصية بسيطة',
                'slug'	=> 'simple-recommendation-company',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()
            ],

            //php artisan db:seed  | php artisan migrate:refresh
        ]);
    }
}
