@extends('Template UI.layouts.admin-sidebar')

@section('content')
    <h1>Riwayat Transaksi Umroh</h1>


    <table class="content-table">
        <thead>
            <tr>
                <th rowspan="3">id</th>
                <th colspan="5">Jemaah</th>
                <th colspan="5">Paket</th>
                <th colspan="2">Status</th>
                <th rowspan="3">Opsi</th>
            </tr>
            <tr>
                <th rowspan="2">Nama Jemaah</th>
                <th rowspan="2">No Hp</th>
                <th>No KK</th>
                <th>No KTP</th>
                <th>Status Vaksin</th>
                <th>Nama Paket</th>
                <th>Tgl Berangkat</th>
                <th rowspan="2">Fasilitas</th>
                <th>Jasa Travel</th>
                <th rowspan="2">Harga Paket</th>
                <th rowspan="2">Sub Total</th>
                <th>Tgl Transaksi</th>
            </tr>
            <tr>
                <th>Foto KK</th>
                <th>Foto Ktp</th>
                <th>Status Paspor</th>
                <th>Jenis</th>
                <th>Durasi</th>
                <th>CP Travel</th>
                <th>Status Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($data->isEmpty())
                <tr>
                    <td colspan="14" style="text-align: center">Data Kosong</td>
                </tr>
            @else
                @foreach ($data as $row)
                    <tr>
                        <th scope="row" rowspan="2">{{ $row->id }}</th>
                        <td rowspan="2">
                            <ul>
                                @foreach ($jemaahData[$row->id] as $jemaah)
                                    <!-- Menggunakan $row->id sebagai kunci untuk data jemaah -->
                                    <li>{{ $jemaah->nama_jemaah }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td rowspan="2">
                            <ul>
                                @foreach ($jemaahData[$row->id] as $jemaah)
                                    <!-- Menggunakan $row->id sebagai kunci untuk data jemaah -->
                                    <li>{{ $jemaah->No_hp }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            {{ $row->no_kk }}
                        </td>
                        <td>
                            <ul>
                                @foreach ($jemaahData[$row->id] as $jemaah)
                                    <!-- Menggunakan $row->id sebagai kunci untuk data jemaah -->
                                    <li>{{ $jemaah->NIK }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach ($jemaahData[$row->id] as $jemaah)
                                    <!-- Menggunakan $row->id sebagai kunci untuk data jemaah -->
                                    <li>{{ $jemaah->status_vaksin }}</li>
                                @endforeach
                            </ul>
                        </td>
                        <td>{{ $row->nama_paket }}</td>
                        <td>{{ $row->tanggal_berangkat }}</td>
                        <td rowspan="2">
                            <ul>
                                @if ($row->fasilitas1 != null)
                                    <li>
                                        <p>{{ $row->fasilitas1 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas2 != null)
                                    <li>
                                        <p>{{ $row->fasilitas2 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas3 != null)
                                    <li>
                                        <p>{{ $row->fasilitas3 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas4 != null)
                                    <li>
                                        <p>{{ $row->fasilitas4 }}</p>
                                    </li>
                                @else
                                @endif

                                @if ($row->fasilitas5 != null)
                                    <li>
                                        <p>{{ $row->fasilitas5 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas6 != null)
                                    <li>
                                        <p>{{ $row->fasilitas6 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas7 != null)
                                    <li>
                                        <p>{{ $row->fasilitas7 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas8 != null)
                                    <li>
                                        <p>{{ $row->fasilitas8 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas9 != null)
                                    <li>
                                        <p>{{ $row->fasilitas9 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas10 != null)
                                    <li>
                                        <p>{{ $row->fasilitas10 }}</p>
                                    </li>
                                @else
                                @endif

                            </ul>
                        </td>
                        {{-- <td><img src="" height="50px"></td> --}}
                        <td>{{ $row->jasa_travel }}</td>
                        <td rowspan="2">Rp.&nbsp;{{ number_format($row->harga_awal, 0, ',', '.') }},-</td>
                        <td rowspan="2">Rp.&nbsp;{{ number_format($row->harga_total, 0, ',', '.') }},-</td>

                        <td>{{ $row->created_at }}</td>
                        <td rowspan="2">
                            <div class="btn">
                                <a href="#" class="btn-hapus delete" data-id="{{ $row->id }}">Hapus</a>
                                <form action="{{ route('umrohs.approvepayment', $row->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-ekspor">Approve</button>
                                </form>
                            </div>
                        </td>


                    </tr>
                    <tr>
                        <td><img src="{{ asset('fotoUmroh/' . $row->foto_kk) }}" height="50px"></td>
                        <td>
                            <ul>
                                @foreach ($jemaahData[$row->id] as $jemaah)
                                    <!-- Menggunakan $row->id sebagai kunci untuk data jemaah -->

                                    <li>
                                        <img src="{{ asset('fotoUmroh/' . $jemaah->foto_identitas) }}" height="50px">
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach ($jemaahData[$row->id] as $jemaah)
                                    <!-- Menggunakan $row->id sebagai kunci untuk data jemaah -->
                                    <li>{{ $jemaah->status_paspor }}</li>
                                @endforeach
                            </ul>
                        </td>


                        <td>{{ $row->jenis }}</td>
                        <td>{{ $row->durasi }} Hari</td>
                        <td>{{ $row->No_hp_uploader }}</td>
                        <td>{{ $row->status_pembelian }}</td>
                    </tr>
                @endforeach
            @endif



        </tbody>
    </table>
    <script>
        $('.delete').click(function() {
            var inputId = $(this).attr('data-id');
            swal({
                    title: "Anda Yakin?",
                    text: "Data yang di hapus tidak akan bisa dikembalikan",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = "/deletetransaksiumroh/" + inputId;
                        swal("Data Berhasil Di Hapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Berhasil Membatalkan");
                    }
                });
        });

        $(document).ready(function() {
            $('#data-form').submit(function(event) {
                event.preventDefault();
                var inputId = $(this).find('.btn-ekspor').attr('data-id');
                swal({
                    title: "Anda Yakin?",
                    text: "Ketika sudah di etalase, barang tidak dapat kembali",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willAdd) => {
                    if (willAdd) {
                        // Lanjutkan dengan mengirimkan formulir setelah konfirmasi
                        $(this).off("submit").submit();
                    } else {
                        swal("Tambah Etalase Dibatalkan");
                    }
                });
            });
        });
    </script>
@endsection
