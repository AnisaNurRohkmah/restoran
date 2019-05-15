@extends('layouts.master')
 
@section('content')
<div class="main">
  <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                            <h3 class="card-title">transaksi</h3>
                    </div>
                    
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        
                         @foreach($pesanan as $s)
                            <form action="{{ url('/pesanan/transaksi1') }}" method="post">
                                @csrf
                            
                                <div class="form-group">
                                    <label for="">pesanan </label>
                                    <input type="text" name="pesanan_id" class="form-control" value="{{$s->idpesanan}}" readonly>
                                    <p class="text-danger">{{ $errors->first('sex') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="">Jumlah </label> 
                                    <input type="text" name="jumlah" class="form-control" value="{{$s->jumlah}}" readonly>
                                    <p class="text-danger">{{ $errors->first('sex') }}</p>
                                </div>
   
                                <div class="form-group">
                                    <label for="">harga </label>
                                     @foreach($pesan as $d)         
                                       <input type="text" name="total" class="form-control" value="{{$s->jumlah * $d->harga}}" readonly>
                                    @endforeach
                                    <p class="text-danger">{{ $errors->first('sex') }}</p>
                                </div>
    
                                <div class="form-group">
                                    <label for="">bayar </label>
                                    <input type="text" name="bayar" class="form-control" >
                                    <p class="text-danger">{{ $errors->first('sex') }}</p>
                                </div>
                          
                                
                                <div class="form-group">
                                    <button class="btn btn-danger btn-sm">Transaksi</button>
                                </div>
                        </form>
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection