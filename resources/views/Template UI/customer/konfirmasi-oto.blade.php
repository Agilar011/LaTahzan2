@extends('Template UI.layouts.main')
@section('content')
    <div class="titles">
        <h1>Beli, {{ $data->nama_kendaraan }}</h1>
    </div>


    <form action="{{ route('otomotifs.purchased', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-input">
            <label for="">Nama Kendaraan :</label>
            <input type="text" class="inp-disable" name="nama_paket" value="{{ $data->nama_kendaraan }}"disabled>
            <p for="">{{ $data->nama_kendaraan }}</p>

            <label for="">Merk :</label>
            <input type="text" class="inp-disable" name="merk" value="{{ $data->merk }}" disabled>
            <p for="">{{ $data->merk }}</p>

            <label for="">Tahun Pembuatan :</label>
            <input type="date" class="inp-disable" name="tahun" value="{{ $data->tahun }}"disabled>
            <p for="">{{ $data->tahun }}</p>

            <label for="">Kapasitas Mesin :</label>
            <input type="text" class="inp-disable" name="kapasitas_mesin" value="{{ $data->kapasitas_mesin }}">
            <p for="">{{ $data->kapasitas_mesin }}cc</p>

            <label for="">Tipe Transmisi :</label>
            <input type="text" class="inp-disable" name="transmisi" value="{{ $data->transmisi }}" disabled>
            <p for="">{{ $data->transmisi }}</p>

            <label for="">Warna :</label>
            <input type="text" class="inp-disable" name="warna" value="{{ $data->warna }}" disabled>
            <p for="">{{ $data->warna }}</p>

            <label for="">Kilometer :</label>
            <input type="text" class="inp-disable" name="kilometer" value="{{ $data->kilometer }}" disabled>
            <p for="">{{ $data->kilometer }} km</p>

            <label for="">Status :</label>
            <input type="text" class="inp-disable" name="status" value="{{ $data->status }}" disabled>
            <p for="">{{ $data->status }}</p>

            <label for="">Alamat Kendaraan :</label>
            <input type="text" class="inp-disable" name="alamat" value="{{ $data->alamat }}" disabled>
            <input type="text" class="inp-disable" name="alamat" value="{{ $data->kecamatan }}" disabled>
            <input type="text" class="inp-disable" name="alamat" value="{{ $data->kota }}" disabled>
            <p for="">{{ $data->alamat }}, {{ $data->kecamatan }}, {{ $data->kota }}</p>

            <label for="">Kelengkapan Surat :</label>
            <input type="text" class="inp-disable" name="upload_by_user_name" value="{{ $data->upload_by_user_id }}"
                disabled>
            <ul>
                <li>

                    @if ($data->foto_stnk != null && $data->foto_bpkb != null && $data->foto_ktp != null)
                        <p>Surat lengkap (BPKB & STNK)</p>
                    @endif

                </li>
            </ul>

            <label for="">Nama Pemilik Kendaraan :</label>
            <input type="text" class="inp-disable" name="upload_by_user_name" value="{{ $data->upload_by_user_id }}"
                disabled>
            <p for="">{{ $data->upload_by_user_name }}</p>

            <label for="">Harga :</label>
            <input type="number" class="inp-disable" name="harga" value="{{ $data->harga }}"disabled>
            <p class="harga">Rp. {{ number_format($data->harga, 0, ',', '.') }},-</p>


            {{-- <label for="">Nama Pembeli</label>
            <input type="text" name="purchased_by_user_name" value="{{ $data->purchased_by_user_name }}"> --}}



            <label for="" style="margin-top: 50px">No Ktp :</label>
            <input type="text" name="no_ktp_purchaser" value="{{ $user->nik }}">


            <label for="">Foto Ktp :</label>
            <input type="file" name="foto_ktp_purchaser">

            {{--
            <label for="">Jumlah Jemaah :</label>
            <input type="number" name="jumlah_jemaah" value="{{ $data->jumlah_jemaah }}" required> --}}

            <button type="submit" class="btn-ekspor">Purchase</button>
        </div>
    </form>
@endsection
