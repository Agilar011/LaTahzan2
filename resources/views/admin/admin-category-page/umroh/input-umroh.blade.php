@extends('layouts.admin-sidebar')

@section('content')
<div class="title">
    <h1>Input Umroh</h1>
</div>

<button type="submit" class="btn-tambahdata" onclick="tambahUmroh()"> + Tambah Data</button>

<table class="content-table">
    <thead>
        <tr>
            <th rowspan="2">id</th>
            <th rowspan="2">Nama Paket</th>
            <th rowspan="2">Jenis Paket</th>
            <th rowspan="2">Deskripsi</th>
            <th>Tanggal Berangkat</th>
            <th>Jasa Travel</th>
            <th>Maskapai</th>
            <th rowspan="2">Harga</th>
            <th rowspan="2">Foto</th>
            <th>Tanggal Input</th>
            <th rowspan="2">Opsi</th>
        </tr>
        <tr>
            <th>Durasi</th>
            <th>CP Travel</th>
            <th>Hotel</th>
            <th>Tanggal Update</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <th scope="row" rowspan="2">{{ $row->id }}</th>
            <td rowspan="2">{{ $row->nama_paket }}</td>
            <td rowspan="2">{{ $row->jenis }}</td>
            <td rowspan="2">{{ $row->deskripsi }}</td>
            <td>{{ $row->tanggal_berangkat }}</td>
            <td>{{ $row->jasa_travel }}</td>
            <td>{{ $row->hotel }}</td>
            <td rowspan="2">Rp. {{ $row->harga }},-</td>
            <td rowspan="2"><img src="{{ asset('fotoUmroh/'.$row->foto) }}" height="50px"></td>
            <td>{{ $row->created_at }}</td>
            <td rowspan="2">
                <div class="btn">
                    <a href="/tampilkandataumroh/{{ $row->id }}" class="btn-update">Update</a>
                    <a href="/deletedataumroh/{{ $row->id }}" class="btn-hapus">Hapus</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>{{ $row->durasi }} Hari</td>
            <td>{{ $row->cp_travel }}</td>
            <td>{{ $row->maskapai }}</td>
            <td>{{ $row->updated_at }}</td>
        </tr>

        @endforeach
    </tbody>
</table>

@endsection
