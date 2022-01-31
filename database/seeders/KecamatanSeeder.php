<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('kecamatans')->insert([
            [
                'name'      => 'Tanah Abang',
                'kota_id'   => 1
            ],
            [
                'name'      => 'Kemayoran',
                'kota_id'   => 1
            ],
            [
                'name'      => 'Kebayoran Baru',
                'kota_id'   => 2
            ],
            [
                'name'      => 'Kebayoran Lama',
                'kota_id'   => 2
            ],
            [
                'name'      => 'Buahbatu',
                'kota_id'   => 3
            ],
            [
                'name'      => 'Gedebage',
                'kota_id'   => 3
            ],
            [
                'name'      => 'Cimahi Selatan',
                'kota_id'   => 4
            ],
            [
                'name'      => 'Cimahi Tengah',
                'kota_id'   => 4
            ],
            [
                'name'      => 'Cimahi Utara',
                'kota_id'   => 4
            ],
            [
                'name'      => 'Tugu',
                'kota_id'   => 5
            ],
            [
                'name'      => 'Banyumanik',
                'kota_id'   => 5
            ],
            [
                'name'      => 'Banjarnegara',
                'kota_id'   => 6
            ],
            [
                'name'      => 'Purwonegoro',
                'kota_id'   => 6
            ],
            [
                'name'      => 'Banyuwangi',
                'kota_id'   => 7
            ],
            [
                'name'      => 'Bangorejo',
                'kota_id'   => 7
            ],
            [
                'name'      => 'Tegalsari',
                'kota_id'   => 8
            ],
            [
                'name'      => 'Sukolilo',
                'kota_id'   => 8
            ],
            [
                'name'      => 'Bantul',
                'kota_id'   => 9
            ],
            [
                'name'      => 'Sanden',
                'kota_id'   => 9
            ],
            [
                'name'      => 'Kotagede',
                'kota_id'   => 10
            ],
            [
                'name'      => 'Kraton',
                'kota_id'   => 10
            ],
        ]);
    }
}
