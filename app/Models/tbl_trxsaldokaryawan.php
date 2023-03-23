<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Model;

class tbl_trxsaldokaryawan extends Model{
    protected $connection ='pgsql-192.168.2.58';
    protected $table = "public.trx_saldo_karyawan";
    protected $guarded =    [];
    public $timestamps = false;
    public $inscrementing = false;
}