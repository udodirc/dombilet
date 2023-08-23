<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    const ITEMS_COUNT = 10000;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(Product::all()->count() < self::ITEMS_COUNT)
        {
            Product::factory(self::ITEMS_COUNT)->create();
        }
    }
}
