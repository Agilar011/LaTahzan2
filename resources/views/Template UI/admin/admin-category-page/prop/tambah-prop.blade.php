@extends('Template UI.layouts.admin-sidebar')
@section('content')
    <h1>Tambah Produk Properti</h1>

    <div class="cont-form">
        <form action="/insertdataprop" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-input">
                <label for="">Judul</label>
                <input type="text" name="nama_properti" required>
                <label for="">Jenis Properti</label>
                <select class="status" name="jenis" required>
                    <option selected>Pilih Jenis Properti</option>
                    <option value="rumah">Rumah</option>
                    <option value="tanah">Tanah</option>
                </select>
                <label for="">Deskripsi</label>
                <input type="text" name="deskripsi" required>

                <label for="">Alamat</label>
                <input type="text" name="alamat" required>
                <label for="">Kecamatan</label>
                <input type="text" inputmode="" name="kecamatan" required>
                <label for="">Kota</label>
                <input type="text" name="kota" required>
                <label for="">Luas</label>
                <input type="number" inputmode="numeric" name="luas" required>
                <label for="">Harga</label>
                <input type="number" name="harga" required>
                <label for="">Foto</label>
                <input type="file" name="foto1" required>
                <label for="">Foto</label>
                <input type="file" name="foto2">
                <label for="">Foto</label>
                <input type="file" name="foto3">
                <label for="">Foto</label>
                <input type="file" name="foto4">
                <label for="">Foto Sertifikat</label>
                <input type="file" name="foto_sertifikat" required>
                <label for="">Foto KTP Pemilik</label>
                <input type="file" name="foto_ktp" required>

                <button type="submit">Tambahkan Produk</button>
            </div>
        </form>
    </div>

@endsection
