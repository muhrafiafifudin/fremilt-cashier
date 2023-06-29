<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'product' => 'Black Coffee',
                'image' => 'black-coffee.png',
                'category_id' => 1,
                'price' => 6000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Kopi Tarik Caramel',
                'image' => 'kopi-tarik-caramel.png',
                'category_id' => 1,
                'price' => 12000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Kopi Tarik',
                'image' => 'kopi-tarik.png',
                'category_id' => 1,
                'price' => 10000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Kopi Tarik Hazelnut',
                'image' => 'kopi-tarik-hazelnut.png',
                'category_id' => 1,
                'price' => 12000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Coffee Latte',
                'image' => 'coffee-latte.png',
                'category_id' => 1,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Choco Banana',
                'image' => 'choco-banana.png',
                'category_id' => 2,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Boba Brown Sugar',
                'image' => 'boba-brown-sugar.png',
                'category_id' => 2,
                'price' => 13000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Thai Cocoa',
                'image' => 'thai-cocoa.png',
                'category_id' => 2,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Cookies Oreo',
                'image' => 'cookies-oreo.png',
                'category_id' => 2,
                'price' => 13000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Black Choco',
                'image' => 'black-choco.png',
                'category_id' => 2,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Red Velvet',
                'image' => 'red-velvet.png',
                'category_id' => 2,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Taro',
                'image' => 'taro.png',
                'category_id' => 2,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Black Tea',
                'image' => 'black-tea.png',
                'category_id' => 2,
                'price' => 6000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Original Thai Tea',
                'image' => 'original-thai-tea.png',
                'category_id' => 2,
                'price' => 10000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Thai Greentea',
                'image' => 'thai-greentea.png',
                'category_id' => 2,
                'price' => 10000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Pure Greentea',
                'image' => 'pure-greentea.png',
                'category_id' => 2,
                'price' => 6000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
