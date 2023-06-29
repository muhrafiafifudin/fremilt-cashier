<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Annisa',
                'email' => 'annisa@gmail.com',
            ],
            [
                'name' => 'Rama',
                'email' => 'rama@gmail.com',
            ],
            [
                'name' => 'Farhan',
                'email' => 'farhan@gmail.com',
            ],
            [
                'name' => 'Citra',
                'email' => 'citra@gmail.com',
            ],
            [
                'name' => 'Dafa',
                'email' => 'dafa@gmail.com',
            ],
        ];

        foreach ($users as $user) {
            $user = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'created_at' => Carbon::now()
            ]);

            $user->assignRole('user');
        }

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
            'created_at' => Carbon::now()
        ]);

        $admin->assignRole('admin');
    }
}
