<?php

namespace App\Http\Controllers;

use App\Suplier;
use Illuminate\Http\Request;
use Validator;
use Alert;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {

        $suplier = Suplier::latest()->paginate(10);
        return view('suplier.index', compact('suplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suplier.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $message = [
            'nama_suplier' => 'Nama suplier harus diisi',
            'alamat' => 'Alamat harus diisi',
            'telepon' => 'No telepon harus diisi',
            'opsional' => 'Opsional suplai barang harus diisi',            
        ];

        $rules = [
            'nama_suplier'   => 'required',
            'alamat'         => 'required',
            'telepon'        => 'required|max:13',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails())
        {
            Alert::error('Maaf Data Yang Anda Inputkan Salah, Mohon Inputkan Kembali', 'Oops!')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }
        else 
        {
            Alert::success('Berhasil Menyimpan Data Supplier!')->persistent("Close");
        }
        Suplier::create($request->only('nama_suplier','alamat','telepon','opsional'));
        return redirect()->route('suplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function show(Suplier $suplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suplier = Suplier::find($id);
        return view('suplier.edit', compact('suplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = [
            'nama_suplier' => 'Nama suplier harus diisi',
            'alamat' => 'Alamat harus diisi',
            'telepon' => 'No telepon harus diisi',
            'opsional' => 'Opsional suplai barang harus diisi',            
        ];

        $rules = [
            'nama_suplier'   => 'required',
            'alamat'         => 'required',
            'telepon'        => 'required|max:13',
            'opsional'       => 'required',
        ];

        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails())
        {
            Alert::error('Maaf Data Yang Anda Inputkan Salah, Mohon Inputkan Kembali', 'Oops!')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }
        else 
        {
            Alert::success('Berhasil Mengubah Data Supplier!')->persistent("Close");
        }
        Suplier::find($id)->update($request->all());
        
        return redirect()->route('suplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suplier  $suplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Suplier::destroy($id)) 
        return redirect()->back();
        Alert::success('Berhasil Menghapus Data Supplier')->persistent("Close");
        return redirect()->route('suplier.index');
    }
}
