<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    public function index()
    {
    	$menus=Menu::orderby('created_at','desc')->get();//select * from menu order by created at desc
    	return view('menus.index',compact('menus'));
    }


    public function save(Request $request)
    {
        //MELAKUKAN VALIDASI DATA YANG DIKIRIM DARI FORM INPUTAN
        $this->validate($request, [
            'namamenu' => 'required|string|max:100',
            'harga' => 'required|integer'
        ]);

        try {
            //MENYIMPAN DATA KEDALAM DATABASE
            $menu = Menu::create([
                'namamenu' => $request->namamenu,
                'harga' => $request->harga

            ]);
            
            //REDIRECT KEMBALI KE HALAMAN /PRODUCT DENGAN FLASH MESSAGE SUCCESS
        return redirect('/menu')->with(['success' => '<strong>' . $menu->namamenu . '</strong> Telah disimpan']);
        } catch(\Exception $e) {
            //APABILA TERDAPAT ERROR MAKA REDIRECT KE FORM INPUT
            //DAN MENAMPILKAN FLASH MESSAGE ERROR
            return redirect('/menu/new')->with(['error' => $e->getMessage()]);
        }
    }


    public function create()
    {
        return view('menus.create');
    }

    public function edit($id)
    {
        $menus = Menu::find($id); // Query ke database untuk mengambil data dengan id yang diterima
        return view('menus.edit', compact('menus'));
    }


    public function update(Request $request, $id)
    {
    $menu = Menu::find($id); //
    $menu->update([
        'namamenu' => $request->namamenu,
        'harga' => $request->harga
    ]);

    return redirect('/menu')->with(['success' => '<strong>' . $menu->namamenu . '</strong> Diperbaharui']);
    }



    public function destroy($id)
    {
    $menu = Menu::find($id); //QUERY KEDATABASE UNTUK MENGAMBIL DATA BERDASARKAN ID
    $menu->delete(); // MENGHAPUS DATA YANG ADA DIDATABASE
    return redirect('/menu')->with(['success' => '</strong>' . $menu->namamenu . '</strong> Dihapus']); // DIARAHKAN KEMBALI KEHALAMAN /product
    }

}
