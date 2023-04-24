<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now()->toDateTimeString();

        Product::insert([
            [
                'name' => 'Red Wine 1', 
                'slug' => 'red-wine-1',
                'brand' => 'RedWine', 
                'country' => 'France',
                'tags' => 'sweet', 
                'price' => 19.99,
                'size' => 0.7,
                'alcohol_vlm' => 14,
                'stock' => 14,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Red Wine 2', 
                'slug' => 'red-wine-2',
                'brand' => 'RedWine', 
                'country' => 'France', 
                'tags' => 'sweet', 
                'price' => 22.99,
                'size' => 0.7,
                'alcohol_vlm' => 14,
                'stock' => 12,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'White Wine 1', 
                'slug' => 'white-wine-1',
                'brand' => 'WhiteWine', 
                'country' => 'Italy', 
                'tags' => 'sour', 
                'price' => 29.99,
                'size' => 0.7,
                'alcohol_vlm' => 14,
                'stock' => 24,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'White Wine 2', 
                'slug' => 'white-wine-2',
                'brand' => 'WhiteWine', 
                'country' => 'Italy', 
                'tags' => 'sour', 
                'price' => 24.99,
                'size' => 0.7,
                'alcohol_vlm' => 14,
                'stock' => 22,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Vodka 1', 
                'slug' => 'vodka-1',
                'brand' => 'Cyberia', 
                'country' => 'Russia', 
                'tags' => 'strong', 
                'price' => 9.99,
                'size' => 1,
                'alcohol_vlm' => 40,
                'stock' => 4,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Vodka 2', 
                'slug' => 'vodka-2',
                'brand' => 'Cyberia', 
                'country' => 'Russia', 
                'tags' => 'strong', 
                'price' => 12.99,
                'size' => 1,
                'alcohol_vlm' => 40,
                'stock' => 2,
                'created_at' => $now, 
                'updated_at' => $now
            ],
        ]);
    }
}
