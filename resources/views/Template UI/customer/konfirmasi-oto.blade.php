@extends('Template UI.layouts.main')
@section('content')
    <div class="titles">
        <h1>Beli, {{ $data->nama_kendaraan }}</h1>
    </div>


    <form action="{{ route('otomotifs.purchased', $row->id) }}" method="POST">
        @csrf

        <div class="form-input">
            <label for="">Nama Kendaraan :</label>
            <input type="text" class="inp-disable" name="nama_paket" value="{{ $data->nama_paket }}"disabled>
            <p for="">{{ $data->nama_paket }}</p>

            <label for="">Merk :</label>
            <input type="text" class="inp-disable" name="jenis" value="{{ $data->jenis }}" disabled>
            <p for="">{{ $data->jenis }}</p>

            <label for="">Tahun Pembuatan :</label>
            <input type="date" class="inp-disable" name="tanggal_berangkat" value="{{ $data->tanggal_berangkat }}"disabled>
            <p for="">{{ $data->tanggal_berangkat }}</p>

            <label for="">Kapasitas Mesin :</label>
            <input type="text" class="inp-disable" name="durasi" value="{{ $data->durasi}}" disabled>
            <p for="">{{ $data->durasi }} Hari</p>

            <label for="">Transmisi :</label>
            <input type="text" class="inp-disable" name="durasi" value="{{ $data->durasi}}" disabled>
            <p for="">{{ $data->durasi }} Hari</p>

            <label for="">Warna :</label>
            <input type="text" class="inp-disable" name="durasi" value="{{ $data->durasi}}" disabled>
            <p for="">{{ $data->durasi }} Hari</p>

            <label for="">Kilometer :</label>
            <input type="text" class="inp-disable" name="durasi" value="{{ $data->durasi}}" disabled>
            <p for="">{{ $data->durasi }} Hari</p>

            <label for="">Status :</label>
            <input type="text" class="inp-disable" name="durasi" value="{{ $data->durasi}}" disabled>
            <p for="">{{ $data->durasi }} Hari</p>

            <label for="">Alamat Kendaraan :</label>
            <input type="text" class="inp-disable" name="durasi" value="{{ $data->durasi}}" disabled>
            <p for="">{{ $data->durasi }} Hari</p>

            <label for="">Nama Pemilik :</label>
            <input type="text" class="inp-disable" name="durasi" value="{{ $data->durasi}}" disabled>
            <p for="">{{ $data->durasi }} Hari</p>

            <label for=""></label>
            <select class="jasa_travel" name="jasa_travel" disabled>
                <option selected>{{ $data->jasa_travel }}</option>
                <option value="Anamiroh">Anamiroh</option>
                <option value="Jasa Travel B">Jasa Travel B</option>
                <option value="Jasa Travel C">Jasa Travel C</option>
            </select>
            <p>{{ $data->jasa_travel }}</p>

            <label for="">No Ktp :</label>
            <input type="number" class="inp-disable" name="harga" value="{{ $data->harga_awal }}">
            <p>Rp. {{ number_format($data->harga_awal, 0, ',', '.') }},-</p>

            <label for="">Foto Ktp :</label>
            <input type="number" class="inp-disable" name="harga" value="{{ $data->harga_awal }}">
            <p>Rp. {{ number_format($data->harga_awal, 0, ',', '.') }},-</p>

            <label for="">Harga :</label>
            <input type="number" class="inp-disable" name="harga" value="{{ $data->harga_awal }}"disabled>
            <p>Rp. {{ number_format($data->harga_awal, 0, ',', '.') }},-</p>

{{--
            <label for="">Jumlah Jemaah :</label>
            <input type="number" name="jumlah_jemaah" value="{{ $data->jumlah_jemaah }}" required> --}}

            <button type="submit" class="btn-ekspor">Purchase</button>
        </div>
    </form>

@endsection
