<x-app-layout>
    {{-- penempatan di layout.app dan navigation-menu --}}
    </x-app-layout>
@extends('Template UI.layouts.admin-sidebar')

@section('content')
<div class="title">
    <h1>Input Umroh</h1>
</div>

<table class="content-table">
    <thead>
        <tr>
            <th rowspan="2">id</th>
            <th rowspan="2">Nama Paket</th>
            <th rowspan="2">Jenis Paket</th>
            <th rowspan="2">Deskripsi</th>
            <th>Tanggal Berangkat</th>
            <th>Nama Admin</th>
            <th>Maskapai</th>
            <th>Jasa Travel</th>
            <th rowspan="2">Foto</th>
            <th>Tanggal Input</th>
            <th rowspan="2">Opsi</th>
        </tr>
        <tr>
            <th>Durasi</th>
            <th>CP Admin</th>
            <th>Hotel</th>
            <th>Harga</th>
            <th>Tanggal Update</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($showApprovedNotPurchasedUmrohs as $row)
        <tr>
            <th scope="row" rowspan="2">{{ $row->id }}</th>
            <td rowspan="2">{{ $row->nama_paket }}</td>
            <td rowspan="2">{{ $row->jenis }}</td>
            <td rowspan="2">{{ $row->deskripsi }}</td>
            <td>{{ $row->tanggal_berangkat }}</td>
            <td>{{ $row->upload_by_user_name }}</td>
            <td>{{ $row->Maskapai }}</td>
            <td>{{ $row->jasa_travel }},-</td>
            <td rowspan="2"><img src="{{ asset('fotoUmroh/'.$row->thumbnail) }}" height="50px"></td>
            <td>{{ $row->created_at }}</td>
            <td rowspan="2">
                <div class="btn">
                    <a href="/tampilkandataumroh/{{ $row->id }}" class="btn-update">Update</a>
                    <a href="/deletedataumroh/{{ $row->id }}" class="btn-hapus">Hapus</a>
                    <form action="{{ route('konfirmasi-umroh', $row->id) }}" method="GET">
                        @csrf
                        <button type="submit" class="btn-ekspor">Purchase</button>
                    </form>


                </div>
            </td>
        </tr>
        <tr>
            <td>{{ $row->durasi }} Hari</td>
            <td>{{ $row->No_hp_uploader }}</td>
            <td>{{ $row->Hotel }}</td>
            <td>Rp. {{ $row->harga_awal }}</td>
            <td>{{ $row->updated_at }}</td>
        </tr>

        @endforeach
    </tbody>
</table>

@endsection
