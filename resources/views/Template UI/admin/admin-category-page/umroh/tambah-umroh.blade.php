<x-app-layout>
    {{-- penempatan di layout.app dan navigation-menu --}}
    </x-app-layout>
@extends('Template UI.layouts.admin-sidebar')
@section('content')
    <h1>Tambah Produk Umroh</h1>

    <div class="cont-form">
        <form action="/insertdataumroh" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-input">
                <label for="">Nama Paket</label>
                <input type="text" name="nama_paket">
                <label for="">Jenis Paket</label>
                <select class="status" name="jenis">
                    <option selected>Pilih Jenis Paket</option>
                    <option value="Umroh">Umroh</option>
                    <option value="Haji">Haji</option>
                </select>
                <label for="">Deskripsi</label>
                <input type="text" name="deskripsi">
                <label for="">Tanggal Berangkat</label>
                <input type="date" name="tanggal_berangkat">

                <label for="">Durasi</label>
                <input type="number" name="durasi">
                <label for="">Jasa Travel</label>
                <select class="status" name="jasa_travel">
                    <option selected>Pilih Jasa Travel</option>
                    <option value="Anamiroh">Anamiroh</option>
                    <option value="Rihlah Saidah">Rihlah Saidah</option>
                    <option value="Antrav Mustika">Antrav Mustika</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                <label for="">CP Travel</label>
                <input type="number" name="CP_Admin">
                <label for="">Hotel</label>
                <input type="text" name="Hotel">
                <label for="">Maskapai</label>
                <input type="text" name="Maskapai">
                <label for="">Harga</label>
                <input type="number" name="harga">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" name="thumbnail">


                <button type="submit">Tambahkan Produk</button>
            </div>
        </form>
    </div>

@endsection
