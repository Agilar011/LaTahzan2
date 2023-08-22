<?php

namespace App\Exports;

use App\Models\laporan_transaksi_otomotif;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataTransaksiOto implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return laporan_transaksi_otomotif::all();
    }
}
