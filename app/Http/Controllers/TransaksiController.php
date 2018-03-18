<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Barang;
use Alert;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $transaksi = Transaksi::latest()->paginate(10);
        return view('transaksi.index', compact('transaksi','barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for($id = 0; $id < count($request->nama_barang); $id++){
            $barang = Barang::findOrFail($request->nama_barang[$id]);
            if ($barang >= $request->jumlah) 
            {
                $transaksi = new Transaksi;
                $transaksi->barang_id = $request->nama_barang[$id];
                $transaksi->jumlah    = $request->jumlah[$id];

                $barang = Barang::findOrFail($request->nama_barang[$id]);
                $barang->stok = $barang->stok - $request->jumlah[$id];
                $transaksi->ket = $request->jumlah[$id] * $barang->harga_jual;
            }
            if($barang->ket < $transaksi->jumlah[$id]){
                Alert::error('Maaf Data Yang Anda Inputkan Salah, Stok tidak mencukupi', 'Oops!')->persistent("Ok");
            return back();
            }
            $barang->save();
            $transaksi->save();
        }        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success','Berhasil menghapus data transaksi');
    }
}
