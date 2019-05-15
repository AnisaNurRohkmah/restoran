@extends('layouts.master')
@section('content')
<div class="main">
    <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">EDIT DAFTAR MENU</h3>
                                      <a href="{{ url('/menu/new') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                                </div>
                                <div class="panel-body">
                                                            @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

     <form action="{{ url('/menu/' . $menus->id) }}" method="post">
                            @csrf
                            <!-- KARENA METHOD YANG AKAN DIGUNAKAN ADALAH PUT -->
                            <!-- MAKA KITA PERLU MENGIRIMKAN PARAMETER DENGAN NAME _method -->
                            <!-- DAN VALUE PUT -->
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            <div class="form-group">
                                <label for="">Nama Produk</label>
                                <input type="text" name="namamenu" class="form-control" value="{{ $menus->namamenu }}" placeholder="Masukkan nama produk">
                            </div>

                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="number" name="harga" class="form-control" value="{{ $menus->harga }}">
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">Update</button>
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


