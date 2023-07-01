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
                'code' => 'P001',
                'product' => 'Black Coffee',
                'image' => 'black-coffee.png',
                'category_id' => 1,
                'price' => 6000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'code' => 'P002',
                'product' => 'Kopi Tarik Caramel',
                'image' => 'kopi-tarik-caramel.png',
                'category_id' => 1,
                'price' => 12000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'code' => 'P003',
                'product' => 'Kopi Tarik',
                'image' => 'kopi-tarik.png',
                'category_id' => 1,
                'price' => 10000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'code' => 'P004',
                'product' => 'Kopi Tarik Hazelnut',
                'image' => 'kopi-tarik-hazelnut.png',
                'category_id' => 1,
                'price' => 12000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'code' => 'P005',
                'product' => 'Coffee Latte',
                'image' => 'coffee-latte.png',
                'category_id' => 1,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'code' => 'P006',
                'product' => 'Choco Banana',
                'image' => 'choco-banana.png',
                'category_id' => 2,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'code' => 'P007',
                'product' => 'Boba Brown Sugar',
                'image' => 'boba-brown-sugar.png',
                'category_id' => 2,
                'price' => 13000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'code' => 'P008',
                'product' => 'Thai Cocoa',
                'image' => 'thai-cocoa.png',
                'category_id' => 2,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'code' => 'P009',
                'product' => 'Cookies Oreo',
                'image' => 'cookies-oreo.png',
                'category_id' => 2,
                'price' => 13000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'code' => 'P010',
                'product' => 'Black Choco',
                'image' => 'black-choco.png',
                'category_id' => 2,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'code' => 'P011',
                'product' => 'Red Velvet',
                'image' => 'red-velvet.png',
                'category_id' => 2,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'code' => 'P012',
                'product' => 'Taro',
                'image' => 'taro.png',
                'category_id' => 2,
                'price' => 11000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'code' => 'P013',
                'product' => 'Black Tea',
                'image' => 'black-tea.png',
                'category_id' => 2,
                'price' => 6000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'code' => 'P014',
                'product' => 'Original Thai Tea',
                'image' => 'original-thai-tea.png',
                'category_id' => 2,
                'price' => 10000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'code' => 'P015',
                'product' => 'Thai Greentea',
                'image' => 'thai-greentea.png',
                'category_id' => 2,
                'price' => 10000,
                'description' => '',
                'stock' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'code' => 'P016',
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
