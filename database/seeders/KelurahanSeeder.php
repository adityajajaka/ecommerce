<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('kelurahans')->insert([
            [
                'name'      	 => 'Kebon Kacang',
                'kecamatan_id'   => 1
            ],
            [
                'name'     		 => 'Kebon Melati',
                'kecamatan_id'   => 1
            ],
            [
                'name'    		 => 'Cempaka Baru',
                'kecamatan_id'   => 2
            ],
            [
                'name'      	 => 'Kemayoran',
                'kecamatan_id'   => 2
            ],
            [
                'name'      	 => 'Melawai',
                'kecamatan_id'   => 3
            ],
            [
                'name'      	 => 'Senayan',
                'kecamatan_id'   => 3
            ],
            [
                'name'     		 => 'Kebayoran Lama Selatan',
                'kecamatan_id'   => 4
            ],
            [
                'name'      	 => 'Kebayoran Lama Utara',
                'kecamatan_id'   => 4
            ],
            [
                'name'      	 => 'Margasari',
                'kecamatan_id'   => 5
            ],
            [
                'name'      	 => 'Sekejati',
                'kecamatan_id'   => 5
            ],
            [
                'name'      	 => 'Rancabolang',
                'kecamatan_id'   => 6
            ],
            [
                'name'     		 => 'Rancanumpang',
                'kecamatan_id'   => 6
            ],
            [
                'name'      	 => 'Cibeureum',
                'kecamatan_id'   => 7
            ],
            [
                'name'     		 => 'Leuwigajah',
                'kecamatan_id'   => 7
            ],
            [
                'name'      	 => 'Baros',
                'kecamatan_id'   => 8
            ],
            [
                'name'      	 => 'Padasuka',
                'kecamatan_id'   => 8
            ],
            [
                'name'    	 	 => 'Cipageran',
                'kecamatan_id'   => 9
            ],
            [
                'name'    		 => 'Cibabat',
                'kecamatan_id'   => 9
            ],
            [
                'name'     		 => 'Karangayar',
                'kecamatan_id'   => 10
            ],
            [
                'name'   		 => 'Tugurejo',
                'kecamatan_id'   => 10
            ],
            [
                'name'     		 => 'Banyumanik',
                'kecamatan_id'   => 11
            ],
            [
                'name'    		 => 'Padangsari',
                'kecamatan_id'   => 11
            ],
            [
                'name'     		 => 'Ampelsari',
                'kecamatan_id'   => 12
            ],
            [
                'name'     		 => 'Kutabanjarnegara',
                'kecamatan_id'   => 12
            ],
            [
                'name'     		 => 'Danaraja',
                'kecamatan_id'   => 13
            ],
            [
                'name'     		 => 'Kutawaluh',
                'kecamatan_id'   => 13
            ],
            [
                'name'     		 => 'Pakis',
                'kecamatan_id'   => 14
            ],
            [
                'name'     		 => 'Sumberrejo',
                'kecamatan_id'   => 14
            ],
            [
                'name'     		 => 'Bangorejo',
                'kecamatan_id'   => 15
            ],
            [
                'name'     		 => 'Sukorejo',
                'kecamatan_id'   => 15
            ],
            [
                'name'     		 => 'Tegalsari',
                'kecamatan_id'   => 16
            ],
            [
                'name'     		 => 'Wonorejo',
                'kecamatan_id'   => 16
            ],
            [
                'name'     		 => 'Keputih',
                'kecamatan_id'   => 17
            ],
            [
                'name'     		 => 'Gebang Putih',
                'kecamatan_id'   => 17
            ],
            [
                'name'     		 => 'Bantul',
                'kecamatan_id'   => 18
            ],
            [
                'name'     		 => 'Sabdodadi',
                'kecamatan_id'   => 18
            ],
            [
                'name'     		 => 'Gadingharjo',
                'kecamatan_id'   => 19
            ],
            [
                'name'     		 => 'Gadingsari',
                'kecamatan_id'   => 19
            ],
            [
                'name'     		 => 'Rejowinangun',
                'kecamatan_id'   => 20
            ],
            [
                'name'     		 => 'Prengan',
                'kecamatan_id'   => 20
            ],
            [
                'name'     		 => 'Purbayan',
                'kecamatan_id'   => 20
            ],
            [
                'name'     		 => 'Kadiapten',
                'kecamatan_id'   => 21
            ],
            [
                'name'     		 => 'Panembahan',
                'kecamatan_id'   => 21
            ],
            [
                'name'     		 => 'Patehan',
                'kecamatan_id'   => 21
            ]
        ]);
    }
}
