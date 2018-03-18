<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use DB;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $penjualan = Transaksi::all();
        return view('laporan.penjualan',compact('penjualan'));
    }

    public function downloadPDF(Request $request){
        $a = $request->a; 
        $b = $request->b;
        $penjualan1 = Transaksi::whereBetween('created_at', [$a, $b])->get(); 
        $sum = $penjualan1->sum('total');
      $user = Transaksi::all();

      $pdf = PDF::loadView('laporan.pdf', compact('user','a','b','sum'));
      return $pdf->download('laporan.pdf');

    }
}
