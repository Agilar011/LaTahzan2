<x-app-layout>
    {{-- penempatan di layout.app dan navigation-menu --}}
</x-app-layout>

@extends('Template UI.layouts.admin-sidebar')
@section('content')

    <h1>Beli Paket Umroh</h1>

    <div class="cont-form">
        <form method="POST" action="{{ route('storejemaah', ['id' => $data->id]) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-input">
                <label for="jumlah_jemaah">Jumlah Nasabah</label>
                <input type="number" name="jumlah_jemaah" value="{{ $data->jumlah_jemaah }}" disabled>

                @if ($data->jumlah_jemaah > 0)
                    @for ($i = 1; $i <= $data->jumlah_jemaah; $i++)
                        <div class="form-input">
                            @if ($i == 1)
                            <label for="nama_jemaah{{ $i }}">Nama Jemaah {{ $i }}</label>
                            <input type="text" name="nama_jemaah[]" id="nama_jemaah{{ $i }}" value="{{ $user->name }}" disabled>

                            <label for="NIK{{ $i }}">NIK Jemaah {{ $i }}</label>
                            <input type="text" name="NIK[]" id="NIK{{ $i }}" value="{{ $user->NIK }}" disabled>

                            <label for="No_hp{{ $i }}">No HP Jemaah {{ $i }}</label>
                            <input type="text" name="No_hp[]" id="No_hp{{ $i }}" value="{{ $user->phone }}" disabled>

                            <label for="foto_identitas{{ $i }}">Foto Identitas {{ $i }}</label>
                            <input type="file" name="foto_identitas[]" id="foto_identitas{{ $i }}" accept="image/*" required>

                            <label for="status_paspor{{ $i }}">Status Paspor {{ $i }}</label>
                            {{-- <select class="status" name="status_paspor[]" onchange="togglePasporFields(this, {{ $i }})">
                                <option selected disabled>Pilih Status Paspor</option>
                                <option value="Sudah">Sudah</option>
                                <option value="Belum">Belum</option>
                            </select> --}}

                            <div id="paspor_fields{{ $i }}" style="display: none;">
                                <label for="no_paspor{{ $i }}">No Paspor {{ $i }}</label>
                                <input type="text" name="no_paspor[]" id="no_paspor{{ $i }}">

                                <label for="foto_paspor{{ $i }}">Foto Paspor {{ $i }}</label>
                                <input type="file" name="foto_paspor[]" id="foto_paspor{{ $i }}" accept="image/*" required>
                            </div>

                            <label for="status_vaksin{{ $i }}">Status Vaksin {{ $i }}</label>
                            {{-- <select class="status" name="status_vaksin[]" onchange="toggleVaksinFields(this, {{ $i }})">
                                <option selected disabled>Pilih Status Vaksin Anda</option>
                                <option value="Sudah">Sudah</option>
                                <option value="Belum">Belum</option>
                            </select> --}}

                            <div id="vaksin_fields{{ $i }}" style="display: none;">
                                <label for="foto_vaksin{{ $i }}">Foto Vaksin {{ $i }}</label>
                                <input type="file" name="foto_vaksin[]" id="foto_vaksin{{ $i }}" accept="image/*" required>
                            </div>                            @else
                                <label for="nama_jemaah{{ $i }}">Nama Jemaah {{ $i }}</label>
                                <input type="text" name="nama_jemaah[]" id="nama_jemaah{{ $i }}" required>

                                <label for="NIK{{ $i }}">NIK Jemaah {{ $i }}</label>
                                <input type="text" name="NIK[]" id="NIK{{ $i }}" required>

                                <label for="No_hp{{ $i }}">No HP Jemaah {{ $i }}</label>
                                <input type="text" name="No_hp[]" id="No_hp{{ $i }}" required>

                                <label for="foto_identitas{{ $i }}">Foto Identitas {{ $i }}</label>
                                <input type="file" name="foto_identitas[]" id="foto_identitas{{ $i }}"
                                    accept="image/*" required>

                                <label for="status_paspor{{ $i }}">Status Paspor {{ $i }}</label>
                                {{-- <select class="status" name="status_paspor[]"
                                    onchange="togglePasporFields(this, {{ $i }})">
                                    onchange="togglePasporFields(this, {{ $i }})">

                                    <option selected disabled>Pilih Status Paspor</option>
                                    <option value="Sudah">Sudah</option>
                                    <option value="Belum">Belum</option>
                                </select> --}}

                                <div id="paspor_fields{{ $i }}" style="display: none;">
                                    <label for="no_paspor{{ $i }}">No Paspor {{ $i }}</label>
                                    <input type="text" name="no_paspor[]" id="no_paspor{{ $i }}">

                                    <label for="foto_paspor{{ $i }}">Foto Paspor {{ $i }}</label>
                                    <input type="file" name="foto_paspor[]" id="foto_paspor{{ $i }}"
                                        accept="image/*" required>
                                </div>

                                <label for="status_vaksin{{ $i }}">Status Vaksin {{ $i }}</label>
                                {{-- <select class="status" name="status_vaksin[]"
                                    onchange="toggleVaksinFields(this, {{ $i }})">
                                    <option selected disabled>Pilih Status Vaksin Anda</option>
                                    <option value="Sudah">Sudah</option>
                                    <option value="Belum">Belum</option>
                                </select> --}}

                                <div id="vaksin_fields{{ $i }}" style="display: none;">
                                    <label for="foto_vaksin{{ $i }}">Foto Vaksin {{ $i }}</label>
                                    <input type="file" name="foto_vaksin[]" id="foto_vaksin{{ $i }}"
                                        accept="image/*" required>
                                </div>
                            @endif


                            <!-- Include other input fields for jemaah data (foto_KTP, etc.) -->
                        </div>
                    @endfor
                @endif




                <button type="submit">Tambahkan Produk</button>
            </div>
        </form>
    </div>
    {{-- <script>
        function togglePasporFields(selectElement, i) {
            var container = document.getElementById(`paspor_fields${i}`);
            if (selectElement.value === 'Sudah') {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        }

        function toggleVaksinFields(selectElement, i) {
            var container = document.getElementById(`vaksin_fields${i}`);
            if (selectElement.value === 'Sudah') {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        }
    </script> --}}
@endsection
