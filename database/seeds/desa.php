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
        $desa = ['PRINGGASELA','PRINGGASELA SELATAN','AIK DEWA','TIMBANUH','PRINGGASELA TIMUR'];
       foreach ($desa as $d) {
           DB::table('desas')->insert([
               'name' => $d,
           ]);
       }
      
    }
}
