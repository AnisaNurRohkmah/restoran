@extends('layouts.master')
 
@section('content')
<div class="main">
    <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">DAFTAR MENU</h3>
                                      <a href="{{ url('/menu/new') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-bordered">
                                      <thead>
                                <tr>
                                    <th>Id Menu </th>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                                        <tbody>
                                           @forelse($menus as $menu)

                                    <tr>
                                    <!-- MENAMPILKAN VALUE DARI TITLE -->
                                    <td>{{$menu->id}}</td>
                                    <td>{{ $menu->namamenu }}</td>
                                    <td>Rp {{ number_format($menu->harga) }}</td>
                                    <td>{{ $menu->created_at->format('d-m-Y') }}</td>
                                    <!-- TOMBOL DELETE MENGGUNAKAN METHOD DELETE DALAM ROUTING SEHINGGA KITA MEMASUKKAN TOMBOL TERSEBUT KEDALAM TAG <FORM></FORM> -->
                                    <td>
                                        <form action="{{ url('/menu/' . $menu->id) }}" method="POST">
                                            <!-- @csrf ADALAH DIRECTIVE UNTUK MEN-GENERATE TOKEN CSRF -->
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" class="form-control">
                                            <a href="{{ url('/menu/' . $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="6">Tidak ada data</td>
                                </tr>
                                
                                @endforelse                 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                          
</div>
</div>
</div>
</div>
</div>
@stop

