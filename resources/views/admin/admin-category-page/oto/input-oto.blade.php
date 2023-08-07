@extends('layouts.admin-sidebar')

@section('content')
    <h1>Input Otomotif</h1>

    <a href="/tambahOto" class="btn-tambahdata"> + Tambah Produk</a>

    <table class="content-table">
        <thead>
            <tr>
                <th rowspan="3">id</th>
                <th rowspan="2">Nama Produk</th>
                <th rowspan="3">Warna</th>
                <th rowspan="3">Foto Kendaraan</th>
                <th>Foto BPKB</th>
                <th rowspan="3">Deskripsi (maks. 70 karakter)</th>
                <th rowspan="2">Transmisi</th>
                <th rowspan="2">Tahun</th>
                <th rowspan="1">Alamat</th>
                <th rowspan="3">Harga</th>
                <th rowspan="2">Tanggal Input</th>
                <th rowspan="3">Opsi</th>
            </tr>
            <tr>
                <th>Foto STNK</th>
                <th>Kecamatan</th>
            </tr>
            <tr>
                <th rowspan="1">Merk</th>
                <th>Foto Ktp</th>
                <th>Kapasitas Mesin</th>
                <th>Status</th>
                <th>Kota</th>
                <th>Tanggal Update</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $row)
                @if ($data->status_step = "etalase")
                    <tr>
                        <th scope="row" rowspan="3">{{ $no++ }}</th>
                        <td>{{ $row->nama_kendaraan }} </td>
                        <td rowspan="3">{{ $row->warna }}</td>
                        <td>
                            <img src="{{ asset('storage/fotoOto/' . $row->foto1) }}" height="50px">
                        </td>
                        <td>
                            <img src="{{ asset('fotoBpkb/' . $row->foto_bpkb) }}" height="50px">
                        </td>
                        <td rowspan="3">{{ $row->deskripsi }}</td>
                        {{-- <td>{{ $row->merk }}</td> --}}
                        <td rowspan="2">{{ $row->kapasitas_mesin }}cc</td>
                        <td rowspan="2">{{ $row->tahun }}</td>
                        <td rowspan="1">{{ $row->alamat }}</td>
                        <td rowspan="3">Rp. {{ $row->harga }},-</td>
                        <td rowspan="1">{{ $row->created_at }}</td>
                        <td rowspan="3">
                            <div class="btn">
                                <a href="/tampilkandataoto/{{ $row->id }}" class="btn-update">Update</a>
                                <a href="/deletedataoto/{{ $row->id }}" class="btn-hapus">Hapus</a>
                                <a href="/updatestatusoto/{{ $row->id }}" class="btn-ekspor">+Etalase</a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td rowspan="2">{{ $row->merk }}</td>
                        <td>
                            <img src="{{ asset('fotoOto2/' . $row->foto2) }}" height="50px">
                        </td>
                        <td>
                            <img src="{{ asset('fotoStnk/' . $row->foto_stnk) }}" height="50px">
                        </td>
                        <td rowspan="1">{{ $row->kecamatan }}</td>
                        <td rowspan="2">{{ $row->updated_at }}-</td>

                    </tr>

                    <tr>
                        <td>
                            <img src="{{ asset('fotoOto3/' . $row->foto3) }}" height="50px">
                        </td>
                        <td>
                            <img src="{{ asset('fotoKtp/' . $row->foto_ktp) }}" height="50px">
                        </td>
                        <td rowspan="1">{{ $row->transmisi }}</td>
                        <td rowspan="1">{{ $row->status }}</td>
                        <td rowspan="1">{{ $row->kota }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
