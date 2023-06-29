<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ToppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('toppings')->insert([
            [
                'topping' => 'Chessy',
                'created_at' => Carbon::now()
            ],
            [
                'topping' => 'Boba',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
