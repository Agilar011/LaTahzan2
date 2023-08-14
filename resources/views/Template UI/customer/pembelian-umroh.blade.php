<x-app-layout>
    {{-- penempatan di layout.app dan navigation-menu --}}
    @extends('Template UI.layouts.main')
    @section('content')

    <h1>Beli Paket Umroh</h1>

    <div class="cont-form">
        <form action="{{ route('updatedatabeliumroh', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-input">
                <label for="">Nama Paket</label>
                <input type="text" name="nama_paket" value="{{ $data->nama_paket }}"disabled>
                <label for="">Jenis Paket</label>
                <label for="">Deskripsi</label>
                <input type="text" name="deskripsi" value="{{ $data->deskripsi }}"disabled>
                <label for="">Tanggal Berangkat</label>
                <input type="date" name="tanggal_berangkat" value="{{ $data->tanggal_berangkat }}"disabled>

                <label for="">Durasi</label>
                <input type="number" name="durasi" value="{{ $data->durasi }}"disabled>
                <label for="">Jasa Travel</label>
                <select class="status" name="jasa_travel" disabled>
                    <option selected>{{ $data->jasa_travel }}</option>
                    <option value="Anamiroh">Anamiroh</option>
                    <option value="Jasa Travel B">Jasa Travel B</option>
                    <option value="Jasa Travel C">Jasa Travel C</option>
                </select>
                <label for="">CP Travel</label>
                <input type="number" name="cp_travel" value="{{ $data->No_hp_uploader }}"disabled>
                <label for="">Hotel</label>
                <input type="text" name="hotel" value="{{ $data->Hotel }}"disabled>
                <label for="">Maskapai</label>
                <input type="text" name="maskapai" value="{{ $data->Maskapai }}"disabled>
                <label for="">Harga</label>
                <input type="number" name="harga" value="{{ $data->harga_awal }}"disabled>
                <label for="">Foto</label>
                <input type="file" name="foto" value="{{ $data->foto }}"disabled>
                <label for="">Jumlah Jemaah</label>
                <input type="number" name="jumlah_jemaah" value="{{ $data->jumlah_jemaah }}">

                <button type="submit">Tambahkan Produk</button>
            </div>
        </form>
    </div>
@endsection
</x-app-layout>
