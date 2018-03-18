<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['barang_id','jumlah','ket'];

    public function barang()
	{
    	return $this->belongsTo('App\Barang');
	}
}
