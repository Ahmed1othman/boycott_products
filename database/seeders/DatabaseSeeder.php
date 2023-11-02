<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountriesSeeder::class,
            CategoriesSeeder::class,
            ProductAcceptsSeeder::class,
            ProductStatusSeeder::class,
            CompaniesSeeder::class,
            ProductsSeeder::class,
        ]);
    }
}
