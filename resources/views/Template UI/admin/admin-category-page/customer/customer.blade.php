@extends('Template UI.layouts.admin-sidebar')
@section('content')
    <h1>Data Customer</h1>


    <table class="content-table">
        <thead>
            <tr>
                <th rowspan="2">id</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">E-mail</th>
                <th rowspan="2">No. Telp</th>
                <th>Alamat</th>
                <th rowspan="2">Tanggal Lahir</th>
                <th>NIK</th>
                <th rowspan="2">Role</th>
                <th rowspan="2">Opsi</th>
            </tr>
            <tr>
                <th>Kota</th>
                <th>Foto Ktp</th>
            </tr>

        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp

            @foreach ($data as $row)
                <tr>
                    <th rowspan="2">{{ $row->id }}</th>
                    <td rowspan="2">{{ $row->name }}</td>
                    <td rowspan="2">{{ $row->email }}</td>
                    <td rowspan="2">{{ $row->phone }}</td>
                    <td>{{ $row->address }}</td>
                    <td rowspan="2">{{ $row->birthdate }}</td>
                    <td>{{ $row->nik }}</td>
                    <td rowspan="2"> {{ $row->role }}</td>
                    <td rowspan="2">
                        <div class="btn">
                            <div class="btn-ekspor">
                                <form action="{{ route('updateRole', ['userId' => $row->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit">
                                        {{ $row->role === 'user' ? 'Ubah Role' : 'Ubah Role' }}
                                    </button>
                                </form>
                            </div>

                            <a href="/hapususer/{{ $row->id }}" class="btn-hapus">Hapus</a>

                        </div>
                    </td>

                    {{-- <div class="btn">
                    <a href="/tampilkandataoto/{{ $row->id }}" class="btn-update">Update</a>
                    <a href="/deletedataoto/{{ $row->id }}" class="btn-hapus">Hapus</a>
                    <form action="{{ route('otomotifs.approve', $row->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-ekspor">+Etalase</button>
                    </form>
                </div> --}}

                </tr>
                <tr>
                    <td>{{ $row->birthplace }}</td>
                    <td>{{ $row->fotoktp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
