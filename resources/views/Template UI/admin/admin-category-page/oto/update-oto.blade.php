<x-app-layout>
    {{-- penempatan di layout.app dan navigation-menu --}}
</x-app-layout>


    @extends('Template UI.layouts.main')
@section('content')

    <h1>Edit Produk Otomotif</h1>

    <div class="cont-form">
        <form action="/updatedataoto/{{ $data->id }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-input">
                <label for="">Nama Kendaraan (Sesuai STNK)</label>
                <input type="text" name="nama_kendaraan" value="{{ $data->nama_kendaraan }}">
                <label for="">Deskripsi (Maks. 1000 karakter)</label>
                <input type="text" name="deskripsi" class="desc" value="{{ $data->deskripsi }}">
                <label for="">Merk (Honda, Yamaha, Kawasaki, dll,.)</label>
                <input type="text" name="merk" value="{{ $data->merk }}">
                <label for="">Kapasitas Mesin (125cc, 150cc, 250cc, dll,.)</label>
                <input type="text" name="kapasitas_mesin" value="{{ $data->kapasitas_mesin }}">
                <label for="">Warna</label>
                <input type="text" name="warna" value="{{ $data->warna }}">
                <label for="">Transmisi</label>
                <select class="status" name="transmisi">
                    <option selected>{{ $data->transmisi }}</option>
                    <option value="manual">Manual Transmisi</option>
                    <option value="matic">Auto Transmisi</option>
                </select>
                <label for="">Kilometer (ODO Trip)</label>
                <input type="number" name="kilometer" value="{{ $data->kilometer }}">
                <label for="">Tahun Pembuatan (Sesuai STNK)</label>
                <input type="number" name="tahun" value="{{ $data->tahun }}">
                <label for="">Status Kendaraan</label>
                <select class="status" name="status">
                    <option selected>{{ $data->status }}</option>
                    <option value="baru">Baru</option>
                    <option value="bekas">Bekas</option>
                </select>
                <label for="">Alamat Kendaraan</label>
                <input type="text" name="alamat" value="{{ $data->alamat }}">
                <label for="">Harga</label>
                <input type="number" name="harga" value="{{ $data->harga }}">

                <button type="submit">Edit Produk</button>
            </div>
        </form>
    </div>
@endsection
