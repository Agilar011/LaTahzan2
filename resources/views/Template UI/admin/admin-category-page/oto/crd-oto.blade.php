<x-app-layout>
    {{-- penempatan di layout.app dan navigation-menu --}}
</x-app-layout>


@extends('Template UI.layouts.admin-sidebar')
@section('content')
    <h1>Etalase Otomotif</h1>

    <table class="content-table">
        <thead>
            <tr>
                <th rowspan="3">id</th>
                <th rowspan="2">Nama Produk</th>
                <th rowspan="3">Warna</th>
                <th rowspan="3">Nama Pemilik</th>
                <th rowspan="3">Foto Kendaraan</th>
                <th>Foto BPKB</th>
                <th rowspan="3">Deskripsi (maks. 70 karakter)</th>
                <th rowspan="2">Transmisi</th>
                <th rowspan="2">Tahun</th>
                <th rowspan="1">Alamat</th>
                <th rowspan="3">Harga</th>
                <th rowspan="2">Tanggal Input</th>
                <th rowspan="3">Opsi</th>
            </tr>
            <tr>
                <th>Foto STNK</th>
                <th>Kecamatan</th>
            </tr>
            <tr>
                <th rowspan="1">Merk</th>
                <th>Foto Ktp</th>
                <th>Kapasitas Mesin</th>
                <th>Status</th>
                <th>Kota</th>
                <th>Tanggal Update</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($approvedNotPurchasedOtomotifs as $row)
                <tr>
                    <th scope="row" rowspan="3">{{ $no++ }}</th>
                    <td>{{ $row->nama_kendaraan }} </td>
                    <td rowspan="3">{{ $row->warna }}</td>
                    <td rowspan="3">{{ $row->upload_by_user_name }}</td>
                    <td>
                        <img src="{{ asset('fotoOto/' . $row->foto1) }}" height="50px">
                    </td>
                    <td>
                        <img src="{{ asset('fotoBpkb/' . $row->foto_bpkb) }}" height="50px">
                    </td>
                    <td rowspan="3">
                        @if (strlen($row->deskripsi) > 100)
                            {{ substr($row->deskripsi, 0, 100) }}...
                        @else
                            {{ $row->deskripsi }}
                        @endif
                    </td>
                    {{-- <td>{{ $row->merk }}</td> --}}
                    <td rowspan="2">{{ $row->kapasitas_mesin }}cc</td>
                    <td rowspan="2">{{ $row->tahun }}</td>
                    <td rowspan="1">{{ $row->alamat }}</td>
                    <td rowspan="3">Rp.&nbsp;{{ number_format($row->harga, 0, ',', '.') }},-</td>
                    <td rowspan="1">{{ $row->created_at }}</td>
                    <td rowspan="3">
                        <div class="btn">
                            <a href="/tampilkandataoto/{{ $row->id }}" class="btn-update">Update</a>
                            <a href="#" class="btn-hapus delete" data-id="{{ $row->id }}">Hapus</a>
                            {{-- <a href="#" class="btn-hapus delete" data-id="{{ $row->id}}">Hapus</a> --}}
                            {{-- <form action="{{ route('otomotifs.purchased', $row->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn-ekspor">Purchase</button>
                            </form> --}}
                        </div>
                    </td>
                </tr>

                <tr>
                    <td rowspan="2">{{ $row->merk }}</td>
                    <td>
                        <img src="{{ asset('fotoOto2/' . $row->foto2) }}" height="50px">
                    </td>
                    <td>
                        <img src="{{ asset('fotoStnk/' . $row->foto_stnk) }}" height="50px">
                    </td>
                    <td rowspan="1">{{ $row->kecamatan }}</td>
                    <td rowspan="2">{{ $row->updated_at }}-</td>

                </tr>

                <tr>
                    <td>
                        <img src="{{ asset('fotoOto3/' . $row->foto3) }}" height="50px">
                    </td>
                    <td>
                        <img src="{{ asset('fotoKtp/' . $row->foto_ktp) }}" height="50px">
                    </td>
                    <td rowspan="1">{{ $row->transmisi }}</td>
                    <td rowspan="1">{{ $row->status }}</td>
                    <td rowspan="1">{{ $row->kota }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $('.delete').click(function() {
            var inputId = $(this).attr('data-id');
            swal({
                    title: "Anda Yakin?",
                    text: "Data yang di hapus tidak akan bisa dikembalikan ",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = "/deletedataoto/" + inputId;
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
