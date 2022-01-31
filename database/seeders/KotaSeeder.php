<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('kotas')->insert([
            [
                'name'          => 'Jakarta Pusat',
                'provinsi_id'   => 1
            ],
            [
                'name'          => 'Jakarta Selatan',
                'provinsi_id'   => 1
            ],
            [
                'name'          => 'Kota Bandung',
                'provinsi_id'   => 2
            ],
            [
                'name'          => 'Kota Cimahi',
                'provinsi_id'   => 2
            ],
            [
                'name'          => 'Kota Semarang',
                'provinsi_id'   => 3
            ],
            [
                'name'          => 'Kabupaten Banjarnegara',
                'provinsi_id'   => 3
            ],
            [
                'name'          => 'Kabupaten Banyuwangi',
                'provinsi_id'   => 4
            ],
            [
                'name'          => 'Kota Surabaya',
                'provinsi_id'   => 4
            ],
            [
                'name'          => 'Kabupaten Bantul',
                'provinsi_id'   => 5
            ],
            [
                'name'          => 'Kota Yogyakarta',
                'provinsi_id'   => 5
            ],
        ]);
    }
}
