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
                'image' => 'black-coffee.jpg',
                'category_id' => 1,
                'price' => 6000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Kopi Tarik Caramel',
                'image' => 'kopi-tarik-caramel.jpg',
                'category_id' => 1,
                'price' => 12000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Kopi Tarik',
                'image' => 'kopi-tarik.jpg',
                'category_id' => 1,
                'price' => 10000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Kopi Tarik Hazelnut',
                'image' => 'kopi-tarik-hazelnut.jpg',
                'category_id' => 1,
                'price' => 12000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Coffee Latte',
                'image' => 'coffe-latte.jpg',
                'category_id' => 1,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Choco Banana',
                'image' => 'choco-banana.jpg',
                'category_id' => 2,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Boba Brown Sugar',
                'image' => 'boba-brown-sugar.jpg',
                'category_id' => 2,
                'price' => 13000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Thai Cocoa',
                'image' => 'thai-cocoa.jpg',
                'category_id' => 2,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Cookies Oreo',
                'image' => 'cookies-oreo.jpg',
                'category_id' => 2,
                'price' => 13000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Black Choco',
                'image' => 'black-choco.jpg',
                'category_id' => 2,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Red Velvet',
                'image' => 'red-velvet.jpg',
                'category_id' => 2,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Taro',
                'image' => 'taro.jpg',
                'category_id' => 2,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Black Tea',
                'image' => 'black-tea.jpg',
                'category_id' => 2,
                'price' => 6000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Original Thai Tea',
                'image' => 'original-thai-tea.jpg',
                'category_id' => 2,
                'price' => 10000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Thai Greentea',
                'image' => 'thai-greentea.jpg',
                'category_id' => 2,
                'price' => 10000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'product' => 'Pure Greentea',
                'image' => 'pure-greentea.jpg',
                'category_id' => 2,
                'price' => 6000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
