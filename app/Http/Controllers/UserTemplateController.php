<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class UserTemplateController extends Controller
{
    public function index()
    {
    	$barang = Barang::all();
    	return view('usertemp.page',compact('barang'));
    }
}
