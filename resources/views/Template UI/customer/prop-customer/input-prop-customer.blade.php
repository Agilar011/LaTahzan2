@extends('Template UI.layouts.main')
@section('content')
<div class="title" style="text-align: center;">
    <h1>Tambah Produk Properti</h1>
</div>

    <div class="cont-form">
        <form action="/insertdataprop" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-input">
                <label for="">Judul</label>
                <input type="text" name="nama_properti">
                <label for="">Jenis Properti</label>
                <select class="status" name="jenis">
                    <option selected>Pilih Jenis Properti</option>
                    <option value="rumah">Rumah</option>
                    <option value="tanah">Tanah</option>
                </select>
                <label for="">Deskripsi</label>
                <input type="text" name="deskripsi">

                <label for="">Alamat</label>
                <input type="text" name="alamat">
                <label for="">Kecamatan</label>
                <input type="text" name="kecamatan">
                <label for="">Kota</label>
                <input type="text" name="kota">
                <label for="">Luas</label>
                <input type="number" name="luas">
                <label for="">Harga</label>
                <input type="number" name="harga">
                <label for="">Foto</label>
                <input type="file" name="foto1">
                <label for="">Foto</label>
                <input type="file" name="foto2">
                <label for="">Foto</label>
                <input type="file" name="foto3">
                <label for="">Foto</label>
                <input type="file" name="foto4">
                <label for="">Foto Sertifikat</label>
                <input type="file" name="foto_sertifikat">
                <label for="">Foto KTP Pemilik</label>
                <input type="file" name="foto_ktp">

                <button type="submit">Tambahkan Produk</button>
            </div>
        </form>
    </div>

@endsection
