<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Suplier extends Model
{
    protected $fillable = ['nama_suplier', 'alamat', 'telepon', 'opsional'];

    public function barang()
    {
    	return $this->hasMany('App\Barang', 'suplier_id');
    }

    public function trxbeli()
    {
    	return $this->hasMany('App\TrxBeli', 'suplier_id');
    }

    public static function boot() 
    { 
    	parent::boot();
		self::deleting(function($suplier) {
		 // mengecek apakah penulis masih punya buku 
		 if ($suplier->barang->count() > 0) { 
		 // menyiapkan pesan error 
		 	$html = 'Suplier tidak bisa dihapus karena masih memiliki barang : '; 
		 	$html .= '<ul>'; 
		 	foreach ($suplier->barang as $barangs) { 
		 		$html .= "<li>$barangs->nama_barang</li>";
		 	} 	$html .= '</ul>';
		Session::flash("flash_notification", [ "level"=>"danger", "message"=>$html ]);
		// membatalkan proses penghapusan
		return false;
	} 
		});
	} 
}
