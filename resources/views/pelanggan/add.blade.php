@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                        <form action="{{ url('/pelanggan') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="namapelanggan" class="form-control {{ $errors->has('namapelanggan') ? 'is-invalid':'' }}" placeholder="Masukkan nama lengkap">
                                <p class="text-danger">{{ $errors->first('namapelanggan') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <input type="text" name="sex" class="form-control {{ $errors->has('sex') ? 'is-invalid':'' }}" placeholder="Laki Laki/ Perempuan">
                                <p class="text-danger">{{ $errors->first('sex') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Alamat</label>
                                <textarea name="alamat" cols="5" rows="5" class="form-control {{ $errors->has('alamat') ? 'is-invalid':'' }}"></textarea>
                                <p class="text-danger">{{ $errors->first('alamat') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="">No Telepon</label>
                                <input type="text" name="telepon" class="form-control">

                            </div>

                            <div class="form-group">
                                <button class="btn btn-danger btn-sm">Simpan</button>
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
