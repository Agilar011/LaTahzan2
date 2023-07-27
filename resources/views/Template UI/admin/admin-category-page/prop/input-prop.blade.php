<x-app-layout>
    {{-- penempatan di layout.app dan navigation-menu --}}
    </x-app-layout>
@extends('Template UI.layouts.admin-sidebar')

@section('content')
    <h1>Input Properti</h1>
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
                <th>Luas Tanah</th>
                <th>Luas Bangunan</th>
                <th>Harga</th>
                <th>Tanggal Input</th>
                <th>Tanggal Update</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
                <th scope="row">{{ $row->id }}</th>
                <td>{{ $row->nama_property }}</td>
                <td>{{ $row->jenis }}</td>
                <td><img src="{{ asset('fotoProp1/'.$row->foto1) }}" height="50px"></td>
                <td><img src="{{ asset('fotoProp2/'.$row->foto2) }}" height="50px"></td>
                <td><img src="{{ asset('fotoProp3/'.$row->foto3) }}" height="50px"></td>
                <td><img src="{{ asset('fotoSertifikat/'.$row->foto_sertifikat) }}" height="50px"></td>
                <td>{{ $row->deskripsi }}</td>
                <td>{{ $row->alamat }}</td>
                <td>{{ $row->kecamatan }}</td>
                <td>{{ $row->kota }}</td>
                <td>{{ $row->luas_tanah }}m2</td>
                <td>{{ $row->luas_bangunan }}m2</td>
                <td>Rp. {{ $row->harga }},-</td>
                <td>{{ $row->created_at }}</td>
                <td>{{ $row->updated_at }}</td>
                <td>
                    <div class="btn">
                        <a href="/tampilkandataprop/{{ $row->id }}" class="btn-update">Update</a>
                        <a href="/deletedataprop/{{ $row->id }}" class="btn-hapus">Hapus</a>
                        @if ($row->approved_by_user_id === null)
                        <form action="{{ route('propertys.approve', $row->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-approved">Approve</button>
                        </form>
                    @else
                        <button class="btn-approved">Approved by User {{ $row->approved_by_user_id }}</button>
                    @endif
                    </div>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
@endsection
