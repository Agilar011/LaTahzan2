@extends('Template UI.layouts.main')
@section('content')
    <div class="titles">
        <h1>Beli, {{ $data->nama_properti }}</h1>
    </div>


    <form action="{{ route('propertys.purchased', $data->id) }}" method="POST">
        @csrf

        <div class="form-input">
            <label for="">Nama Property :</label>
            <input type="text" class="inp-disable" name="nama_properti" value="{{ $data->nama_properti }}"disabled>
            <p for="">{{ $data->nama_properti }}</p>

            <label for="">Jenis :</label>
            <input type="text" class="inp-disable" name="jenis" value="{{ $data->jenis }}" disabled>
            <p for="">{{ $data->jenis }}</p>



            {{-- <label for="">Nama Pembeli</label>
            <input type="text" name="purchased_by_user_name" value="{{ $data->purchased_by_user_name }}"> --}}



            <label for="">No Ktp :</label>
            <input type="text" name="no_ktp_purchaser" value="{{ $user->nik }}">


            <label for="">Foto Ktp :</label>
            <input type="file" name="foto_ktp_purchaser" value="{{ $data->foto_ktp_purchaser }}">
            {{-- <p>Rp. {{ number_format($data->harga_awal, 0, ',', '.') }},-</p> --}}

            <label for="">Harga :</label>
            <input type="number" class="inp-disable" name="harga" value="{{ $data->harga }}"disabled>
            <p>Rp. {{ number_format($data->harga, 0, ',', '.') }},-</p>

{{--
            <label for="">Jumlah Jemaah :</label>
            <input type="number" name="jumlah_jemaah" value="{{ $data->jumlah_jemaah }}" required> --}}

            <button type="submit" class="btn-ekspor">Purchase</button>
        </div>
    </form>

@endsection
