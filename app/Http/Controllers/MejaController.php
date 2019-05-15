<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meja;
use Illuminate\Support\Facades\DB;

class MejaController extends Controller
{
    public function index()
    {
    	$mejas=Meja::orderby('created_at','desc')->get();//select * from meja order by created at desc
    	return view('meja.index',compact('mejas'));
    }


   public function create()
    {
    	 return view('meja.add');
    }


       public function save(Request $request)
    {
        try {
            //MENYIMPAN DATA KEDALAM DATABASE
            $meja = Meja::create([
                'nomormeja' => $request->nomormeja
            ]);

        return redirect('/meja')->with(['success' => '<strong>' . $meja->nomormeja . '</strong> Telah disimpan']);
        } catch(\Exception $e) {
            //APABILA TERDAPAT ERROR MAKA REDIRECT KE FORM INPUT
            //DAN MENAMPILKAN FLASH MESSAGE ERROR
            return redirect('/meja/new')->with(['error' => $e->getMessage()]);
        }
    }



	public function edit($id)
	{

		$mejas= DB::table('mejas')->where('idmeja',$id)->get();
        return view('meja.edit',['meja' => $mejas]);

	}


	public function update(Request $request, $id)
    {

		DB::table('mejas')->where('idmeja',$id)->update([
	    		'nomormeja' => $request->nomormeja,
	    ]);
	    return redirect('/meja');
    }



	public function destroy($id)
    {
        DB::table('mejas')->where('idmeja',$id)->delete();
        return redirect('/meja');
    }



}
