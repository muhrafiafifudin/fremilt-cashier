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
                'name' => 'Coffee',
                'slug' => 'coffee',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Non Coffee',
                'slug' => 'non-coffee',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
