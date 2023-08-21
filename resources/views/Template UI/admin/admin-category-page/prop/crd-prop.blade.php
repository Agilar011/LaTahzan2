@php
use App\Models\Properti;
@endphp

    @extends('Template UI.layouts.admin-sidebar')
    @section('content')
    <div class="title">
        <div class="title">
            <h1>Etalase Properti</h1>
        </div>
    </div>

    <table class="content-table">
        <thead>
            <tr>
                <th rowspan="3">id</th>
                <th rowspan="3">Nama Properti</th>
                <th rowspan="3">Jenis Properti</th>
                <th rowspan="3">Foto Rumah</th>
                <th rowspan="2">Foto Sertifikat</th>
                <th rowspan="3">Deskripsi (maks. 70 karakter)</th>
                <th>Alamat</th>
                <th rowspan="3">Luas</th>
                <th rowspan="3">Harga</th>
                <th rowspan="2">Tanggal Input</th>
                <th rowspan="3">Opsi</th>
            </tr>
            <tr>
                <th>Kecamatan</th>
            </tr>
            <tr>
                <th rowspan="1">Foto Ktp</th>
                <th>Kota</th>
                <th rowspan="1">Tanggal Update</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($approvedNotPurchasedPropertys as $row)
            <tr>
                <th scope="row" rowspan="3">{{ $row->id }}</th>
                <td rowspan="3">{{ $row->nama_properti }}</td>
                <td rowspan="3">{{ $row->jenis }}</td>
                <td><img src="{{ asset('fotoProp1/'.$row->foto1) }}" height="50px"></td>
                <td rowspan="2"><img src="{{ asset('fotoSertifikat/'.$row->foto_sertifikat) }}" height="50px"></td>
                <td rowspan="3">{{ $row->deskripsi }}</td>
                <td>{{ $row->alamat }}</td>
                <td rowspan="3">{{ $row->luas }}m2</td>
                <td rowspan="3">Rp.&nbsp;{{ number_format($row->harga, 0, ',', '.') }},-</td>
                <td rowspan="2">{{ $row->created_at }}</td>

                <td rowspan="3">
                    <div class="btn">
                        <a href="/tampilkandataprop/{{ $row->id }}" class="btn-update">Update</a>
                        <a href="#" class="btn-hapus delete" data-id="{{ $row->id }}">Hapus</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td><img src="{{ asset('fotoProp2/'.$row->foto2) }}" height="50px"></td>
                <td>{{ $row->kecamatan }}</td>
            </tr>
            <tr>
                <td><img src="{{ asset('fotoProp3/'.$row->foto3) }}" height="50px"></td>
                <td rowspan="1"><img src="{{ asset('fotoKtp/'.$row->foto_ktp) }}" height="50px"></td>
                <td>{{ $row->kota }}</td>
                <td rowspan="1">{{ $row->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $('.delete').click(function(){
    var inputId = $(this).attr('data-id');
    swal({
        title: "Anda Yakin?",
        text: "Data yang di hapus tidak akan bisa dikembalikan",
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
