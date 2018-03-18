<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrxBeli;
use DB;
use PDF;

class Laporan2Controller extends Controller
{
    public function index()
    {
        $pembelian = TrxBeli::all();
        return view('laporan.pembelian',compact('pembelian'));
    }

    public function downloadPDF(Request $request){
        $a = $request->a; 
        $b = $request->b;
        $pembelian1 = TrxBeli::whereBetween('created_at', [$a, $b])->get(); 
        $sum = $pembelian1->sum('total');
      $pem = TrxBeli::all();

      $pdf = PDF::loadView('laporan.pdfpembelian', compact('pem','a','b','sum'));
      return $pdf->download('laporan.pdf');

    }
}
