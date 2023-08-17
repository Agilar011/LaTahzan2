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
                <th>Status</th>
                <th>Opsi</th>
            </tr>

        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            <tr>
                
            </tr>
        </tbody>
    </table>
@endsection
