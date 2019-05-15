@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                        <div class="panel-heading">
                            
                          <form method="GET" action="/pelanggan">
                            @if(auth()->user()->role == 'owner')
                             <a href="/transaksi/exportpdf" class="btn btn-primary">CETAK SEMUA</a>
                             @endif
                            <h3 class="panel-title">DAFTAR TRANSAKSI</h3>

                          </form>

                        </div>
                </div>
                
            </div>

            <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {!! session('success') !!}
                        </div>
                    @endif

                    <table class="table table-hover table-bordered">
                       <thead>
                            <tr>
                                    <th>No</th>
                                    <th>Id Pesanan</th>
                                    <th>Nama Menu</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Jumlah</th>
                                    <th>Total </th>
                                    <th>Bayar</th>
                                    <th> Sisa </th>
                                    <th> Tanggal</th>

                            </tr>
                       </thead>
     
                       <tbody>
                               {{ $no = 1 }}
                                    @forelse($transaksis as $transaksi)

                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$transaksi->pesanan_id}}</td>
                                    <td>{{$transaksi->namamenu}}</td>
                                    <td>{{ $transaksi->namapelanggan }}</td>
                                    <td>{{ number_format($transaksi->jumlah) }}</td>
                                    <td>Rp{{ $transaksi->total}}</td>
                                    <td>Rp{{ $transaksi->bayar}}</td>
                                    <td> Rp {{ $transaksi->bayar - $transaksi->total }}</td>
                                    <td>{{ $transaksi->created_at->format('d-m-Y') }}</td>
                                    <!-- TOMBOL DELETE MENGGUNAKAN METHOD DELETE DALAM ROUTING SEHINGGA KITA MEMASUKKAN TOMBOL TERSEBUT KEDALAM TAG <FORM></FORM> -->
                                    <td>
                                        <form action="{{ url('/transaksi/' . $transaksi->id) }}" method="POST">
                                            <!-- @csrf ADALAH DIRECTIVE UNTUK MEN-GENERATE TOKEN CSRF -->
                                            @csrf

                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="6">Tidak ada data</td>
                                </tr>
                                
                                @endforelse                                

                        </tbody>
                    </table>
                 </div>
           </div>
       </div>
         <div class="panel">
                                <div id="chartmenu"></div>  
                            </div>
   </div>
</div>

@stop

@section('footer')

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('chartmenu', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Penjualan Menu Makanan'
    },
    xAxis: {
        categories:{!!json_encode($categories)!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'jumlah (porsi)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} porsi</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Menu',
        data: {!!json_encode($data)!!}

    }]
});
</script>

@stop