@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">TAMBAH DAFTAR TRANSAKSI</h3>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ url('/transaksi/create') }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for=""> Id Pesanan</label>
                                    <select class="form-control" name="pesanan_id"><option value=""> Kode Pesanan </option>
                                    @foreach($pesanans as $k)
                                        <option value="1">gff</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Total </label>
                                <input type="text" name="total" class="form-control">
                                <p class="text-danger">{{ $errors->first('sex') }}</p>
                            </div>

                            <div class="form-group">
                                <label for="">Bayar</label>
                                <input type="text" name="bayar" class="form-control">
                                <p class="text-danger">{{ $errors->first('sex') }}</p>
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
