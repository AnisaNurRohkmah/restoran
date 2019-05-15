@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                                <div class="panel-heading"> 
                                    <h3 class="panel-title">DAFTAR PESANAN</h3>
                                    @if(auth()->user()->role == 'waiter')
                                      <a href="{{ url('/pesanan/new') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                                    @endif
                                    
                                </div>
                                <div class="panel-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                  
                                    <th>Menu</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Jumlah</th>
                                    <th> Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
 
                                @forelse($pesanans as $pesanan)

                                    <tr>
                                    <!-- MENAMPILKAN VALUE DARI TITLE -->
                                    <td> {{$pesanan->namamenu}}</td>
                                    <td>{{ $pesanan->namapelanggan }}</td>
                                    <td>{{ number_format($pesanan->jumlah) }}</td>

                                    <td>{{ $pesanan->created_at->format('d-m-Y') }}</td>
                                    <!-- TOMBOL DELETE MENGGUNAKAN METHOD DELETE DALAM ROUTING SEHINGGA KITA MEMASUKKAN TOMBOL TERSEBUT KEDALAM TAG <FORM></FORM> -->
                                    <td>
                                        <form action="{{ url('/pesanan/' . $pesanan->idpesanan) }}" method="POST">
                                            <!-- @csrf ADALAH DIRECTIVE UNTUK MEN-GENERATE TOKEN CSRF -->
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" class="form-control">
                                            @if(auth()->user()->role == 'kasir')
                                            <a href="{{ url('/pesanan/transaksi/' . $pesanan->idpesanan) }}" class="btn btn-warning btn-sm">transaksi</a>
                                            @endif

                                            @if(auth()->user()->role == 'waiter')
                                            <a href="{{ url('/pesanan/' . $pesanan->idpesanan) }}" class="btn btn-warning btn-sm">Edit</a>
                                             
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                            @endif
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
