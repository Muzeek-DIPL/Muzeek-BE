<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('musicians')->count() == 0) {
            DB::table('musicians')->insert([
                [
                    'id' => 1,
                    'user_id' => 1,
                    'instrument' => 'Gitar',
                ],
                [
                    'id' => 2,
                    'user_id' => 2,
                    'instrument' => 'Piano',
                ],
            ]);
        }

    }
}