
                        <table border='4'>
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
