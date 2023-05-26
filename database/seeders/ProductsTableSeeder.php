<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use \App\Models\User;
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

        $user =User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@email.com'
        ]);

        Product::insert([
            [
                'name' => 'Stella Artois',
                'slug' => 'stella-artois',
                'brand' => 'Stella Artois',
                'country' => 'Belgia',
                'price' => 2,
                'size' => 0.5,
                'alcohol_vlm' => 5,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
                'image' => 'covers/cover4.png',
                'user_id' => $user->id
            ],
            [
                'name' => 'Budweiser',
                'slug' => 'budweiser',
                'brand' => 'Budweiser',
                'country' => 'USA',
                'price' => 2,
                'size' => 0.5,
                'alcohol_vlm' => 5,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
                'image' => 'covers/cover5.png',
                'user_id' => $user->id
            ],
            [
                'name' => 'Guinness Draught',
                'slug' => 'guinness-draught',
                'brand' => 'Guinness',
                'country' => 'Ireland',
                'price' => 2.6,
                'size' => 0.5,
                'alcohol_vlm' => 5,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
                'image' => 'covers/cover2.png',
                'user_id' => $user->id
            ],
            [
                'name' => 'Founders KBS, Bourbon Barrel-Aged Imperial Stout Beer',
                'slug' => 'founders-kbs-bourbon-barrel-aged-imperial-stout-beer',
                'brand' => 'Founders KBS',
                'country' => 'USA',
                'price' => 4,
                'size' => 0.5,
                'alcohol_vlm' => 12,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
                'image' => 'covers/cover3.png',
                'user_id' => $user->id
            ],
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
                'updated_at' => $now,
                'image' => 'covers/cover1.png',
                'user_id' => $user->id
            ],
            [
                'name' => 'La Crema Williamette Valley Pinot Noir',
                'slug' => 'la-crema-williamette-valley-pinot-noir',
                'brand' => 'La Crema',
                'country' => 'France',
                'price' => 29.0,
                'size' => 0.75,
                'alcohol_vlm' => 14,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
                'image' => 'covers/cover6.jpg',
                'user_id' => $user->id
            ],
            [
                'name' => 'Santa Margherita Pinot Grigio DOC',
                'slug' => 'santa-margherita-pinot-grigio-doc',
                'brand' => 'Santa Margherita',
                'country' => 'Italy',
                'price' => 19.0,
                'size' => 0.75,
                'alcohol_vlm' => 14,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
                'image' => 'covers/cover7.png',
                'user_id' => $user->id
            ],
            [
                'name' => 'Ruffino Lumina DOC Pinot Grigio',
                'slug' => 'ruffino-lumina-doc-pinot-grigio',
                'brand' => 'Ruffino',
                'country' => 'Italy',
                'price' => 19.0,
                'size' => 0.75,
                'alcohol_vlm' => 14,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
                'image' => 'covers/cover8.jpg',
                'user_id' => $user->id
            ],
            [
                'name' => 'GREY GOOSE Vodka',
                'slug' => 'grey-goose-vodka',
                'brand' => 'GREY GOOSE',
                'country' => 'Finland',
                'price' => 9.99,
                'size' => 1,
                'alcohol_vlm' => 40,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
                'image' => 'covers/cover9.jpg',
                'user_id' => $user->id
            ],
            [
                'name' => 'Absolut Original Vodka',
                'slug' => 'absolut-original-vodka',
                'brand' => 'Absolut',
                'country' => 'Sweden',
                'price' => 9.99,
                'size' => 1,
                'alcohol_vlm' => 40,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
                'image' => 'covers/cover10.jpg',
                'user_id' => $user->id
            ],
            [
                'name' => 'Bulleit Bourbon',
                'slug' => 'bulleit-bourbon',
                'brand' => 'Bulleit',
                'country' => 'USA',
                'price' => 39.99,
                'size' => 1,
                'alcohol_vlm' => 40,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
                'image' => 'covers/cover11.jpg',
                'user_id' => $user->id
            ],
            [
                'name' => 'Jim Beam Bourbon Whiskey',
                'slug' => 'jim-beam-bourbon-whiskey',
                'brand' => 'Jim Beam',
                'country' => 'USA',
                'price' => 39.99,
                'size' => 1,
                'alcohol_vlm' => 40,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
                'image' => 'covers/cover12.jpg',
                'user_id' => $user->id
            ],
            [
                'name' => 'Cido Multivitamin',
                'slug' => 'cido-multivitamin',
                'brand' => 'Cido',
                'country' => 'Latvia',
                'price' => 0.99,
                'size' => 1,
                'alcohol_vlm' => 0,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
                'image' => 'covers/cover13.jpg',
                'user_id' => $user->id
            ],
            [
                'name' => 'Tymbark Apple Cherry',
                'slug' => 'tymbark-apple-cherry',
                'brand' => 'Tymbark',
                'country' => 'Poland',
                'price' => 1.99,
                'size' => 2,
                'alcohol_vlm' => 0,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
                'image' => 'covers/cover14.jpg',
                'user_id' => $user->id
            ],
            [
                'name' => 'Schweppes Ginger Ale',
                'slug' => 'schweppes-ginger-ale',
                'brand' => 'Schweppes',
                'country' => 'Poland',
                'price' => 1.99,
                'size' => 1,
                'alcohol_vlm' => 0,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
                'image' => 'covers/cover15.jpg',
                'user_id' => $user->id
            ],        
        ]);
    }
}
