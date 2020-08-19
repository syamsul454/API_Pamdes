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

        foreach ($dusun as $dusun) {
            DB::table('dusuns')->insert([
                'desa_id' => 1,
                'name' => $dusun
            ]);
        }
    }
}
