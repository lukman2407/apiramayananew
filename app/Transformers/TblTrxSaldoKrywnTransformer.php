<?php

namespace App\Transformers;

use App\Models\tbl_trxsaldokaryawan;
use League\Fractal\TransformerAbstract;

class TblTrxSaldoKrywnTransformer extends TransformerAbstract
{
    public function transform(tbl_trxsaldokaryawan $data)
    {
        // $first = \App\Models\tbl_commcheck::find(9);
        return [
            'tanggal'          => $data->tanggal,
            'toko'             => $data->toko,
            'nokartu'          => $data->nokartu,
            'nostruk'          => $data->nostruk,
            'nocp'             => $data->nocp,
            'nilai'            => $data->nilai,
            'status'           => $data->status,
            'kasir'            => $data->kasir
        ];
    }
}