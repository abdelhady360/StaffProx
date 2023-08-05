<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthoritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authorities')->insert([
            [

                'authority'	=> 'دائرة القضاء أبوظبي',
                'slug'	=> 'Abu-Dhabi-Judicial-Department',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'وزارة الداخلية',
                'slug'	=> 'Ministry-of-Interior',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'القيادة العامة لشرطة أبوظبي',
                'slug'	=> 'General-Command-of-Abu-Dhabi-Police',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'دائرة التنمية الاقتصادية',
                'slug'	=> 'Department-of-Economic-Development',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'هيئة أبوظبي للدعم الاجتماعي',
                'slug'	=> 'Abu- Dhabi-Social-Support-Authority',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'دائرة البلديات والنقل',
                'slug'	=> 'Department-of-Municipalities-and-Transport',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'دائرة تنمية المجتمع',
                'slug'	=> 'Community-Development-Department',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'مؤسسة التنمية الأسرية',
                'slug'	=> 'Family-Development-Foundation',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'وزارة الموارد البشرية والتوطين',
                'slug'	=> 'Ministry-of-Human-Resources-and-Emiratisation',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'الهيئة الاتحادية للهوية والجنسية',
                'slug'	=> 'Federal-Authority-for-Identity-and-Nationality',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'صندوق أبوظبي للتقاعد',
                'slug'	=> 'Abu-Dhabi-Pension-Fund',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'دائرة الصحة',
                'slug'	=> 'Department-of-Health',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'هيئة الموارد البشرية أبوظبي',
                'slug'	=> 'Human-Resources-Authority-Abu-Dhabi',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'هيئة أبوظبي للإسكان',
                'slug'	=> 'Abu-Dhabi-Housing-Authority',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'مركز النقل المتكامل',
                'slug'	=> 'Integrated-Transportation-Centre',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'دائرة الطاقة أبوظبي',
                'slug'	=> 'Abu-Dhabi-Department-of Energy',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'مجلس أبوظبي للجودة والمطابقة',
                'slug'	=> 'Abu-Dhabi-Quality-and-Conformity-Council',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'غرفة تجارة وصناعة أبوظبي',
                'slug'	=> 'Abu-Dhabi-Chamber-of-Commerce-and-Industry',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'هيئة أبوظبي للزراعة والسلامة الغذائية',
                'slug'	=> 'Abu-Dhabi-Agriculture-and-Food-Safety-Authority',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'دائرة الثقافة والسياحة أبوظبي',
                'slug'	=> 'Department-of-Culture-and-Tourism-Abu-Dhabi',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'الضمان الصحي',
                'slug'	=> 'Medical-Insurance',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'صندوق الزكاة',
                'slug'	=> 'Zakat-Fund',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'وزارة التربية والتعليم',
                'slug'	=> 'Ministry-of-Education',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'دائرة التعليم والمعرفة أبوظبي',
                'slug'	=> 'Abu-Dhabi-Department-of-Education-and-Knowledge',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'الإدارة العامة للجمارك أبوظبي',
                'slug'	=> 'Abu-Dhabi-General-Administration-of-Customs',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'هيئة الاوقاف وادارة اموال القصر',
                'slug'	=> 'Endowments-Authority-and-Management-of-Minors-Funds',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'مؤسسة زايد العليا لأصحاب الهمم',
                'slug'	=> 'Zayed-Higher-Organization-for-People-of-Determination',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'شركة أبوظبي للتوزيع',
                'slug'	=> 'Abu-Dhabi-Distribution-Company',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'شركة العين للتوزيع',
                'slug'	=> 'Al-Ain-Distribution-Company',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'شركة أبوظبي لادارة النفايات',
                'slug'	=> 'Abu-Dhabi-Waste-Management-Company',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'هيئة البيئة أبوظبي',
                'slug'	=> 'Abu-Dhabi-Environment-Agency',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'هيئة الرعاية الاسرية',
                'slug'	=> 'Family-Welfare-Authority',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'دار زايد للثقافة الإسلامية أبوظبي',
                'slug'	=> 'Zayed-House-for-Islamic-Culture-Abu-Dhabi',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'مركز أبوظبي للتعليم والتدريب التقني والمهني',
                'slug'	=> 'Abu-Dhabi-Center-for-Technical-and-Vocational-Education-and-Training',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'صندوق خليفة لتطوير المشاريع',
                'slug'	=> 'Khalifa-Fund-for-Enterprise-Development',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'الخدمة الوطنية والاحتياطية',
                'slug'	=> 'National-and-reserve-service',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'شركة أبوظبي لحلول المياه المستدامة',
                'slug'	=> 'Abu-Dhabi-Sustainable-Water-Solutions-Company',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'المركز الوطني للتأهيل',
                'slug'	=> 'The-National-Rehabilitation-Center',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],[

                'authority'	=> 'مكتب أبوظبي للاستثمار',
                'slug'	=> 'Abu-Dhabi-Investment-Office',
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now()

            ],

            //php artisan db:seed  | php artisan migrate:refresh
        ]);
    }
}
