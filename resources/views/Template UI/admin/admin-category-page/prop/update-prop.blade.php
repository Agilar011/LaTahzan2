<x-app-layout>
    {{-- penempatan di layout.app dan navigation-menu --}}
    </x-app-layout>
@extends('Template UI.layouts.admin-sidebar')
@section('content')

    <h1>Edit Produk Properti</h1>

    <div class="cont-form">
        <form action="/updatedataprop/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-input">
                <label for="">Judul</label>
                <input type="text" name="nama_properti" value="{{ $data->nama_properti }}">
                <label for="">Jenis Properti</label>
                <select class="status" name="jenis">
                    <option selected>{{ $data->jenis }}</option>
                    <option value="rumah">Rumah</option>
                    <option value="tanah">Tanah</option>
                </select>
                <label for="">Deskripsi</label>
                <input type="text" name="deskripsi" value="{{ $data->deskripsi }}">
                <label for="">Alamat</label>
                <input type="text" name="alamat" value="{{ $data->alamat }}">
                <label for="">Kecamatan</label>
                <input type="text" name="kecamatan" value="{{ $data->kecamatan }}">
                <label for="">Kota</label>
                <input type="text" name="kota" value="{{ $data->kota }}">
                <label for="">Luas</label>
                <input type="number" name="luas" value="{{ $data->luas }}">
                <label for="">Harga</label>
                <input type="number" name="harga" value="{{ $data->harga }}">
                <label for="">Foto</label>
                <input type="file" name="foto1" value="{{ $data->foto1 }}">
                <label for="">Foto</label>
                <input type="file" name="foto2" value="{{ $data->foto2 }}">
                <label for="">Foto</label>
                <input type="file" name="foto3" value="{{ $data->foto3 }}">
                <label for="">Foto Serifikat</label>
                <input type="file" name="foto_sertifikat" value="{{ $data->foto_sertifikat }}">

                <button type="submit">Tambahkan Produk</button>
            </div>
        </form>
    </div>
@endsection
