<x-app-layout>
    {{-- penempatan di layout.app dan navigation-menu --}}
</x-app-layout>
@extends('Template UI.layouts.admin-sidebar')

@section('content')
    <h1>Riwayat Transaksi Umroh</h1>


    <table class="content-table">
        <thead>
            <tr>
                <th rowspan="3">id</th>
                <th colspan="5">Jemaah</th>
                <th colspan="5">Paket</th>
                <th colspan="2">Paket</th>
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
                        @foreach ($jemaahData[$row->id] as $jemaah) <!-- Menggunakan $row->id sebagai kunci untuk data jemaah -->
                        <li>{{ $jemaah->nama_jemaah }}</li>
                    @endforeach
                    </ul>
                </td>
                <td rowspan="2">
                    <ul>
                        @foreach ($jemaahData[$row->id] as $jemaah) <!-- Menggunakan $row->id sebagai kunci untuk data jemaah -->
                        <li>{{ $jemaah->No_hp }}</li>
                    @endforeach
                    </ul>
                </td>
                <td>
                    {{ $row->no_kk }}
                </td>
                <td>
                    <ul>
                        @foreach ($jemaahData[$row->id] as $jemaah) <!-- Menggunakan $row->id sebagai kunci untuk data jemaah -->
                        <li>{{ $jemaah->NIK }}</li>
                    @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($jemaahData[$row->id] as $jemaah) <!-- Menggunakan $row->id sebagai kunci untuk data jemaah -->
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

                </ul></td>
                {{-- <td><img src="" height="50px"></td> --}}
                <td>{{ $row->jasa_travel }}</td>
                <td rowspan="2">{{ $row->harga_awal }}</td>
                <td rowspan="2">{{ $row->harga_total }}</td>
                <td>{{ $row->created_at }}</td>
                <td rowspan="2">
                    <div class="btn">
                        <a href="" class="btn-hapus">Hapus</a>
                        <a href="" class="btn-ekspor">Approve</a>
                    </div>
                </td>


            </tr>
            <tr>
                <td><img src="{{ asset('fotoUmroh/'.$row->foto_kk) }}" height="50px"></td>
                <td>
                    <ul>
                        @foreach ($jemaahData[$row->id] as $jemaah) <!-- Menggunakan $row->id sebagai kunci untuk data jemaah -->

                        <li>
                            <img src="{{ asset('fotoUmroh/'.$jemaah->foto_identitas) }}" height="50px"></li>
                    @endforeach
                    </ul>
                </td>
                <td>
                    <ul>
                        @foreach ($jemaahData[$row->id] as $jemaah) <!-- Menggunakan $row->id sebagai kunci untuk data jemaah -->
                        <li>{{ $jemaah->status_paspor }}</li>
                    @endforeach
                    </ul>
                </td>


                <td>{{ $row->jenis }}</td>
                <td>{{ $row->durasi }} Hari</td>
                <td>{{ $row->No_hp_uploader}}</td>
                <td>{{ $row->status_pembelian }}</td>
            </tr>

            @endforeach

            @endif



        </tbody>
    </table>
@endsection

