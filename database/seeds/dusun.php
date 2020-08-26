<?php

use Illuminate\Database\Seeder;

class dusun extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dusun = ['Dusun Gubuk Daya', 'Dusun Gubuk Barat', 'Dusun Tempasan', 'Dusun Dasan Sadar', 'Dusun Gubuk Baret Selatan'];
        $dusun1 = ['Dusun Kedondong','Pancor Kopong','Timba Gerah'];
        $dusun2 = ['Aik Dewa','Aik Dewa Utara'];
        $dusun3 = ['Tibu Salam','Elong Elong'];
        foreach ($dusun as $dusun) {
            DB::table('dusuns')->insert([
                'desa_id' => 1,
                'name' => $dusun
            ]);
        }

        foreach ($dusun1 as $dusun) {
            DB::table('dusuns')->insert([
                'desa_id' => 2,
                'name' => $dusun
            ]);
        }

        foreach ($dusun2 as $dusun) {
            DB::table('dusuns')->insert([
                'desa_id' => 2,
                'name' => $dusun
            ]);
        }

        foreach ($dusun3 as $dusun) {
            DB::table('dusuns')->insert([
                'desa_id' => 3,
                'name' => $dusun
            ]);
        }

    }
}
