@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                                <div class="panel-heading">
                        <h3 class="card-title">Edit Data Pesanan</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
 @foreach($pesanan as $s)
                        <form action="{{ url('/pesanan/'.$s->idpesanan) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            
                            <div class="form-group">
                                <label for=""> Menu</label>
                                    <select class="form-control" name="menu_id"><option value=""> pilih menu </option>
                                    @foreach($menus as $k)
                                        <option value="{{$k->id}}">{{$k->namamenu}}</option>
                                    @endforeach
                                </select>
                            </div>


                           <div class="form-group">
                                <label for=""> Nama Pelanggan</label>
                                    <select class="form-control" name="pelanggan_id"><option value=""> pilih pelanggan </option>
                                    @foreach($pelanggans as $k)
                                        <option value="{{$k->id}}">{{$k->namapelanggan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="">Jumlah </label>
                                <input type="text" name="jumlah" class="form-control" value="{{$s->jumlah}}">
                                <p class="text-danger">{{ $errors->first('sex') }}</p>
                            </div>

                            <div class="form-group">
                                <label for=""> Nama User</label>
                                    <select class="form-control" name="user_id"><option value=""> pilih user </option>
                                   @foreach($users as $k)
                                        <option value="{{$k->id}}">{{$k->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-danger btn-sm">Update</button>
                            </div>
                        </form>
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection