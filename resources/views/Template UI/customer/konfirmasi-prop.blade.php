@extends('Template UI.layouts.main')
@section('content')
    <div class="titles">
        <h1>Beli, {{ $data->nama_properti }}</h1>
    </div>


    <form action="{{ route('propertys.purchased', $data->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf

        <div class="form-input">
            <label for="">Nama Kendaraan :</label>
            <input type="text" class="inp-disable" name="nama_properti" value="{{ $data->nama_properti }}"disabled>
            <p for="">{{ $data->nama_properti }}</p>

            <label for="">Jenis Properti :</label>
            <input type="text" class="inp-disable" name="jenis" value="{{ $data->jenis }}" disabled>
            <p for="">{{ $data->jenis }}</p>

            <label for="">Luas :</label>
            <input type="text" class="inp-disable" name="luas" value="{{ $data->luas }}"disabled>
            <p for="">{{ $data->luas }}m2</p>

            <label for="">Nama Pemilik Rumah :</label>
            <input type="text" class="inp-disable" name="durasi" value="{{ $data->durasi}}" disabled>
            <p for="">{{ $data->upload_by_user_name }}</p>

            <label for="">Alamat Rumah :</label>
            <input type="text" class="inp-disable" name="alamat" value="{{ $data->alamat}}">
            <p for="">{{ $data->alamat }}, {{ $data->kecamatan }}, {{ $data->kota }}</p>

            <label for="">Admin Properti :</label>
            <input type="text" class="inp-disable" name="approved_by_user_name" value="{{ $data->approved_by_username}}" disabled>
            <p for="">{{ $data->approved_by_user_name }}</p>

            <label for="">Harga :</label>
            <input type="number" class="inp-disable" name="harga" value="{{ $data->harga_awal }}"disabled>
            <p>Rp. {{ number_format($data->harga, 0, ',', '.') }},-</p>


            <label for="">Nama Pembeli</label>
            <input type="text" name="purchased_by_user_name" value="{{ $user->name }}">


            <label for="">No Ktp :</label>
            <input type="text" name="no_ktp_purchaser" value="{{ $user->nik }}">


            <label for="">Foto Ktp :</label>
            <input type="file" name="foto_ktp_purchaser">

            <button type="submit" class="btn-ekspor">Purchase</button>
        </div>
    </form>

@endsection
