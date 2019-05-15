@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">DAFTAR PELANGGAN</h3>
                                      <a href="{{ url('/pelanggan/new') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id Pelanggan </th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Telp</th>
                                    <th>Alamat</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pelanggans as $pelanggan)
                                <tr>
                                    <td>{{$pelanggan->id}}</td>
                                    <td>{{ $pelanggan->namapelanggan }}</td>
                                    <td>{{ $pelanggan->sex }}</td>
                                    <td>{{ $pelanggan->telepon }}</td>
                                    <td>{{ str_limit($pelanggan->alamat, 50) }}</td>
                                    <td>{{ $pelanggan->created_at->format('d-m-Y') }}</td>

                                    <td>
                                        <form action="{{ url('/pelanggan/' . $pelanggan->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE" class="form-control">
                                            <a href="{{ url('/pelanggan/' . $pelanggan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="5">Tidak ada data</td>
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


