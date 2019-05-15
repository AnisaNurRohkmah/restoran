@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                                <div class="panel-heading">
                        <h3 class="card-title">Edit Data meja</h3>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                            
                            @foreach($meja as $s)
                        
                        <form action="{{ url('/meja/'.$s->idmeja) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" class="form-control">
                            
                            
                            <div class="form-group">
                                <label for="">MEJA </label>
                                <input type="text" name="nomormeja" class="form-control" value="{{$s->nomormeja}}">
                                <p class="text-danger">{{ $errors->first('sex') }}</p>
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