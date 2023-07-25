@extends('layouts.admin-sidebar')

@section('content')
<h1>Input Properti</h1>

<button type="submit" class="btn-tambahdata" onclick="tambahProp()"> + Tambah Data</button>

<table class="content-table">
    <thead>
        <tr>
            <th>id</th>
            <th>Nama Properti</th>
            <th>Jenis Properti</th>
            <th>Foto</th>
            <th>Foto</th>
            <th>Foto</th>
            <th>Foto Sertifikat</th>
            <th>Deskripsi (maks. 70 karakter)</th>
            <th>Alamat</th>
            <th>Kecamatan</th>
            <th>Kota Lokasi</th>
            <th>Luas</th>
            <th>Harga</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            <th scope="row">{{ $row->id }}</th>
            <td>{{ $row->nama_properti }}</td>
            <td>{{ $row->jenis }}</td>
            <td>{{ $row->foto1 }}</td>
            <td>{{ $row->foto2 }}</td>
            <td>{{ $row->foto3 }}</td>
            <td>{{ $row->foto_sertifikat }}</td>
            <td>{{ $row->deskripsi }}</td>
            <td>{{ $row->alamat }}</td>
            <td>{{ $row->kecamatan }}</td>
            <td>{{ $row->kota }}</td>
            <td>{{ $row->luas }}m2</td>
            <td>Rp. {{ $row->harga }},-</td>
            <td>
                <div class="btn">
                    <a href="" class="btn-update">Update</a>
                    <a href="" class="btn-hapus">Hapus</a>
                </div>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
@endsection
