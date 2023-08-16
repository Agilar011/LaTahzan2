 @extends('Template UI.layouts.main')
    @section('content')
        <div class="titles">
            <h1>Beli, {{ $data->nama_paket }}</h1>
        </div>


        <form action="{{ route('updatedatabeliumroh', $data->id) }}" method="POST" enctype="multipart/form-data" class="cont-form">
            @csrf
            <div class="form-input">
                <label for="">Nama Paket :</label>
                <input type="text" class="inp-disable" name="nama_paket" value="{{ $data->nama_paket }}"disabled>
                <p for="">{{ $data->nama_paket }}</p>

                <label for="">Jenis Paket :</label>
                <input type="text" class="inp-disable" name="jenis" value="{{ $data->jenis }}" disabled>
                <p for="">{{ $data->jenis }}</p>

                <label for="">Tanggal Berangkat :</label>
                <input type="date" class="inp-disable" name="tanggal_berangkat" value="{{ $data->tanggal_berangkat }}"disabled>
                <p for="">{{ $data->tanggal_berangkat }}</p>

                <label for="">Durasi :</label>
                <input type="text" class="inp-disable" name="durasi" value="{{ $data->durasi}}" disabled>
                <p for="">{{ $data->durasi }} Hari</p>

                <label for="">Jasa Travel :</label>
                <select class="jasa_travel" name="jasa_travel" disabled>
                    <option selected>{{ $data->jasa_travel }}</option>
                    <option value="Anamiroh">Anamiroh</option>
                    <option value="Jasa Travel B">Jasa Travel B</option>
                    <option value="Jasa Travel C">Jasa Travel C</option>
                </select>
                <p>{{ $data->jasa_travel }}</p>

                <label for="">CP Travel :</label>
                <input type="number" class="inp-disable" name="cp_travel" value="{{ $data->No_hp_uploader }}"disabled>
                <p for="">{{ $data->No_hp_uploader }}</p>

                <label for="">Hotel :</label>
                <input type="text" class="inp-disable" name="hotel" value="{{ $data->Hotel }}"disabled>
                <p>{{ $data->Hotel }}</p>

                <label for="">Maskapai :</label>
                <input type="text" class="inp-disable" name="maskapai" value="{{ $data->Maskapai }}"disabled>
                <p>{{ $data->Maskapai }}</p>

                <label for="">Harga :</label>
                <input type="number" class="inp-disable" name="harga" value="{{ $data->harga_awal }}"disabled>
                <p>Rp. {{ number_format($data->harga_awal, 0, ',', '.') }},-</p>

                <label for="">Jumlah Jemaah :</label>
                <input type="number" name="jumlah_jemaah" value="{{ $data->jumlah_jemaah }}" required>

                <button type="submit">Tambahkan Produk</button>
            </div>
        </form>

@endsection
