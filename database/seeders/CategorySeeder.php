<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'category' => 'Coffee',
                'stock' => 5,
                'created_at' => Carbon::now()
            ],
            [
                'category' => 'Non Coffee',
                'stock' => 11,
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
