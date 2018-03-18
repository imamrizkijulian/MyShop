<?php

namespace App\Http\Controllers;

use App\Barang;
use Validator;
use Alert;
use File;
use Illuminate\Http\Request;
// use Yajra\Datatables\Html\Builder; 
// use Yajra\Datatables\Datatables;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $barang = Barang::latest()->paginate(5);
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

        // // $barangs = Barang::where('nama_barang','=',$request->nama_barang)->first();
        // // if ($barangs->nama_barang == $request->nama_barang)
        // // {
            
        // //     $barangs->stok = $barangs->stok + $request->stok;
        // //     $barangs->save();
        // //     Alert::success('Berhasil Menyimpan Data Barang')->persistent("Close");
        // //     return redirect()->route('barang.index');
        // // }
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
        // return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::find($id);
        return view('barang.edit')->with(compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama_suplier' => 'required',
            'harga_jual' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'status' => 'required',
            'gambar' => 'required|image|max:2048',
            'nama_suplier' => 'required'
        ];

        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails())
        {
            Alert::error('Sorry your data is invalid, Please try again!', 'Oops!')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }
        else 
        {
            Alert::success('Berhasil Mengubah Data Supplier!')->persistent("Close");
        }
        
        $barang= Barang::findOrFail($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_jual  = $request->harga_jual;
        $barang->harga_beli  = $request->harga_beli;
        $barang->stok        = $request->stok;
        $barang->satuan      = $request->satuan;
        $barang->status      = $request->status;
        $barang->suplier_id  = $request->suplier_id;

        if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $destinationPath = public_path().'/img/';
        $filename = str_random(6).'_'.$file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);
        $barang->gambar = $filename;
        }      
        
        $barang->save();

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        
        if ($barang->gambar) {
        $old_gambar = $barang->gambar;
        $filepath = public_path() . DIRECTORY_SEPARATOR . '/img/'
        . DIRECTORY_SEPARATOR . $barang->gambar;
        try {
        File::delete($filepath);
        } catch (FileNotFoundException $e) {
        // File sudah dihapus/tidak ada
        }
        }
        $barang->delete();

        return redirect()->route('barang.index')->with('success','Berhasil menghapus data barang');
    }
}
