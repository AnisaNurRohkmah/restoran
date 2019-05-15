<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Pelanggan;
use App\User;
use App\Pesanan;
use App\transaksi;
use Illuminate\Support\Facades\DB;

class PesananControllerer extends Controller
{
	public function index()
    {
    	$pesanans=Pesanan::orderby('pesanans.created_at','desc')
    	->join('menus','pesanans.menu_id','=','menus.id')
    	->join('pelanggans','pesanans.pelanggan_id','=','pelanggans.id')
    	->get();//select * from menu order by created at desc
    	return view('pesanan.index',compact('pesanans'));

    	// $pesanans = DB::get('SELECT a.id as idpesanan ,b.harga, b.namamenu,c.namapelanggan,a.jumlah FROM `pesanans` as a, menus as b ,pelanggans as c WHERE a.menu_id= b.id and a.pelanggan_id = c.id');
    	return view('pesanan.index',compact('pesanans'));

    }


 
    public function create()
    {
    	$pesanans=Pesanan::orderby('pesanans.created_at','desc')
    	
    	->get();//select * from menu order by created at desc
	    $menus=Menu::orderby('menus.created_at','desc')->get();
	    $pelanggans=Pelanggan::orderby('pelanggans.created_at','desc')->get();
	    $users=User::orderby('users.created_at','desc')->get();
        return view('pesanan.add',compact('pesanans','menus','pelanggans','users'));
    }



    public function save(Request $request)
	{

	    try {
	        $pesanans = Pesanan::create([
	            'menu_id' => $request->menu_id,
	            'pelanggan_id'=>$request->pelanggan_id,
	            'jumlah' => $request->jumlah,
	            'user_id' => $request->user_id
	        ]);

	        return redirect('/pesanan')->with(['success' => 'Data telah disimpan']);
	        
	    } catch (\Exception $e) {
	        return redirect()->back()->with(['error' => $e->getMessage()]);
	    }
	}


    public function createtransaksi(Request $request)
	{
	    //VALIDASI DATA
	    DB::table('transaksis')->insert([
	    	'pesanan_id'=>$request->pesanan_id,
	    	'total'=>$request->total,
	    	'bayar'=>$request->bayar
	    ]);
	    return redirect('/pesanan');
	}


	public function transaksi($id)
	{
//Pesanan::find($id);
		$pesan=Pesanan::orderby('pesanans.created_at','desc')
    	->join('menus','pesanans.menu_id','=','menus.id')
    	->where('idpesanan',$id)
    	->get();//select * from menu order by created at desc
    
		$pesanans= DB::table('pesanans')->where('idpesanan',$id)->get();

        return view('pesanan.transaksi',['pesanan' => $pesanans,'pesan' => $pesan]);
        //compact('pesanans','menus','pelanggans','users')
	}



	public function edit($id)
	{
//Pesanan::find($id);
		$pesanans= DB::table('pesanans')->where('idpesanan',$id)->get();
		 $menus=Menu::orderby('menus.created_at','desc')->get();
	    $pelanggans=Pelanggan::orderby('pelanggans.created_at','desc')->get();
	     $users=User::orderby('users.created_at','desc')->get();
        return view('pesanan.edit',['pesanan' => $pesanans,'menus' => $menus,'pelanggans' => $pelanggans,'users' => $users]);
        //compact('pesanans','menus','pelanggans','users')
	}


	public function update(Request $request, $id)
    {
	    // $pesanans = Pesanan::find($id); // QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
	    // //KEMUDIAN MENGUPDATE DATA TERSEBUT
	    // $pesanans->update([
				 //  	'menu_id' => $request->menu_id,
		   //          'pelanggan_id'=>$request->pelanggan_id,
		   //          'jumlah' => $request->jumlah,
		   //          'user_id' => $request->user_id    ]);
	    // //LALU DIARAHKAN KE HALAMAN /product DENGAN FLASH MESSAGE SUCCESS
	    // return redirect('/pesanan')->with(['success' => '<strong>' . $pesanans->idpesanan . '</strong> Diperbaharui']);

		DB::table('pesanans')->where('idpesanan',$id)->update([
	    		'menu_id' => $request->menu_id,
		            'pelanggan_id'=>$request->pelanggan_id,
		            'jumlah' => $request->jumlah,
		            'user_id' => $request->user_id 
	    ]);
	    return redirect('/pesanan');
    }



	public function destroy($id)
    {
        // $pesanan= Pesanan::find($id);
        // $pesanan->delete();
        // return redirect()->back()->with(['success' => '<strong>' . $pesanan->idpesanan . '</strong> Telah dihapus']);
        DB::table('pesanans')->where('idpesanan',$id)->delete();
        return redirect('/pesanan');
    }



}
