@extends('Template UI.layouts.admin-sidebar')

@section('content')
    <div class="title">
        <h1>Input Umroh</h1>
    </div>

    <a href="/tambahUmroh" class="btn-tambahdata"> + Tambah Produk</a>

    <table class="content-table">
        <thead>
            <tr>
                <th rowspan="2">id</th>
                <th rowspan="2">Nama Paket</th>
                <th>Jenis Paket</th>
                <th rowspan="2">Fasilitas</th>

                <th>Tanggal Berangkat</th>
                <th>Nama Admin</th>
                <th>Maskapai</th>
                <th>Jasa Travel</th>
                <th rowspan="2">Foto</th>
                <th>Tanggal Input</th>
                <th rowspan="2">Opsi</th>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <th>Durasi</th>
                <th>CP Admin</th>
                <th>Hotel</th>
                <th>Harga</th>
                <th>Tanggal Update</th>
            </tr>
        </thead>
        <tbody>
            @if ($data->isEmpty())
                <tr>
                    <td colspan="14" style="text-align: center">Data Kosong</td>
                </tr>
            @else
                @foreach ($data as $row)
                    <tr>
                        <th scope="row" rowspan="2">{{ $row->id }}</th>
                        <td rowspan="2">{{ $row->nama_paket }}</td>
                        <td>{{ $row->jenis }}</td>
                        <td rowspan="2" class="fasilitas-kolom">

                            <ul>
                                <li>
                                    @if ($row->fasilitas1 != null)
                                        {{ $row->fasilitas1 }}
                                    @else
                                    @endif
                                </li>
                                <li>
                                    @if ($row->fasilitas2 != null)
                                        {{ $row->fasilitas2 }}
                                    @else
                                    @endif
                                </li>
                                <li>
                                    @if ($row->fasilitas3 != null)
                                        {{ $row->fasilitas3 }}
                                    @else
                                    @endif
                                </li>
                                <li>
                                    @if ($row->fasilitas4 != null)
                                        {{ $row->fasilitas4 }}
                                    @else
                                    @endif
                                </li>
                                <li>
                                    @if ($row->fasilitas5 != null)
                                        {{ $row->fasilitas5 }}
                                    @else
                                    @endif
                                </li>
                                <li>
                                    @if ($row->fasilitas6 != null)
                                        {{ $row->fasilitas6 }}
                                    @else
                                    @endif
                                </li>
                                <li>
                                    @if ($row->fasilitas7 != null)
                                        {{ $row->fasilitas7 }}
                                    @else
                                    @endif
                                </li>
                                <li>
                                    @if ($row->fasilitas8 != null)
                                        {{ $row->fasilitas8 }}
                                    @else
                                    @endif
                                </li>
                                <li>
                                    @if ($row->fasilitas9 != null)
                                        {{ $row->fasilitas9 }}
                                    @else
                                    @endif
                                </li>
                                <li>
                                    @if ($row->fasilitas10 != null)
                                        {{ $row->fasilitas10 }}
                                    @else
                                    @endif
                                </li>
                            </ul>

                        </td>
                        <td>{{ $row->tanggal_berangkat }}</td>
                        <td>{{ $row->upload_by_user_name }}</td>
                        <td>{{ $row->Maskapai }}</td>
                        <td>{{ $row->jasa_travel }}</td>
                        <td rowspan="2"><img src="{{ asset('fotoUmroh/' . $row->thumbnail) }}" height="50px"></td>
                        <td>{{ $row->created_at }}</td>
                        <td rowspan="2">
                            <div class="btn">
                                <a href="/tampilkandataumroh/{{ $row->id }}" class="btn-update">Update</a>
                                <a href="#" class="btn-hapus delete" data-id="{{ $row->id }}">Hapus</a>
                                {{-- <a href="/deletedataumroh/{{ $row->id }}" class="btn-hapus">Hapus</a> --}}
                                <form id="data-form" action="{{ route('umrohs.approve', $row->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-ekspor">+Etalase</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>@if (strlen($row->deskripsi) > 100)
                            {{ substr($row->deskripsi, 0, 100) }}...
                        @else
                            {{ $row->deskripsi }}
                        @endif</td>
                        <td>{{ $row->durasi }} Hari</td>
                        <td>{{ $row->No_hp_uploader }}</td>
                        <td>{{ $row->Hotel }}</td>
                        <td>Rp.&nbsp;{{ number_format($row->harga_awal, 0, ',', '.') }},-</td>
                        <td>{{ $row->updated_at }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <script>
        $('.delete').click(function() {
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
                        window.location.href = "/deletedataumroh/" + inputId;
                        swal("Data Berhasil Di Hapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Berhasil Membatalkan");
                    }
                });
        });

        $(document).ready(function() {
        $('#data-form').submit(function(event) {
            event.preventDefault();
            var inputId = $(this).find('.btn-ekspor').attr('data-id');
            swal({
                title: "Anda Yakin?",
                text: "Ketika sudah di etalase, barang tidak dapat kembali",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willAdd) => {
                if (willAdd) {
                    // Lanjutkan dengan mengirimkan formulir setelah konfirmasi
                    $(this).off("submit").submit();
                } else {
                    swal("Tambah Etalase Dibatalkan");
                }
            });
        });
    });

    </script>
@endsection
