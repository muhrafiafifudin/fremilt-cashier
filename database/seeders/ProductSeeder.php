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
                'name' => 'Black Tea',
                'image' => 'black-tea.jpg',
                'categories_id' => 2,
                'price' => 12000,
                'description' => 'Ini Black Tea',
                'slug' => 'black-tea',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Original Thai Tea',
                'image' => 'original-thai-tea.jpg',
                'categories_id' => 2,
                'price' => 12000,
                'description' => 'Ini Original Thai Tea',
                'slug' => 'original-thai-tea',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Black Coffee',
                'image' => 'black-coffee.jpg',
                'categories_id' => 2,
                'price' => 12000,
                'description' => 'Ini Black Coffee',
                'slug' => 'black-coffee',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Coffee Latte',
                'image' => 'coffe-latte.jpg',
                'categories_id' => 2,
                'price' => 12000,
                'description' => 'Ini Coffee Latte',
                'slug' => 'coffe-latte',
                'qty' => 10,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
