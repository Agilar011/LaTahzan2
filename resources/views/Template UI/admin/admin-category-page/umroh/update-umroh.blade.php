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
                <select class="status" name="jasa_travel">
                    <option selected>{{ $data->jasa_travel }}</option>
                    <option value="Anamiroh">Anamiroh</option>
                    <option value="Jasa Travel B">Jasa Travel B</option>
                    <option value="Jasa Travel C">Jasa Travel C</option>
                </select>
                <label for="">CP Travel</label>
                <input type="number" name="No_hp_uploader" value="{{ $data->No_hp_uploader }}">
                <label for="">Hotel</label>
                <input type="text" name="Hotel" value="{{ $data->Hotel }}">
                <label for="">Maskapai</label>
                <input type="text" name="Maskapai" value="{{ $data->Maskapai }}">
                <label for="">Harga</label>
                <input type="number" name="harga_awal" value="{{ $data->harga_awal }}">

                <table>
                    <tr>
                        <td colspan="5">Fasilitas </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Fasilitas</label>
                            <input type="text" name="fasilitas1" value="{{ $data->fasilitas1 }}">
                        </td>

                        <td>
                            <label for="">Fasilitas</label>
                            <input type="text" name="fasilitas2" value="{{ $data->fasilitas2 }}">
                        </td>

                        <td><label for="">Fasilitas</label>
                            <input type="text" name="fasilitas3" value="{{ $data->fasilitas3 }}">
                        </td>

                        <td><label for="">Fasilitas</label>
                            <input type="text" name="fasilitas4" value="{{ $data->fasilitas4 }}">
                        </td>

                        <td><label for="">Fasilitas</label>
                            <input type="text" name="fasilitas5" value="{{ $data->fasilitas5 }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Fasilitas</label>
                            <input type="text" name="fasilitas6" value="{{ $data->fasilitas6 }}">
                        </td>

                        <td><label for="">Fasilitas</label>
                            <input type="text" name="fasilitas7" value="{{ $data->fasilitas7 }}">
                        </td>

                        <td><label for="">Fasilitas</label>
                            <input type="text" name="fasilitas8" value="{{ $data->fasilitas8 }}">
                        </td>

                        <td><label for="">Fasilitas</label>
                            <input type="text" name="fasilitas9" value="{{ $data->fasilitas9 }}">
                        </td>

                        <td><label for="">Fasilitas</label>
                            <input type="text" name="fasilitas10" value="{{ $data->fasilitas10 }}">
                        </td>

                    </tr>
                </table>

                <button type="submit">Tambahkan Produk</button>
            </div>
        </form>
    </div>
@endsection
