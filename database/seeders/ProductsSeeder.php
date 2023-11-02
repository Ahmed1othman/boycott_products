<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['product_name' => 'كنتاكي', 'company_id' => '1', 'category_id'=>4,'product_status_id' => '3', 'product_accept_id' => '2',],
            ['product_name' => 'ماكدونالدز', 'company_id' => '2', 'category_id'=>4, 'product_status_id' => '3', 'product_accept_id' => '2'],
            ['product_name' => 'ستاربكس', 'company_id' => '3', 'category_id'=>4, 'product_status_id' => '3', 'product_accept_id' => '2']
        ];

        foreach ($products as $row) {
            Product::create($row);
        }
    }
}
