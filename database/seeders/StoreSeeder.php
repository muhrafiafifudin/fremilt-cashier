<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            [
                'name' => 'Thai Tea',
                'email' => 'thaitea@gmail.com',
                'phone_number' => '089123123123',
                'address' => 'Jl. Sukamaju',
                'created_at' => Carbon::now()
            ]
        ]);
    }
}
