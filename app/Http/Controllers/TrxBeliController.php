<?php

namespace App\Http\Controllers;
use App\TrxBeli;
use App\Barang;
use App\Suplier;
use Validator;
use Alert;
use Illuminate\Http\Request;

class TrxBeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trxbeli = TrxBeli::latest()->paginate(10);
        $barang  = Barang::all();
        $suplier  = Suplier::all();
        return view('trxbeli.index', compact('trxbeli','barang','suplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trxbeli.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    	$rules = [
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'status' => 'required',
            'gambar' => 'required|image|max:2048',
            'jumlah' => 'required',
            'nama_suplier' => 'required'
        ];

        // $validation = Validator::make($request->all(), $rules);
        // if ($validation->fails())
        // {
        //     Alert::error('Maaf Inputkan Data Dengan Benar', 'Oops!')->persistent("Ok");
        //     return back()->withErrors($validation)->withInput();
        // }

        $trxbeli = new TrxBeli;
        $trxbeli->nama_barang   = $request->nama_barang;
        $trxbeli->jumlah        = $request->jumlah;
        $trxbeli->harga_beli    = $request->harga_beli;        
        $trxbeli->total         = $trxbeli->harga_beli * $request->jumlah;
        $trxbeli->suplier_id    = $request->suplier_id;
        $trxbeli->save();

        $barangs = Barang::where('nama_barang','=',$request->nama_barang)->get();
        if ($barangs->count() == 0)
        {
        
        $barang = new Barang;
        $barang->nama_barang 	= $request->nama_barang;
        $barang->harga_jual		= $request->harga_jual;
        $barang->harga_beli		= $request->harga_beli;
        if ($request->harga_jual < $request->harga_beli)
        {
            return redirect()->route('trxbeli.index')->with([Alert::error('Maaf Data Yang Anda Inputkan Salah, Silahkan Inputkan Kembali!', 'Oops!')->persistent("Ok")]);
        }
        $barang->stok 			= $request->jumlah;
        $barang->satuan 		= $request->satuan;
        $barang->status 		= $request->status;
        $barang->suplier_id     = $request->suplier_id;
        $barang->gambar			= $request->gambar;
        if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $destinationPath = public_path().'/img/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        $barang->gambar = $filename;
        }
        $barang->save();
        }
        if ($barangs->count() > 0) 
        {
        	$barangs = Barang::where('nama_barang','=',$request->nama_barang)->first();
        	$barangs->stok = $barangs->stok + $request->jumlah;
        	$barangs->save();
        }
        Alert::success('Berhasil Menyimpan Data Transaksi Beli')->persistent("Close");
        return redirect()->route('trxbeli.index');
        // $rules = [
        //     'nama_barang' => 'required',
        //     'harga_jual' => 'required',
        //     'harga_beli' => 'required',
        //     'stok' => 'required',
        //     'satuan' => 'required',
        //     'status' => 'required',
        //     'gambar' => 'required|image|max:2048',
        //     'nama_suplier' => 'required'
        // ];

        // $validation = Validator::make($request->all(), $rules);
        // if ($validation->fails())
        // {
        //     Alert::error('Maaf Inputkan Data Dengan Benar', 'Oops!')->persistent("Ok");
        //     return back()->withErrors($validation)->withInput();
        // }

        // $barangs = Barang::where('nama_barang','=',$request->nama_barang)->first();
        // if ($barangs->nama_barang == $request->nama_barang)
        // {
            
        //     $barangs->stok = $barangs->stok + $request->stok;
        //     $barangs->save();
        //     Alert::success('Berhasil Menyimpan Data Barang')->persistent("Close");
        //     return redirect()->route('barang.index');
        // }
        // $barang= new Barang;
        // $barang->nama_barang = $request->nama_barang;
        // $barang->harga_jual  = $request->harga_jual;
        // $barang->harga_beli  = $request->harga_beli;
        // if ($request->harga_jual < $request->harga_beli)
        // {
        //     return redirect()->route('barang.index')->with([Alert::error('Maaf Data Yang Anda Inputkan Salah, Silahkan Inputkan Kembali!', 'Oops!')->persistent("Ok")]);
        // }
        // else
        // {
        // $barang->stok        = $request->stok;
        // $barang->satuan      = $request->satuan;
        // $barang->status      = $request->status;
        // $barang->suplier_id  = $request->suplier_id;

        // if ($request->hasFile('gambar')) {
        // $file = $request->file('gambar');
        // $destinationPath = public_path().'/img/';
        // $filename = str_random(6).'_'.$file->getClientOriginalName();
        // $uploadSuccess = $file->move($destinationPath, $filename);
        // $barang->gambar = $filename;
        // }
        // $barang->save();
        // Alert::success('Berhasil Menyimpan Data Barang')->persistent("Close");
        // }
        // return redirect()->route('trxbeli.index');
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
        $barang = Barang::find($id);
        return view('trxbeli.belistok')->with(compact('barang'));
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
        $barang = Barang::find($id); 
        

        $trxbeli = new TrxBeli;
        $trxbeli->nama_barang   = $barang->nama_barang;
        $trxbeli->jumlah        = $request->jumlah-$barang->jumlah;
        $trxbeli->harga_beli    = $barang->harga_beli;        
        $trxbeli->total         = ($request->jumlah-$barang->jumlah)*$trxbeli->harga_beli;
        $trxbeli->suplier_id    = $barang->suplier_id;
        $trxbeli->save();
        $barang->stok=$barang->stok+$request->jumlah;
        $barang->save();

        return redirect()->route('trxbeli.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
