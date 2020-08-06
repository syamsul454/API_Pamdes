<?php

namespace App\Observers;
use App\data_debit_air;
class debitAir
{
    public function creating(data_debit_air $debit_air)
    {
        $data = data_debit_air::latest()->first();
        $data->pemakaian = $data->meter_awal - $debit_air->meter;
        
    }
}
