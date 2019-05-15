@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">PESANAN BARU</h3>
                        <form action="{{ url('/pesanan') }}" method="post">
                            @csrf
                            
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
                                <input type="text" name="jumlah" class="form-control">
                                <p class="text-danger">{{ $errors->first('sex') }}</p>
                            </div>

                            <div class="form-group">
                                <label for=""> Nama User</label>
                                    <select class="form-control" name="user_id"><option value=""> pilih user </option>
                                        <!-- <option value="1">raisa </option>
                                        <option value="2">alisia </option> -->
                                   @foreach($users as $k)
                                        <option value="{{$k->id}}">{{$k->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button class=" red btn btn-danger btn-sm">Simpan</button>
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
