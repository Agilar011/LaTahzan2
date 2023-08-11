<x-app-layout>
    {{-- penempatan di layout.app dan navigation-menu --}}
</x-app-layout>
@extends('Template UI.layouts.admin-sidebar')

@section('content')
    <table class="content-table">
        <thead>
            <tr>

                <th rowspan="2">id</th>
                <th rowspan="2">Id Etalase Umroh</th>
                <th>Upload By Admin</th>
                <th>Nama Paket</th>
                <th>Durasi</th>
                <th>Jasa Travel</th>
                <th rowspan="2">Dibeli Oleh Customer</th>
                <th rowspan="2">jumlah Jemaah</th>
                <th rowspan="2">Nama Jemaah</th>
                <th rowspan="2">Aksi</th>
            </tr>
            <tr>
                <th>CP Admin</th>
                <th>Jenis</th>
                <th>Tanggak Keberangkatan</th>
                <th>Maskapai</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td scope="row" rowspan="2">{{ $row->id }}</td>
                    <td rowspan="2">{{ $row->id_etalase_umroh }}</td>
                    <td>{{ $row->upload_by_user_name }}</td>
                    <td>{{ $row->nama_paket }}</td>
                    <td>{{ $row->durasi }} Hari</td>
                    <td>{{ $row->jasa_travel }}</td>
                    <td rowspan="2">{{ $row->purchased_by_user_name }}</td>
                    <td rowspan="2">{{ $row->jumlah_jemaah }}</td>
                    <td rowspan="2">
                        <ul>
                            {{-- @foreach ($jemaah as $jemaah)
                                <li>{{ $jemaah->nama_jemaah }}</li>
                                <br>
                            @endforeach --}}
                        </ul>
                        </td>
                    <td rowspan="2">
                        <div class="btn">
                            <form action="{{ route('umrohs.approvepayment', $row->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-ekspor">Approve</button>
                            </form>
                            </div>
                        </td>
                    </tr>
                <tr>
                    <td>{{ $row->No_hp_uploader}}</td>
                    <td>{{ $row->jenis}}</td>
                    <td>{{ $row->tanggal_berangkat}}</td>
                    <td>{{$row->Maskapai}}</td>
                    </tr>
            @endforeach
        </tbody>
    </table>
@endsection
