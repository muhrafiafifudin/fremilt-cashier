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
                'name' => 'Black Coffee',
                'image' => 'black-coffee.jpg',
                'categories_id' => 1,
                'price' => 6000,
                'description' => '',
                'slug' => 'black-coffee',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Kopi Tarik Caramel',
                'image' => 'kopi-tarik-caramel.jpg',
                'categories_id' => 1,
                'price' => 12000,
                'description' => '',
                'slug' => 'kopi-tarik-caramel',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Kopi Tarik',
                'image' => 'kopi-tarik.jpg',
                'categories_id' => 1,
                'price' => 10000,
                'description' => '',
                'slug' => 'kopi-tarik',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Kopi Tarik Hazelnut',
                'image' => 'kopi-tarik-hazelnut.jpg',
                'categories_id' => 1,
                'price' => 12000,
                'description' => '',
                'slug' => 'kopi-tarik-hazelnut',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Coffee Latte',
                'image' => 'coffe-latte.jpg',
                'categories_id' => 1,
                'price' => 11000,
                'description' => '',
                'slug' => 'coffe-latte',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Choco Banana',
                'image' => 'choco-banana.jpg',
                'categories_id' => 2,
                'price' => 11000,
                'description' => '',
                'slug' => 'choco-banana',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Boba Brown Sugar',
                'image' => 'boba-brown-sugar.jpg',
                'categories_id' => 2,
                'price' => 13000,
                'description' => '',
                'slug' => 'boba-brown-sugar',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Thai Cocoa',
                'image' => 'thai-cocoa.jpg',
                'categories_id' => 2,
                'price' => 11000,
                'description' => '',
                'slug' => 'thai-cocoa',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Cookies Oreo',
                'image' => 'cookies-oreo.jpg',
                'categories_id' => 2,
                'price' => 13000,
                'description' => '',
                'slug' => 'cookies-oreo',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Black Choco',
                'image' => 'black-choco.jpg',
                'categories_id' => 2,
                'price' => 11000,
                'description' => '',
                'slug' => 'black-choco',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Red Velvet',
                'image' => 'red-velvet.jpg',
                'categories_id' => 2,
                'price' => 11000,
                'description' => '',
                'slug' => 'red-velvet',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Taro',
                'image' => 'taro.jpg',
                'categories_id' => 2,
                'price' => 11000,
                'description' => '',
                'slug' => 'taro',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Black Tea',
                'image' => 'black-tea.jpg',
                'categories_id' => 2,
                'price' => 6000,
                'description' => '',
                'slug' => 'black-tea',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Original Thai Tea',
                'image' => 'original-thai-tea.jpg',
                'categories_id' => 2,
                'price' => 10000,
                'description' => '',
                'slug' => 'original-thai-tea',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Thai Greentea',
                'image' => 'thai-greentea.jpg',
                'categories_id' => 2,
                'price' => 10000,
                'description' => '',
                'slug' => 'thai-greentea',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Pure Greentea',
                'image' => 'pure-greentea.jpg',
                'categories_id' => 2,
                'price' => 6000,
                'description' => '',
                'slug' => 'pure-greentea',
                'qty' => 10,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
