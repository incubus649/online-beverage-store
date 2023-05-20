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
                'name' => 'Chateau Ausone 2010', 
                'slug' => 'chateau-ausone-2010',
                'brand' => 'Chateau', 
                'country' => 'France',
                'price' => 1999.0,
                'size' => 0.75,
                'alcohol_vlm' => 14.5,
                'stock' => 1,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Bogle Merlot', 
                'slug' => 'bogle-merlot',
                'brand' => 'Bogle', 
                'country' => 'USA',
                'price' => 10.4,
                'size' => 0.75,
                'alcohol_vlm' => 14,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Dezzani Moscato Dasti Docg', 
                'slug' => 'dezzani-moscato-dasti-docg',
                'brand' => 'Dezzani', 
                'country' => 'Italy',
                'price' => 11.99,
                'size' => 0.75,
                'alcohol_vlm' => 14,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'William Hill Chardonnay Napa', 
                'slug' => 'william-hill-chardonnay-napa',
                'brand' => 'William Hill', 
                'country' => 'USA',
                'price' => 22.9,
                'size' => 0.75,
                'alcohol_vlm' => 14,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Bellafina Pink Moscato', 
                'slug' => 'bellafina-pink-moscato',
                'brand' => 'Bellafina', 
                'country' => 'Italy',
                'price' => 11.99,
                'size' => 0.75,
                'alcohol_vlm' => 14,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Chook Sparkling Shiraz', 
                'slug' => 'chook-sparkling-shiraz',
                'brand' => 'The Black Chook', 
                'country' => 'Australia',
                'price' => 18.5,
                'size' => 0.75,
                'alcohol_vlm' => 14.1,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Karbach Weekend Warrior Ale', 
                'slug' => 'karbach-weekend-warrior-ale',
                'brand' => 'Karbach', 
                'country' => 'Australia',
                'price' => 1.2,
                'size' => 0.33,
                'alcohol_vlm' => 5.5,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Eight Elite Lager', 
                'slug' => 'eight-elite-lager',
                'brand' => 'Eight Elite', 
                'country' => 'USA',
                'price' => 2.9,
                'size' => 0.5,
                'alcohol_vlm' => 5.5,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Brooklyn Stonewall Inn', 
                'slug' => 'brooklyn-stonewall-inn',
                'brand' => 'Brooklyn', 
                'country' => 'USA',
                'price' => 1.3,
                'size' => 0.33,
                'alcohol_vlm' => 5.5,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Fullers London Porter', 
                'slug' => 'fullers-london-porter',
                'brand' => 'Fullers', 
                'country' => 'UK',
                'price' => 3,
                'size' => 0.5,
                'alcohol_vlm' => 7,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Real Ale Commissar Imperial Stout', 
                'slug' => 'real-ale-commissar-imperial-stout',
                'brand' => 'Real', 
                'country' => 'USA',
                'price' => 5.49,
                'size' => 0.5,
                'alcohol_vlm' => 9.8,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'La Vie Eternal Vodka', 
                'slug' => 'la-vie-eternal-vodka',
                'brand' => 'La Vie', 
                'country' => 'France',
                'price' => 38.99,
                'size' => 1.75,
                'alcohol_vlm' => 39.8,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Kelsey Creek Single Barrel Bourbon', 
                'slug' => 'kelsey-creek-single-barrel-bourbon',
                'brand' => 'Kelsey Creek', 
                'country' => 'USA',
                'price' => 44.99,
                'size' => 0.75,
                'alcohol_vlm' => 40,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Asombroso El Platino Blanco Tequila', 
                'slug' => 'asombroso-el-platino-blanco-tequila',
                'brand' => 'Asombroso', 
                'country' => 'Mexico',
                'price' => 53.99,
                'size' => 0.75,
                'alcohol_vlm' => 40,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Sailor Jerrys Spiced Rum', 
                'slug' => 'sailor-jerrys-spiced-rum',
                'brand' => 'Sailor Jerry', 
                'country' => 'USA',
                'price' => 8.99,
                'size' => 0.375,
                'alcohol_vlm' => 40,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Dripping Springs Gin Traditional Eureka', 
                'slug' => 'dripping-springs-gin-traditional-eureka',
                'brand' => 'Asombroso', 
                'country' => 'USA',
                'price' => 25.99,
                'size' => 0.75,
                'alcohol_vlm' => 40,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Cido Apple Nectar', 
                'slug' => 'cido-apple-nectar',
                'brand' => 'Cido', 
                'country' => 'Latvia',
                'price' => 1.99,
                'size' => 2,
                'alcohol_vlm' => 0,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Orange Fanta', 
                'slug' => 'orange-fanta',
                'brand' => 'Coca Cola', 
                'country' => 'Poland',
                'price' => 2.2,
                'size' => 2,
                'alcohol_vlm' => 0,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
            [
                'name' => 'Schweppes Tonic Diet', 
                'slug' => 'schweppes-tonic-diet',
                'brand' => 'Schweppes', 
                'country' => 'Switzerland',
                'price' => 1.9,
                'size' => 1.5,
                'alcohol_vlm' => 0,
                'stock' => 10,
                'created_at' => $now, 
                'updated_at' => $now
            ],
        ]);
    }
}
