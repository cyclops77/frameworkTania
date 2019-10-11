<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index($id)
    {
    	$snack = \App\Snack::where('id','=',$id)->first();
		return view('kasir.index', ['snack' => $snack]);
    }
    public function create(Request $req)
    {
    	$snackX = \App\Snack::where('id','=',$req->idnya)->first();

    	$hargaTotal = $req->jumlah * $snackX->harga;
    	$stokNow = $snackX->stock-$req->jumlah;

    	// dd($hargaTotal);

    	$qqqq = new \App\Pemesanan;
    	$qqqq->id = mt_rand(1000,9999);
    	$qqqq->id_snack = $req->idnya;
    	$qqqq->jumlah = $req->jumlah;
    	$qqqq->harga_total = $hargaTotal;

    	$aa = \App\Snack::where('id','=',$req->idnya)
    		->update([
    			'stock' => $stokNow	
    		]);

    	$qqqq->save();


    	return redirect('/snack');
    }
}
