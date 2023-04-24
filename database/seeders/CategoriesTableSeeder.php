<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Beer', 'parent_id' => null, 'slug' => 'beer', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Wine', 'parent_id' => null, 'slug' => 'wine', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Spirits', 'parent_id' => null, 'slug' => 'spirits', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Extras', 'parent_id' => null, 'slug' => 'extras', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Red Wine', 'parent_id' => 2, 'slug' => 'red_wine', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'White Wine', 'parent_id' => 2, 'slug' => 'white_wine', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Vodka', 'parent_id' => 3, 'slug' => 'vodka', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
