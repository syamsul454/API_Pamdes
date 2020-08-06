<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class desa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $desa = ['PRINGGASELA','JURIT','PRINGGASELA SELATAN','JURIT BARU','AIK DEWA','PENGANDANGAN BARAT','REMPUNG','TIMBANUH','PRINGGASELA TIMUR','PENGANDANGAN'];
       foreach ($desa as $d) {
           DB::table('desas')->insert([
               'name' => $d,
           ]);
       }
      
    }
}
