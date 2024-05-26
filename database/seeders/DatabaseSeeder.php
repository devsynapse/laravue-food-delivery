<?php

namespace Database\Seeders;

use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $description = "Savor the perfection of our classic burger: juicy beef patty, melted cheese, crisp lettuce, and tangy pickles, all nestled between soft buns. It's a flavor explosion in every bite!";

        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'Cheeseburger',
                'img_url' => 'cheese-burger.jpg',
                'description' => $description,
                'price' => 9.00,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 2,
                'name' => 'Chiken burger',
                'img_url' => 'chicken-burger.jpg',
                'description' => $description,
                'price' => 8.50,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 3,
                'name' => 'Fish burger',
                'img_url' => 'fish-burger.jpg',
                'description' => $description,
                'price' => 11.00,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 4,
                'name' => 'Double cheeseburger',
                'img_url' => 'double-burger.jpg',
                'description' => $description,
                'price' => 13.00,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 5,
                'name' => 'Plant-based burger',
                'img_url' => 'plant-burger.jpg',
                'description' => $description,
                'price' => 9.00,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 6,
                'name' => 'Bacon burger',
                'img_url' => 'bacon-burger.jpg',
                'description' => $description,
                'price' => 10.00,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 7,
                'name' => 'Egg burger',
                'img_url' => 'egg-burger.jpg',
                'description' => $description,
                'price' => 8.50,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'id' => 8,
                'name' => 'Beef burger',
                'img_url' => 'beef-burger.jpg',
                'description' => $description,
                'price' => 7.00,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
