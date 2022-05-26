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
                [
                    'id' => 3,
                    'username' => 'gmcquode0',
                    'email' => 'gmcquode0@addtoany.com',
                    'password' => Hash::make('Ud523bpXFtNA'),
                    'full_name' => 'Germana McQuode',
                    'phone' => '5894605646',
                    'about' => 'Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique.',
                    'location' => 'Nangewer',
                    'img_link' => 'https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f',
                ],
                [
                    'id' => 4,
                    'username' => 'acloutt1',
                    'email' => 'acloutt1@reddit.com',
                    'password' => Hash::make('ayUXZ67W'),
                    'full_name' => 'Anson Cloutt',
                    'phone' => '7384665800',
                    'about' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.',
                    'location' => 'Rumenka',
                    'img_link' => 'https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f',
                ],
                [
                    'id' => 5,
                    'username' => 'piacovides2',
                    'email' => 'piacovides2@hhs.gov',
                    'password' => Hash::make('GRu4VYU'),
                    'full_name' => 'Padriac Iacovides',
                    'phone' => '2817196164',
                    'about' => 'Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.',
                    'location' => 'Nàng Mau',
                    'img_link' => 'https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f',
                ],
                [
                    'id' => 6,
                    'username' => 'ltruss3',
                    'email' => 'ltruss3@skyrock.com',
                    'password' => Hash::make('sOkVfl'),
                    'full_name' => 'Lyndsey Truss',
                    'phone' => '7028212376',
                    'about' => 'Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque.',
                    'location' => 'Reno',
                    'img_link' => 'https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f',
                ],
                [
                    'id' => 7,
                    'username' => 'cingry4',
                    'email' => 'cingry4@tamu.edu',
                    'password' => Hash::make('1nGFqgQUh'),
                    'full_name' => 'Colene Ingry',
                    'phone' => '4296155167',
                    'about' => 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit.',
                    'location' => 'Cañasgordas',
                    'img_link' => 'https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f',
                ],
                [
                    'id' => 8,
                    'username' => 'lranvoise5',
                    'email' => 'lranvoise5@arizona.edu',
                    'password' => Hash::make('pqphPVk'),
                    'full_name' => 'Larissa Ranvoise',
                    'phone' => '8609878306',
                    'about' => 'Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.',
                    'location' => 'Kananya',
                    'img_link' => 'https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f',
                ],
                [
                    'id' => 9,
                    'username' => 'dbebbell6',
                    'email' => 'dbebbell6@ted.com',
                    'password' => Hash::make('ngTEk2O'),
                    'full_name' => 'Dorisa Bebbell',
                    'phone' => '6579017818',
                    'about' => 'Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl.',
                    'location' => 'Porvenir',
                    'img_link' => 'https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f',
                ],
                [
                    'id' => 10,
                    'username' => 'lsallings7',
                    'email' => 'lsallings7@nationalgeographic.com',
                    'password' => Hash::make('NpSk3B'),
                    'full_name' => 'Linnet Sallings',
                    'phone' => '3606226397',
                    'about' => 'Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna.',
                    'location' => 'Milwaukee',
                    'img_link' => 'https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f',
                ],
                [
                    'id' => 11,
                    'username' => 'dogmcquaid',
                    'email' => 'dogmcquaid@nationalgeographic.com',
                    'password' => Hash::make('NpSk3B'),
                    'full_name' => 'dogmcquaid',
                    'phone' => '3606226397',
                    'about' => 'mualik erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna.',
                    'location' => 'Merauke',
                    'img_link' => 'https://firebasestorage.googleapis.com/v0/b/museek-d935c.appspot.com/o/SaulS5.jpg?alt=media&token=f823a6a3-dec2-4cea-a7e1-dc55436c236f',
                ],
            ]);
        }
    }
}
