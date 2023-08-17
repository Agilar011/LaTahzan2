@extends('Template UI.layouts.admin-sidebar')
@section('content')
    <h1>Data Customer</h1>


    <table class="content-table">
        <thead>
            <tr>
                <th>id</th>
                <th>Nama</th>
                <th>E-mail</th>
                <th>Alamat</th>
                <th>No. Telp</th>
                <th>NIK</th>
                <th>Foto Ktp</th>
                <th>Role</th>
                <th>Opsi</th>
            </tr>

        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp

            @foreach ($data as $row)
            <tr>
                <td>{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->address }}</td>
                <td>{{ $row->phone }}</td>
                <td>{{ $row->nik }}</td>
                <td>{{ $row->fotoktp }}</td>
                <td>{{ $row->role }}</td>
                <td>
                    <form action="{{ route('updateRole', ['userId' => $row->id]) }}" method="POST">
                        @csrf
                        <button type="submit">
                            {{ $row->role === 'user' ? 'Make Admin' : 'Make User' }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
