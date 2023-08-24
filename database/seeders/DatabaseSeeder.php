<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const PRODUCT_COUNT = 100;
    const PRODUCT_PRICE_COUNT = 10;
    const PRODUCT_PRICE_MIN_PRICE = 1;
    const PRODUCT_PRICE_MAX_PRICE = 500000;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(Product::all()->count() < self::PRODUCT_COUNT) {
            Product::factory(self::PRODUCT_COUNT)->create()
                ->each(function ($product) {
                    ProductPrice::create([
                        'product_id' => $product->id,
                        'price' => fake()->numberBetween(self::PRODUCT_PRICE_MIN_PRICE, self::PRODUCT_PRICE_MAX_PRICE),
                    ]);
                });
        }
//        $this->call([
//            ProductSeeder::class,
//        ]);

        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
