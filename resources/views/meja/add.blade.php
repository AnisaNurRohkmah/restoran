@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">meja BARU</h3>
                         <form action="{{ url('/meja') }}" method="post">
                            
                            @csrf
                            <div class="form-group">
                                <label for="">Nomoor Meja</label>
                                <input type="number" name="nomormeja" class="form-control" placeholder="Masukkan nomormeja">
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
