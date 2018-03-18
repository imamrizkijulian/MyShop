<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
	protected $vissible = ['kode_barang', 'nama_barang', 'harga_jual', 'harga_beli', 'stok', 'satuan', 'status', 'gambar', 'suplier_id'];
    protected $fillable = ['kode_barang', 'nama_barang', 'harga_jual', 'harga_beli', 'stok', 'satuan', 'status', 'gambar', 'suplier_id'];

    public function suplier()
    {
    	return $this->belongsTo('App\Suplier');
    }

    public function trxbeli()
    {
    	return $this->belongsTo('App\TrxBeli');
    }
}
