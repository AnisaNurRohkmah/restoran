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
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/menu') }}" method="post">
                            
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Menu</label>
                                <input type="text" name="namamenu" class="form-control {{ $errors->has('namamenu') ? 'is-invalid':'' }}" placeholder="Masukkan nama menu">
                            </div>

                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="harga" class="form-control {{ $errors->has('harga') ? 'is-invalid':'' }}">
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



@extends('layouts.master')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Produk</h3>
                    </div>
                    <div class="card-body">
                        <!-- MENAMPILKAN ERROR APABILA TERDAPAT FLASH MESSAGE ERROR -->
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/menu') }}" method="post">
                            
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Menu</label>
                                <input type="text" name="namamenu" class="form-control {{ $errors->has('namamenu') ? 'is-invalid':'' }}" placeholder="Masukkan nama menu">
                            </div>

                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="harga" class="form-control {{ $errors->has('harga') ? 'is-invalid':'' }}">
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
@endsection