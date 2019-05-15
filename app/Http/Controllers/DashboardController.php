<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
    	$data_user = \App\user::all();	
		return view('dashboard.index', ['data_user' => $data_user]);
    }
}
