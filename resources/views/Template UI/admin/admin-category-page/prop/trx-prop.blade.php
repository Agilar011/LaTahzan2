@extends('Template UI.layouts.admin-sidebar')
@section('content')
    <h1>Riwayat Transaksi Properti</h1>
    <table class="content-table">
        <thead>
            <tr>
                <th rowspan="4">id</th>
                <th colspan="7">Informasi Produk</th>
                <th colspan="2" style="background: rgb(255, 119, 0);">Customer & Admin Information</th>
                <th colspan="2">Action</th>
            </tr>
            <tr>

                <th rowspan="2">Nama Properti</th>
                <th rowspan="2">Pemilik</th>
                <th rowspan="2">Sertifikat</th>
                <th rowspan="3">Foto Properti</th>
                <th>Alamat</th>
                <th rowspan="3">Luas</th>
                <th rowspan="3">Harga</th>
                <th style="background: rgb(255, 119, 0);">Nama Pembeli</th>
                <th rowspan="3" style="background: rgb(255, 119, 0);">PIC Admin</th>
                <th rowspan="1">Tanggal Input</th>
                <th rowspan="3">Opsi</th>
            </tr>


            <tr>

                <th>Kecamatan</th>
                <th style="background: rgb(255, 119, 0);">Ktp Pembeli</th>
                <th rowspan="1">Tanggal Update</th>
            </tr>

            <tr>
                <th rowspan="1">Jenis Properti</th>
                <th>No Telp</th>
                <th>Ktp Pemilik</th>
                <th>Kota</th>
                <th style="background: rgb(255, 119, 0);">No Telp Pembeli</th>
                <th rowspan="1">Status Pembelian</th>
            </tr>

            <tr>

            </tr>
        </thead>

        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($purchasedPropertys as $row)
                <tr>
                    <tr>
                        <th rowspan="4">{{ $row->id }}</th>
                        <td rowspan="2">{{ $row->nama_properti }}</td>
                        <td rowspan="2">{{ $row->upload_by_user_name }}</td>
                        <td rowspan="2"><img src="{{ asset('fotoSertifikat/' . $row->foto_sertifikat) }}" height="50px"></td>
                        <td rowspan="1">
                            <img src="{{ asset('fotoProp1/' . $row->foto1) }}" height="50px">
                        </td>
                        <td>{{ $row->alamat }}</td>
                        <td rowspan="4">{{ $row->luas }}m2</td>
                        <td rowspan="4">Rp.&nbsp;{{ number_format($row->harga, 0, ',', '.') }},-</td>
                        <td rowspan="1">{{ $row->purchased_by_user_name }}</td>
                        <td rowspan="4">{{ $row->approved_by_user_name }}</td>
                        <td rowspan="1">{{ $row->created_at }}</td>
                        <td rowspan="4">
                            <div class="btn">
                                <a href="/tampilkandataoto/{{ $row->id }}" class="btn-update">Update</a>
                                <a href="#" class="btn-hapus delete" data-id="{{ $row->id }}">Hapus</a>
                                <form action="{{ route('properti.approvepayment', $row->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-ekspor">Approve Payment</button>
                                </form>
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td rowspan="1">
                            <img src="{{ asset('fotoProp2/' . $row->foto2) }}" height="50px">
                        </td>
                        <td>{{ $row->kecamatan }}</td>
                        <td> <img src="{{ asset('fotoKtp/' . $row->foto_ktp_purchaser) }}" height="50px"></td>
                        <td rowspan="1">{{ $row->updated_at }}</td>
                    </tr>

                    <tr>
                        <td rowspan="2">{{ $row->jenis }}</td>
                        <td rowspan="2">{{ $row->no_hp_uploader }}</td>
                        <td rowspan="2"><img src="{{ asset('fotoKtp/' . $row->foto_ktp) }}" height="50px"></td>
                        <td rowspan="1">
                            <img src="{{ asset('fotoProp3/' . $row->foto3) }}" height="50px">
                        </td>
                        <td rowspan="2">{{ $row->kota }}</td>
                        <td rowspan="2">{{ $row->purchased_by_user_phone_number }}</td>
                        <td rowspan="2">

                        </td>
                    </tr>

                    <tr>
                        <td><img src="{{ asset('fotoProp4/' . $row->foto4) }}" height="50px"></td>
                    </tr>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
       $('.delete').click(function() {
           var inputId = $(this).attr('data-id');
           swal({
                   title: "Anda Yakin?",
                   text: "Data akan dikembalikan ke Etalase",
                   icon: "warning",
                   buttons: true,
                   dangerMode: true,
               })
               .then((willDelete) => {
                   if (willDelete) {
                       window.location.href = "/deletedataprop/" + inputId;
                       swal("Data Berhasil Di Hapus", {
                           icon: "success",
                       });
                   } else {
                       swal("Berhasil Membatalkan");
                   }
               });
       });
   </script>
@endsection
