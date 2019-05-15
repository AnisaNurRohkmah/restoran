<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use App\Menu;
use App\Pelanggan;
use App\User;
use  PDF;
use App\Pesanan;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
    	$transaksis=transaksi::orderby('transaksis.created_at','desc')
    	->join('pesanans','transaksis.pesanan_id','=','pesanans.idpesanan')
    	->join('menus','pesanans.menu_id','=','menus.id')
    	->join('pelanggans','pesanans.pelanggan_id','=','pelanggans.id')
    	->join('users','pesanans.user_id','=','users.id')
    	->get();//select * from menu order by created at desc
    	$pesanans=pesanan::orderby('pesanans.created_at','desc')->get();

    	$categories=[];
    	$data=[];

    	foreach ($transaksis as $n) {
    		$categories[]=$n->namamenu;
    		$data[]=$n->jumlah;
    	}

    	return view('transaksi.index',compact('transaksis','categories','data'));
    }



    public function create()
    {
    	$transaksis=transaksi::orderby('transaksis.created_at','desc')->get();//select * from menu order by created at desc
	    $menus=Menu::orderby('menus.created_at','desc')->get();
	    $pelanggans=Pelanggan::orderby('pelanggans.created_at','desc')->get();
	    $users=User::orderby('users.created_at','desc')->get();
	    $pesanans=Pesanan::orderby('pesanans.created_at','desc')->get();
        return view('transaksi.add',compact('transaksis','pesanans','menus','pelanggans','users'));
    }

	public function exportPdf(){
    	$transaksis=transaksi::orderby('transaksis.created_at','desc')
    	->join('pesanans','transaksis.pesanan_id','=','pesanans.idpesanan')
    	->join('menus','pesanans.menu_id','=','menus.id')
    	->join('pelanggans','pesanans.pelanggan_id','=','pelanggans.id')
    	->join('users','pesanans.user_id','=','users.id')
    	->get();
    	$pdf=PDF::loadView('baru.transaksi', ['transaksis'=>$transaksis])->setPaper('a4','landscape');
    	return $pdf->stream('laporan.pdf');
    }


    public function save(Request $request)
	{

	    // try {
	    //     $transaksis = transaksi::create([
	    //         'menu_id' => $request->menu_id,
	    //         'pelanggan_id'=>$request->pelanggan_id,
	    //         'jumlah' => $request->jumlah,
	    //         'user_id' => $request->user_id
	    //     ]);

	    //     return redirect('/transaksi')->with(['success' => 'Data telah disimpan']);
	    // } catch (\Exception $e) {
	    //     return redirect()->back()->with(['error' => $e->getMessage()]);
	    // }
	    DB::table('transaksis')->insert([
	     'pesanan_id' => $request->pesanan_id,
	            'total' => $request->jumlah,
	            'bayar' => $request->bayar
	    ]);
	}


	public function edit($id)
	{

		$pesanans=Pesanan::find($id);
		$menus=Menu::orderby('menus.created_at','desc')->get();
	    $pelanggans=Pelanggan::orderby('pelanggans.created_at','desc')->get();
	    $users=User::orderby('users.created_at','desc')->get();
        return view('pesanan.edit',compact('pesanans','menus','pelanggans','users'));
	}


	public function update(Request $request, $id)
    {
	    $pesanans = Pesanan::find($id); // QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
	    //KEMUDIAN MENGUPDATE DATA TERSEBUT
	    $pesanans->update([
				  	'menu_id' => $request->menu_id,
		            'pelanggan_id'=>$request->pelanggan_id,
		            'jumlah' => $request->jumlah,
		            'user_id' => $request->user_id    ]);
	    //LALU DIARAHKAN KE HALAMAN /product DENGAN FLASH MESSAGE SUCCESS
	    return redirect('/pesanan')->with(['success' => '<strong>' . $pesanans->id . '</strong> Diperbaharui']);
    }



	public function destroy($id)
    {
        $pesanan= Pesanan::find($id);
        $pesanan->delete();
        return redirect()->back()->with(['success' => '<strong>' . $pesanan->id . '</strong> Telah dihapus']);
    }


    

}

