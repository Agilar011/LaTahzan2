@extends('layouts.admin-sidebar')

@section('content')
    <h1>Riwayat Transaksi Umroh</h1>


    <table class="content-table">
        <thead>
            <tr>
                <th rowspan="3">id</th>
                <th colspan="4">Jemaah</th>
                <th colspan="5">Paket</th>
                <th colspan="2">Paket</th>
                <th rowspan="3">Opsi</th>
            </tr>
            <tr>
                <th>Nama Jemaah</th>
                <th rowspan="2">No Hp</th>
                <th>No KK</th>
                <th>No KTP</th>
                <th>Nama Paket</th>
                <th>Tgl Berangkat</th>
                <th rowspan="2">Fasilitas</th>
                <th>Jasa Travel</th>
                <th rowspan="2">Harga Paket</th>
                <th rowspan="2">Sub Total</th>
                <th>Tgl Transaksi</th>
            </tr>
            <tr>
                <th>Jumlah Jemaah</th>
                <th>Foto KK</th>
                <th>Foto Ktp</th>
                <th>Jenis</th>
                <th>Durasi</th>
                <th>CP Travel</th>
                <th>Status Transaksi</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <th scope="row"></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><img src="" height="50px"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td rowspan="2">
                    <div class="btn">
                        <a href="" class="btn-hapus">Hapus</a>
                        <a href="" class="btn-ekspor">Approve</a>
                    </div>
                </td>
            </tr>

        </tbody>
    </table>
@endsection
