<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ingredients')->insert([
            [
                'ingredient' => 'Carnation',
                'stock' => 5,
                'created_at' => Carbon::now()
            ],
            [
                'ingredient' => 'Bubuk Coklat',
                'stock' => 5,
                'created_at' => Carbon::now()
            ],
            [
                'ingredient' => 'Bubuk Coffe',
                'stock' => 5,
                'created_at' => Carbon::now()
            ],
            [
                'ingredient' => 'Cremer',
                'stock' => 5,
                'created_at' => Carbon::now()
            ],
            [
                'ingredient' => 'Air Mendidih',
                'stock' => 5,
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
