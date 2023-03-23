<?php

namespace App\Transformers;

use App\Models\tbl_customer;
use League\Fractal\TransformerAbstract;

class TblCustomerTransformer extends TransformerAbstract
{
    public function transform(tbl_customer $data)
    {
        // $first = \App\Models\tbl_commcheck::find(9);
        return [ 
            'nokartu'          => $data->nokartu,
            'nama'           =>$data->nama,
            'nohp'          => $data->nohp,
            'email'          => $data->email
        ];
    }
}