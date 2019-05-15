@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">EDUT PELANGGAN</h3>
                          <a href="{{ url('/menu/new') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                            </div>
                                <div class="panel-body">

                        <form action="{{ url('/pelanggan/' . $pelanggan->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="namapelanggan" class="form-control {{ $errors->has('namapelanggan') ? 'is-invalid':'' }}" value="{{ $pelanggan->namapelanggan }}" placeholder="Masukkan nama lengkap">
                                <p class="text-danger">{{ $errors->first('namapelanggan') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" name="sex" class="form-control {{ $errors->has('sex') ? 'is-invalid':'' }}" value="{{ $pelanggan->sex }}" placeholder="Laki Laki/ Perempuan">
                                <p class="text-danger">{{ $errors->first('namapelanggan') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" cols="5" rows="5" class="form-control {{ $errors->has('alamat') ? 'is-invalid':'' }}">{{ $pelanggan->alamat }}</textarea>
                                <p class="text-danger">{{ $errors->first('alamat') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="">No Telepon</label>
                                <input type="text" name="telepon" class="form-control {{ $errors->has('telepon') ? 'is-invalid':'' }}" value="{{ $pelanggan->telepon }}">
                                <p class="text-danger">{{ $errors->first('telepon') }}</p>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-danger btn-sm">Update</button>
                            </div>
                        </form>
                                </div>
                            </div>
</div>
</div>
</div>
</div>
</div>
@stop
