@extends('layouts.admin-sidebar')

@section('content')
<div class="title">
    <h1>Input Umroh</h1>
</div>

<button type="submit" class="btn-tambahdata" onclick="tambahUmroh()"> + Tambah Data</button>

<table class="content-table">
    <thead>
        <tr>
            <th>id</th>
            <th>Nama Paket</th>
            <th>Jenis Paket</th>
            <th>Tanggal Berangkat</th>
            <th>Durasi</th>
            <th>Jasa Travel</th>
            <th>CP Travel</th>
            <th>Hotel</th>
            <th>Maskapai</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Tanggal Input</th>
            <th>Tanggal Update</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <th scope="row">{{ $row->id }}</th>
            <td>{{ $row->nama_paket }}</td>
            <td>{{ $row->jenis }}</td>
            <td>{{ $row->tanggal_berangkat }}</td>
            <td>{{ $row->durasi }}</td>
            <td>{{ $row->jasa_travel }}</td>
            <td>{{ $row->cp_travel }}</td>
            <td>{{ $row->hotel }}</td>
            <td>{{ $row->maskapai }}</td>
            <td>Rp. {{ $row->harga }},-</td>
            <td>{{ $row->foto }}</td>
            <td>{{ $row->created_at }}</td>
            <td>{{ $row->updated_at }}</td>
            <td>
                <div class="btn">
                    <a href="/tampilkandataumroh/{{ $row->id }}" class="btn-update">Update</a>
                    <a href="/deletedataumroh/{{ $row->id }}" class="btn-hapus">Hapus</a>
                </div>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>

@endsection
