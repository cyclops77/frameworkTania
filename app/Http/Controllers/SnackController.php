<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SnackController extends Controller
{
    public function index()
    {
        $snackSorts = \App\Snack::where('stock','<=',25)->first();
    	$snack = \App\Snack::All();
		return view('snack.index',['snack' => $snack,'snackSorts' => $snackSorts]);
    }
    public function create(Request $req)
    {
    	$aa = new \App\Snack;
    	$aa->id = mt_rand(1000, 9999);
    	$aa->nama_snack = $req->nama_snack;
    	$aa->varian_snack = $req->varian_snack;
    	$aa->stock = $req->stock;
    	$aa->harga = $req->harga;

		$aa->save();    	

    	return redirect()->back();
    }
    public function isiStock($id)
    {
        $idnya = $id;
        $snack = \App\Snack::where('id','=',$id)->first();
        return view('snack.isi', ['idnya' => $idnya,'snack' => $snack]);
    }
    // public function index($id)
    // {
    //     $snack = \App\Snack::where('id','=',$id)->first();
    //     return view('kasir.index', ['snack' => $snack]);
    // }
    public function updateStock(Request $req)
    {
        $now = \App\Snack::where('id','=',$req->idnya)->first();
        $stockTOTAL = ($now->stock) + ($req->jumlah);
        \App\Snack::where('id','=',$req->idnya)
            ->update([
                'stock' => $stockTOTAL
            ]);
        return redirect('/snack');
    }
}
