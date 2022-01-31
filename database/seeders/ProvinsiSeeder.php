<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('provinsis')->insert([
	        ['name' => 'DKI Jakarta'],
	        ['name' => 'Jawa Barat'],
	        ['name' => 'Jawa Tengah'],
	        ['name' => 'Jawa Timur'],
	        ['name' => 'Yogyakarta']
	    ]);
    }
}
