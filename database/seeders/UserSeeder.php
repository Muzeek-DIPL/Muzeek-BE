<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->count() == 0) {
            DB::table('users')->insert([
                [
                    'id' => 1,
                    'username' => 'johndoe',
                    'email' => 'johndoe@gmail.com',
                    'password' => Hash::make('johndoe123'),
                    'full_name' => 'John Doe',
                    'phone' => '082211339988',
                    'about' => '',
                    'location' => 'Bandung, Indonesia',
                    'img_link' => 'https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f',
                ],
                [
                    'id' => 2,
                    'username' => 'janedoe',
                    'email' => 'janedoe@gmail.com',
                    'password' => Hash::make('janedoe123'),
                    'full_name' => 'Jane Doe',
                    'phone' => '081133009944',
                    'about' => 'A musician',
                    'location' => 'Jakarta, Indonesia',
                    'img_link' => 'https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/luwadlin-bosman-pD1KUHCZ9Yc-unsplash.jpg?alt=media&token=6b131ed9-81f2-4ecc-b881-75e966dcf52d',
                ],
            ]);
        }

    }
}