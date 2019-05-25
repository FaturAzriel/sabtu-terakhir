<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = "pesanan";

    protected $fillable = ['daya','nama','email','telp','alamat'];
}