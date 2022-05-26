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
                [
                    'id' => 3,
                    'user_id' => 3,
                    'instrument' => 'Vokal',
                ],
                [
                    'id' => 4,
                    'user_id' => 4,
                    'instrument' => 'Bass',
                ],
                [
                    'id' => 5,
                    'user_id' => 5,
                    'instrument' => 'Other',
                ],
                [
                    'id' => 6,
                    'user_id' => 6,
                    'instrument' => 'Perkusi',
                ],
                [
                    'id' => 7,
                    'user_id' => 7,
                    'instrument' => 'Strings',
                ],
                [
                    'id' => 8,
                    'user_id' => 8,
                    'instrument' => 'Vokal',
                ],
                [
                    'id' => 9,
                    'user_id' => 9,
                    'instrument' => 'Vokal',
                ],
                [
                    'id' => 10,
                    'user_id' => 10,
                    'instrument' => 'Vokal',
                ],
            ]);
        }
    }
}
