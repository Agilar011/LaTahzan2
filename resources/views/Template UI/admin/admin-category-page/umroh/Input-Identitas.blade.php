<x-app-layout>
    {{-- penempatan di layout.app dan navigation-menu --}}
</x-app-layout>
@extends('Template UI.layouts.main')
@section('content')

    <h1>Beli Paket Umroh</h1>

    <div class="cont-form">
        <form method="POST" action="{{ route('storejemaah', ['id' => $data->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-input">
                <label for="jumlah_jemaah">Jumlah Nasabah</label>
                <input type="number" name="jumlah_jemaah" value="{{ $data->jumlah_jemaah }}" disabled>
                <label for="id_etalase_umroh"></label>
                <input type="text" name="id_etalase_umroh" value="{{ $data->id }}" disabled>
                <label for="">Data Jemaah</label>
                @if ($data->jumlah_jemaah > 0)
                @for ($i = 1; $i <= $data->jumlah_jemaah; $i++)
                @if ($i == 1)
                <div class="form-input">
                    <label for="nama_jemaah{{ $i }}">Nama Jemaah {{ $i }}</label>
                    <input type="text" name="nama_jemaah[]" id="nama_jemaah{{ $i }}" value="{{ $user->name }}" readonly >

                    <label for="NIK{{ $i }}">NIK Jemaah {{ $i }}</label>
                    <input type="text" name="NIK[]" id="NIK{{ $i }}" value="{{ $user->NIK }}" readonly>

                    <label for="No_hp{{ $i }}">No HP Jemaah {{ $i }}</label>
                    <input type="text" name="No_hp[]" id="No_hp{{ $i }}" value="{{ $user->phone }}" readonly>

                    <label for="foto_identitas{{ $i }}">Foto Identitas {{ $i }}</label>
                    <input type="file" name="foto_identitas[]" id="foto_identitas{{ $i }}" accept="image/*" required>

                    <label for="status_paspor{{ $i }}">Status Paspor {{ $i }}</label>
                    <select class="status" name="status_paspor[]">
                        <option selected disabled>Pilih Status Paspor Anda</option>
                        <option value="Sudah">Sudah</option>
                        <option value="Belum">Belum</option>
                    </select>

                    <label for="no_paspor{{ $i }}">No Paspor {{ $i }}</label>
                    <input type="text" name="no_paspor[]" id="no_paspor{{ $i }}" required>

                    <label for="foto_paspor{{ $i }}">Foto Paspor {{ $i }}</label>
                    <input type="file" name="foto_paspor[]" id="foto_paspor{{ $i }}" accept="image/*" required>

                    <label for="status_vaksin{{ $i }}">Status Vaksin {{ $i }}</label>
                    <select class="status" name="status_vaksin[]">
                        <option selected disabled>Pilih Status Vaksin Anda</option>
                        <option value="Sudah">Sudah</option>
                        <option value="Belum">Belum</option>
                    </select>

                    <label for="foto_vaksin{{ $i }}">Foto Vaksin {{ $i }}</label>
                    <input type="file" name="foto_vaksin[]" id="foto_vaksin{{ $i }}" accept="image/*" required>

                    <label for="no_kk{{ $i }}">No KK {{ $i }}</label>
                    <input type="text" name="no_kk[]" id="no_kk{{ $i }}" required>

                    <label for="foto_kk{{ $i }}">Foto KK {{ $i }}</label>
                    <input type="file" name="foto_kk[]" id="foto_kk{{ $i }}" accept="image/*" required>

                    <!-- Include other input fields for jemaah data (foto_KTP, etc.) -->
                </div>

                @else
                <div class="form-input">
                    <label for="nama_jemaah{{ $i }}">Nama Jemaah {{ $i }}</label>
                    <input type="text" name="nama_jemaah[]" id="nama_jemaah{{ $i }}" required>

                    <label for="NIK{{ $i }}">NIK Jemaah {{ $i }}</label>
                    <input type="text" name="NIK[]" id="NIK{{ $i }}" required>

                    <label for="No_hp{{ $i }}">No HP Jemaah {{ $i }}</label>
                    <input type="text" name="No_hp[]" id="No_hp{{ $i }}" required>

                    <label for="status_paspor{{ $i }}">Status Paspor {{ $i }}</label>
                    <select class="status" name="status_paspor[]">
                        <option selected disabled>Pilih Status Paspor Anda</option>
                        <option value="Sudah">Sudah</option>
                        <option value="Belum">Belum</option>
                    </select>

                    <label for="no_paspor{{ $i }}">No Paspor {{ $i }}</label>
                    <input type="text" name="no_paspor[]" id="no_paspor{{ $i }}" required>

                    <label for="foto_paspor{{ $i }}">Foto Paspor {{ $i }}</label>
                    <input type="file" name="foto_paspor[]" id="foto_paspor{{ $i }}" accept="image/*" required>

                    <label for="foto_identitas{{ $i }}">Foto KTP {{ $i }}</label>
                    <input type="file" name="foto_identitas[]" id="foto_identitas{{ $i }}" accept="image/*" required>

                    <label for="status_vaksin{{ $i }}">Status Vaksin {{ $i }}</label>
                    <select class="status" name="status_vaksin[]">
                        <option selected disabled>Pilih Status Vaksin Anda</option>
                        <option value="Sudah">Sudah</option>
                        <option value="Belum">Belum</option>
                    </select>

                    <label for="foto_vaksin{{ $i }}">Foto Vaksin {{ $i }}</label>
                    <input type="file" name="foto_vaksin[]" id="foto_vaksin{{ $i }}" accept="image/*" required>

                    <!-- Include other input fields for jemaah data (foto_KTP, etc.) -->
                </div>

                @endif

                @endfor
            @endif

                <button type="submit">Tambahkan Produk</button>
            </div>
        </form>
    </div>
@endsection
