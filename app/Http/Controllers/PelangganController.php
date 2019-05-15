<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;

class PelangganController extends Controller
{
     public function index()
    {
        $pelanggans = Pelanggan::orderBy('created_at', 'DESC')->paginate(10);
        return view('pelanggan.index', compact('pelanggans'));
    }


    public function create()
    {
        return view('pelanggan.add');
    }


    public function save(Request $request)
	{
	    //VALIDASI DATA
	    $this->validate($request, [
	        'namapelanggan' => 'required|string',
	        'sex' => 'required|string',
	        'telepon' => 'required|max:13', //maximum karakter 13 digit
	        'alamat' => 'required|string'
	    ]);

	    try {
	        $pelanggan = Pelanggan::create([
	            'namapelanggan' => $request->namapelanggan,
	            'sex'=>$request->sex,
	            'telepon' => $request->telepon,
	            'alamat' => $request->alamat
	        ]);

	        return redirect('/pelanggan')->with(['success' => 'Data telah disimpan']);
	    } catch (\Exception $e) {
	        return redirect()->back()->with(['error' => $e->getMessage()]);
	    }
	}


	public function edit($id)
	{
	    $pelanggan= Pelanggan::find($id);
	    return view('pelanggan.edit', compact('pelanggan'));
	}


	public function update(Request $request, $id)
    {
    $pelanggan = Pelanggan::find($id); // QUERY UNTUK MENGAMBIL DATA BERDASARKAN ID
    //KEMUDIAN MENGUPDATE DATA TERSEBUT
    $pelanggan->update([
				'namapelanggan' => $request->namapelanggan,
	            'sex'=>$request->sex,
	            'telepon' => $request->telepon,
	            'alamat' => $request->alamat    ]);
    //LALU DIARAHKAN KE HALAMAN /product DENGAN FLASH MESSAGE SUCCESS
    return redirect('/pelanggan')->with(['success' => '<strong>' . $pelanggan->namapelanggan . '</strong> Diperbaharui']);
    }



	public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        $pelanggan->delete();
        return redirect()->back()->with(['success' => '<strong>' . $pelanggan->namapelanggan . '</strong> Telah dihapus']);
    }
}
