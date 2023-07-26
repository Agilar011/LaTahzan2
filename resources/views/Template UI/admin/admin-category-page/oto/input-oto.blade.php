<x-app-layout>
    {{-- penempatan di layout.app dan navigation-menu --}}
    </x-app-layout>
@extends('Template UI.layouts.admin-sidebar')

@section('content')
    <h1>Input Otomotif</h1>

    <button type="submit" class="btn-tambahdata" onclick="tambahOto()"> + Tambah Data</button>

    <table class="content-table">
        <thead>
            <tr>
                <th rowspan="2">id</th>
                <th>Nama Produk</th>
                <th rowspan="2">Warna</th>
                <th rowspan="2">Foto Kendaraan</th>
                <th>Foto BPKB</th>
                <th rowspan="2">Deskripsi (maks. 70 karakter)</th>
                <th>Transmisi</th>
                <th>Tahun</th>
                <th rowspan="2">Lokasi</th>
                <th rowspan="2">Harga</th>
                <th>Tanggal Input</th>
                <th rowspan="2">Opsi</th>
            </tr>
            <tr>
                <th>Merk</th>
                <th>Foto STNK</th>
                <th>Kapasitas Mesin</th>
                <th>Status</th>
                <th>Tanggal Update</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $row)
            <tr>
                <th scope="row" rowspan="3">{{ $no++ }}</th>
                <td>{{ $row->nama_kendaraan }}  </td>
                <td rowspan="3">{{ $row->warna }}</td>
                <td>
                    <img src="{{ asset('fotoOto/'.$row->foto1) }}" height="50px">
                </td>
                <td rowspan="1"></td>
                <td rowspan="3">{{ $row->deskripsi }}</td>
                {{-- <td>{{ $row->merk }}</td> --}}
                <td rowspan="2">{{ $row->kapasitas_mesin }}cc</td>
                <td rowspan="2">{{ $row->tahun }}</td>
                <td rowspan="3">{{ $row->lokasi }}</td>
                <td rowspan="3">Rp. {{ $row->harga }},-</td>
                <td rowspan="1">{{ $row->created_at }}</td>
                <td rowspan="3">
                    <div class="btn">
                        <a href="/tampilkandataoto/{{ $row->id }}" class="btn-update">Update</a>
                        <a href="/deletedataoto/{{ $row->id }}" class="btn-hapus">Hapus</a>
                        @if ($row->approved_by_user_id === null)
                        <form action="{{ route('otomotifs.approve', $row->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-approved">Approve</button>
                        </form>
                    @else
                        <button class="btn-approved">Approved by User {{ $row->approved_by_user_id }}</button>
                    @endif
                    </div>
                </td>
            </tr>

            <tr>
                <td rowspan="2">{{ $row->merk }}</td>
                <td>
                    <img src="{{ asset('fotoOto2/'.$row->foto2) }}" height="50px">
                </td>
                <td rowspan="2"></td>
                <td rowspan="2">{{ $row->updated_at }}-</td>

            </tr>

            <tr>
                <td>
                    <img src="{{ asset('fotoOto3/'.$row->foto3) }}" height="50px">
                </td>
                <td rowspan="1">{{ $row->transmisi }}</td>
                <td rowspan="1">{{ $row->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
