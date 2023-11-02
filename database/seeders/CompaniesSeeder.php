<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            ['company_name' => 'كنتاكي', 'country_id' => '3', ],
            ['company_name' => 'ماكدونالدز', 'country_id' => '3',],
            ['company_name' => 'ستاربكس', 'country_id' => '3',],
        ];

        foreach ($companies as $row) {
            Company::create($row);
        }
    }
}
