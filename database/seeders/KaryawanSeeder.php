<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('karyawan')->insert(
            [
                [
                    'foto' => 'asstes/img/bruce-mars.jpg',
                    'nama' => 'Zaidan',
                    'email' => 'zaidan@gmail.com',
                    'no_hp' => '085646449670',
                    'jabatan' => 'CEO'
                ]
            ]
        );
    }
}
