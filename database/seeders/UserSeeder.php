<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ([
            $user = new User(),
            $user -> name = "Admin",
            $user -> email = "admin@gmail.com",
            $user -> role = "Admin",
            $user -> password = bcrypt('1'),
            // $user -> total_progress = '0',
            // $user -> foto = "",
            // $user -> no_hp = '0895923847629',
            $user -> save()
            ]);
        // ([
        //     $user = new User(),
        //     $user -> name = "Customer",
        //     $user -> email = "customer@gmail.com",
        //     $user -> role = 'Customer',
        //     $user -> password = bcrypt('2'),
        //     // $user -> total_progress = '0',
        //     // $user -> foto = "",
        //     // $user -> no_hp = '089611029347',
        //     $user -> save(),
        //     ]);
    }
}
