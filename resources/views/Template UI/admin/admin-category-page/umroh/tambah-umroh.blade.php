@extends('Template UI.layouts.admin-sidebar')
@section('content')
    <h1>Tambah Produk Umroh</h1>


        <form action="/insertdataumroh" method="POST" enctype="multipart/form-data" class="cont-form">
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
                <input type="number" name="No_hp_uploader">
                <label for="">Hotel</label>
                <input type="text" name="Hotel">
                <label for="">Maskapai</label>
                <input type="text" name="Maskapai">
                <label for="">Harga</label>
                <input type="number" name="harga_awal">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" name="thumbnail">
                <table class="content-table">
                    <tr>
                        <td colspan="5">Fasilitas </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Fasilitas</label>
                            <input type="text" name="fasilitas1">
                        </td>
                        <td>
                            <label for="">Fasilitas</label>
                            <input type="text" name="fasilitas2">
                        </td>
                        <td><label for="">Fasilitas</label>
                            <input type="text" name="fasilitas3">
                        </td>
                        <td><label for="">Fasilitas</label>
                            <input type="text" name="fasilitas4">
                        </td>
                        <td><label for="">Fasilitas</label>
                            <input type="text" name="fasilitas5">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="">Fasilitas</label>
                            <input type="text" name="fasilitas6">
                        </td>
                        <td><label for="">Fasilitas</label>
                            <input type="text" name="fasilitas7">
                        </td>
                        <td><label for="">Fasilitas</label>
                            <input type="text" name="fasilitas8">
                        </td>
                        <td><label for="">Fasilitas</label>
                            <input type="text" name="fasilitas9">
                        </td>
                        <td><label for="">Fasilitas</label>
                            <input type="text" name="fasilitas10">
                        </td>
                    </tr>
                </table>


                <button type="submit">Tambahkan Produk</button>
            </div>
        </form>

@endsection
