<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['country_status' => 1, 'country_name' => 'الصين', 'country_code' => 'CN', 'economic_power' => 14.34],
            ['country_status' => 1, 'country_name' => 'الهند', 'country_code' => 'IN', 'economic_power' => 3.05],
            ['country_status' => 1, 'country_name' => 'الولايات المتحدة', 'country_code' => 'US', 'economic_power' => 21.43],
            ['country_status' => 1, 'country_name' => 'إندونيسيا', 'country_code' => 'ID', 'economic_power' => 1.28],
            ['country_status' => 1, 'country_name' => 'باكستان', 'country_code' => 'PK', 'economic_power' => 0.30],
            ['country_status' => 1, 'country_name' => 'البرازيل', 'country_code' => 'BR', 'economic_power' => 1.57],
            ['country_status' => 1, 'country_name' => 'نيجيريا', 'country_code' => 'NG', 'economic_power' => 0.52],
            ['country_status' => 1, 'country_name' => 'بنغلادش', 'country_code' => 'BD', 'economic_power' => 0.35],
            ['country_status' => 1, 'country_name' => 'روسيا', 'country_code' => 'RU', 'economic_power' => 1.47],
            ['country_status' => 1, 'country_name' => 'المكسيك', 'country_code' => 'MX', 'economic_power' => 1.28],
            ['country_status' => 1, 'country_name' => 'اليابان', 'country_code' => 'JP', 'economic_power' => 5.15],
            ['country_status' => 1, 'country_name' => 'إثيوبيا', 'country_code' => 'ET', 'economic_power' => 0.05],
            ['country_status' => 1, 'country_name' => 'الفلبين', 'country_code' => 'PH', 'economic_power' => 0.38],
            ['country_status' => 1, 'country_name' => 'مصر', 'country_code' => 'EG', 'economic_power' => 1.36],
            ['country_status' => 1, 'country_name' => 'فيتنام', 'country_code' => 'VN', 'economic_power' => 0.34],
            ['country_status' => 1, 'country_name' => 'جمهورية الكونغو الديمقراطية', 'country_code' => 'CD', 'economic_power' => 0.04],
            ['country_status' => 1, 'country_name' => 'تركيا', 'country_code' => 'TR', 'economic_power' => 0.92],
            ['country_status' => 1, 'country_name' => 'إيران', 'country_code' => 'IR', 'economic_power' => 0.39],
            ['country_status' => 1, 'country_name' => 'ألمانيا', 'country_code' => 'DE', 'economic_power' => 3.84],
            ['country_status' => 1, 'country_name' => 'تايلاند', 'country_code' => 'TH', 'economic_power' => 0.54],
            ['country_status' => 1, 'country_name' => 'المملكة المتحدة', 'country_code' => 'GB', 'economic_power' => 2.83],
            ['country_status' => 1, 'country_name' => 'فرنسا', 'country_code' => 'FR', 'economic_power' => 2.71],
            ['country_status' => 1, 'country_name' => 'إيطاليا', 'country_code' => 'IT', 'economic_power' => 1.85],
            ['country_status' => 1, 'country_name' => 'إسرائيل', 'country_code' => 'IL', 'economic_power' => 0.34],
            ['country_status' => 1, 'country_name' => 'بلجيكا', 'country_code' => 'BE', 'economic_power' => 0.53],
            ['country_status' => 1, 'country_name' => 'النمسا', 'country_code' => 'AT', 'economic_power' => 0.45],
            ['country_status' => 1, 'country_name' => 'اليونان', 'country_code' => 'GR', 'economic_power' => 0.21],
            ['country_status' => 1, 'country_name' => 'المملكة العربية السعودية', 'country_code' => 'SA', 'economic_power' => 0.78],
            ['country_status' => 1, 'country_name' => 'الإمارات العربية المتحدة', 'country_code' => 'AE', 'economic_power' => 0.40],
            ['country_status' => 1, 'country_name' => 'تركمانستان', 'country_code' => 'TM', 'economic_power' => 0.04],
            ['country_status' => 1, 'country_name' => 'أذربيجان', 'country_code' => 'AZ', 'economic_power' => 0.05],
            ['country_status' => 1, 'country_name' => 'الأردن', 'country_code' => 'JO', 'economic_power' => 0.04],
            ['country_status' => 1, 'country_name' => 'لبنان', 'country_code' => 'LB', 'economic_power' => 0.04],
            ['country_status' => 1, 'country_name' => 'تونس', 'country_code' => 'TN', 'economic_power' => 0.04],
            ['country_status' => 1, 'country_name' => 'قطر', 'country_code' => 'QA', 'economic_power' => 0.18],
            ['country_status' => 1, 'country_name' => 'البحرين', 'country_code' => 'BH', 'economic_power' => 0.04],
            ['country_status' => 1, 'country_name' => 'سلطنة عمان', 'country_code' => 'OM', 'economic_power' => 0.04],
            ['country_status' => 1, 'country_name' => 'الكويت', 'country_code' => 'KW', 'economic_power' => 0.12],
            ['country_status' => 1, 'country_name' => 'ليبيا', 'country_code' => 'LY', 'economic_power' => 0.07],
            ['country_status' => 1, 'country_name' => 'المغرب', 'country_code' => 'MA', 'economic_power' => 0.12],
            // Add more countries here...
        ];


    // Remove the 'economic_power' field before inserting into the database.
        foreach ($countries as &$country) {
            unset($country['economic_power']);
            Country::create($country);
        }
    }
}
