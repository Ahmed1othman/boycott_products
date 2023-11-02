<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\ProductStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productStatus = [
            ['id' => 1, 'status_name' => 'غير معلوم حتي الان'],
            ['id' => 2, 'status_name' => 'لا يدعم'],
            ['id' => 3, 'status_name' => 'منتج داعم للقتلة'],
        ];
        foreach ($productStatus as $status) {
            ProductStatus::create($status);
        }
    }
}
