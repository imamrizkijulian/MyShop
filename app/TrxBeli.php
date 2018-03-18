<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrxBeli extends Model
{
    protected $fillable = ['nama_barang','jumlah','total','suplier_id'];

    public function suplier()
	{
    	return $this->belongsTo('App\Suplier');
	}

	public function barang()
	{
    	return $this->hasMany('App\Barang');
	}
}
