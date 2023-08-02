<x-app-layout>
    {{-- penempatan di layout.app dan navigation-menu --}}
    </x-app-layout>
@extends('Template UI.layouts.admin-sidebar')

@section('content')
    <h1>Edit Produk Umroh</h1>

    <div class="cont-form">
        <form action="/updatedataumroh/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-input">
                <label for="">Nama Paket</label>
                <input type="text" name="nama_paket" value="{{ $data->nama_paket }}">
                <label for="">Jenis Paket</label>
                <select class="status" name="jenis">
                    <option selected>{{ $data->jenis }}</option>
                    <option value="Umroh">Umroh</option>
                    <option value="Haji">Haji</option>
                </select>
                <label for="">Deskripsi</label>
                <input type="text" name="deskripsi" value="{{ $data->deskripsi }}">
                <label for="">Tanggal Berangkat</label>
                <input type="date" name="tanggal_berangkat" value="{{ $data->tanggal_berangkat }}">

                <label for="">Durasi</label>
                <input type="number" name="durasi" value="{{ $data->durasi }}">
                <label for="">Jasa Travel</label>
                <select class="status" name="jasa_travel" >
                    <option selected>{{ $data->jasa_travel }}</option>
                    <option value="Anamiroh">Anamiroh</option>
                    <option value="Jasa Travel B">Jasa Travel B</option>
                    <option value="Jasa Travel C">Jasa Travel C</option>
                </select>
                <label for="">CP Travel</label>
                <input type="number" name="cp_travel" value="{{ $data->cp_travel }}">
                <label for="">Hotel</label>
                <input type="text" name="hotel" value="{{ $data->hotel }}">
                <label for="">Maskapai</label>
                <input type="text" name="maskapai" value="{{ $data->maskapai }}">
                <label for="">Harga</label>
                <input type="number" name="harga" value="{{ $data->harga }}">
                <label for="">Foto</label>
                <input type="text" name="foto" value="{{ $data->foto }}">

                <button type="submit">Tambahkan Produk</button>
            </div>
        </form>
    </div>

@endsection
