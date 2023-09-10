 @extends('Template UI.layouts.admin-sidebar')
@section('content')
    <h1>Tambah Produk Otomotif</h1>

    <div class="cont-form">
        <form action="/insertdataoto" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-input">
                <label for="">Nama Kendaraan (Sesuai STNK)</label>
                <input type="text" name="nama_kendaraan" required>
                <label for="">Deskripsi (Maks. 1000 karakter)</label>
                <input type="text" name="deskripsi" class="desc" required>
                <label for="">Merk (Honda, Yamaha, Kawasaki, dll,.)</label>
                <input type="text" name="merk" required>
                <label for="">Kapasitas Mesin (125cc, 150cc, 250cc, dll,.)</label>
                <input type="number" name="kapasitas_mesin" required>
                <label for="">Warna</label>
                <input type="text" name="warna" required>
                <label for="">Transmisi</label>
                <select class="status" name="transmisi" required>
                    <option selected>Pilih Jenis Transmisi</option>
                    <option value="manual">Manual Transmisi</option>
                    <option value="matic">Auto Transmisi</option>
                </select>
                <label for="">Kilometer (ODO Trip)</label>
                <input type="number" name="kilometer" required>
                <label for="">Tahun Pembuatan (Sesuai STNK)</label>
                <input type="number" name="tahun">
                <label for="">Status Kendaraan</label>
                <select class="status" name="status" required>
                    <option selected>Pilih Status Kendaraan</option>
                    <option value="baru">Baru</option>
                    <option value="bekas">Bekas</option>
                </select>
                <label for="">Alamat Kendaraan</label>
                <input type="text" name="alamat" required>
                <label for="">Kecamatan</label>
                <input type="text" name="kecamatan" required>
                <label for="">Kota</label>
                <select class="status" name="kota" required>
                    <option selected>Pilih Kota</option>
                    <option value="Blitar">Blitar</option>
                </select>
                <label for="">Harga</label>
                <input type="number" name="harga" required>


                <table class="fasilitas-table">
                    <tr>
                        <td colspan="5"><h2>Upload Foto :</h2></td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Upload Foto 1 (Tampilan Etalase)</label>
                            <input type="file" name="foto1" id="imageInput" class="thumbnail" required>
                        </td>
                        <td>
                            <label for="">Upload Foto 2</label>
                            <input type="file" name="foto2" class="thumbnail">
                        </td>
                        <td>
                            <label for="">Upload Foto 3</label>
                         <input type="file" name="foto3" class="thumbnail">
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <label for="">Upload Foto Bpkb</label>
                            <input type="file" name="foto_bpkb" class="thumbnail" required>
                        </td>
                        <td>
                            <label for="">Upload Foto Stnk</label>
                            <input type="file" name="foto_stnk" class="thumbnail" required>
                        </td>
                        <td>
                            <label for="">Upload Foto Ktp Pemilik</label>
                            <input type="file" name="foto_ktp" class="thumbnail" required>
                        </td>
                    </tr>
                </table>


                <button type="submit">Tambahkan Produk</button>
            </div>
        </form>
    </div>
@endsection
