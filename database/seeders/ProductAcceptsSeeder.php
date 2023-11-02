<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\ProductAccept;
use App\Models\ProductStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductAcceptsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productAccepts = [
            ['id' => 1, 'value' => 'بإنتظار الموافقة'],
            ['id' => 2, 'value' => 'تم الموافقة'],
            ['id' => 3, 'value' => 'تم الرفض'],
        ];
        foreach ($productAccepts as $status) {
            ProductAccept::create($status);
        }
    }
}
