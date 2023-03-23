<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Model;

class tbl_customer extends Model{
    protected $connection ='pgsql-192.168.2.58';
    protected $table = "public.customer";
    protected $guarded =    [];
    public $timestamps = false;
    public $inscrementing = false;
}