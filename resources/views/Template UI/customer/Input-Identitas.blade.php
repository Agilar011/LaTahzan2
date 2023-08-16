
    {{-- penempatan di layout.app dan navigation-menu --}}
    @extends('Template UI.layouts.main')
    @section('content')

    <div class="titles">
        <h1>Beli, &nbsp{{ $data->nama_paket }}</h1>
    </div>



        <div class="cont-form">
            <form method="POST" action="{{ route('storejemaah', ['id' => $data->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-input">
                    <label for="jumlah_jemaah">Jumlah Jemaah</label>
                    <input type="number" name="jumlah_jemaah" value="{{ $data->jumlah_jemaah }}" disabled>
                    <label for="">Data Jemaah</label>
                    @if ($data->jumlah_jemaah > 0)
                        @for ($i = 1; $i <= $data->jumlah_jemaah; $i++)
                            @if ($i == 1)
                                <div class="form-input">
                                    <label for="nama_jemaah{{ $i }}">Nama Jemaah {{ $i }} <span>*</span></label>
                                    <input type="text" name="nama_jemaah[]" id="nama_jemaah{{ $i }}"
                                        value="{{ $user->name }}" readonly>

                                    <label for="NIK{{ $i }}">NIK Jemaah {{ $i }}</label>
                                    <input type="text" name="NIK[]" id="NIK{{ $i }}"
                                        value="{{ $user->NIK }}" readonly>

                                    <label for="No_hp{{ $i }}">No HP Jemaah {{ $i }}</label>
                                    <input type="text" name="No_hp[]" id="No_hp{{ $i }}"
                                        value="{{ $user->phone }}" readonly>

                                    <label for="foto_identitas{{ $i }}">Foto KTP
                                        {{ $i }}<span>*</span></label>
                                    <input type="file" name="foto_identitas[]" id="foto_identitas{{ $i }}"
                                        accept="image/*" required>

                                    <label for="status_paspor{{ $i }}">Status Paspor
                                        {{ $i }}</label>
                                    <select class="status" name="status_paspor[]">
                                        <option selected disabled>Pilih Status Paspor Anda</option>
                                        <option value="Sudah">Sudah</option>
                                        <option value="Belum">Belum</option>
                                    </select>
                                    <h5>* Akan dikenakan biaya tambahan sebesar Rp.500.000,- apabila anda belum memiliki Paspor</h5>

                                    <label for="no_paspor{{ $i }}">No Paspor {{ $i }} <span>*</span></label>
                                    <input type="text" name="no_paspor[]" id="no_paspor{{ $i }}" required>

                                    {{-- <label for="foto_paspor{{ $i }}">Foto Paspor {{ $i }}<span>*</span></label>
                                    <input type="file" name="foto_paspor[]" id="foto_paspor{{ $i }}"
                                        accept="image/*" required> --}}

                                    <label for="status_vaksin{{ $i }}">Status Vaksin
                                        {{ $i }}</label>
                                    <select class="status" name="status_vaksin[]">
                                        <option selected disabled>Pilih Status Vaksin Anda</option>
                                        <option value="Sudah">Sudah</option>
                                        <option value="Belum">Belum</option>
                                    </select>
                                    <h5>* Akan dikenakan biaya tambahan sebesar Rp.200.000,- apabila anda belum vaksin</h5>

                                    {{-- <label for="foto_vaksin{{ $i }}">Foto Vaksin {{ $i }} <span>*</span></label>
                                    <input type="file" name="foto_vaksin[]" id="foto_vaksin{{ $i }}"
                                        accept="image/*" required> --}}

                                    <label for="no_kk{{ $i }}">No KK {{ $i }} <span>*</span></label>
                                    <input type="text" name="no_kk[]" id="no_kk{{ $i }}" required>

                                    <label for="foto_kk{{ $i }}">Foto KK {{ $i }} <span>*</span></label>
                                    <input type="file" name="foto_kk[]" id="foto_kk{{ $i }}" accept="image/*"
                                        required>

                                    <!-- Include other input fields for jemaah data (foto_KTP, etc.) -->
                                </div>
                            @else
                                <div class="form-input">
                                    <label for="nama_jemaah{{ $i }}">Nama Jemaah {{ $i }} <span>*</span></label>
                                    <input type="text" name="nama_jemaah[]" id="nama_jemaah{{ $i }}"
                                        required>

                                    <label for="NIK{{ $i }}">NIK Jemaah {{ $i }} <span>*</span></label>
                                    <input type="text" name="NIK[]" id="NIK{{ $i }}" required>

                                    <label for="No_hp{{ $i }}">No HP Jemaah {{ $i }} <span>*</span></label>
                                    <input type="text" name="No_hp[]" id="No_hp{{ $i }}" required>

                                    <label for="status_paspor{{ $i }}">Status Paspor
                                        {{ $i }}</label>
                                    <select class="status" name="status_paspor[]">
                                        <option selected disabled>Pilih Status Paspor Anda</option>
                                        <option value="Sudah">Sudah</option>
                                        <option value="Belum">Belum</option>
                                    </select>
                                    <h5>* Akan dikenakan biaya tambahan sebesar Rp.500.000,- apabila anda belum memiliki Paspor</h5>

                                    <label for="no_paspor{{ $i }}">No Paspor {{ $i }} <span>*</span></label>
                                    <input type="text" name="no_paspor[]" id="no_paspor{{ $i }}" required>

                                    {{-- <label for="foto_paspor{{ $i }}">Foto Paspor {{ $i }} <span>*</span></label>
                                    <input type="file" name="foto_paspor[]" id="foto_paspor{{ $i }}"
                                        accept="image/*" required> --}}

                                    <label for="foto_identitas{{ $i }}">Foto KTP {{ $i }} <span>*</span></label>
                                    <input type="file" name="foto_identitas[]" id="foto_identitas{{ $i }}"
                                        accept="image/*" required>

                                    <label for="status_vaksin{{ $i }}">Status Vaksin
                                        {{ $i }}</label>
                                    <select class="status" name="status_vaksin[]">
                                        <option selected disabled>Pilih Status Vaksin Anda</option>
                                        <option value="Sudah">Sudah</option>
                                        <option value="Belum">Belum</option>
                                    </select>
                                    <h5>* Akan dikenakan biaya tambahan sebesar Rp.200.000,- apabila anda belum memiliki Paspor</h5>
{{--
                                    <label for="foto_vaksin{{ $i }}">Foto Vaksin {{ $i }} <span>*</span></label>
                                    <input type="file" name="foto_vaksin[]" id="foto_vaksin{{ $i }}"
                                        accept="image/*" required> --}}

                                    <!-- Include other input fields for jemaah data (foto_KTP, etc.) -->
                                </div>
                            @endif
                        @endfor
                    @endif

                    <label for="">Total Biaya:</label>
                    <h2 id="total-biaya"> {{ $data->harga_awal * $data->jumlah_jemaah }}</h2>


                    <button type="submit">Buat Pemesanan</button>
                </div>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const hargaAwal = {{ $data->harga_awal }};
                const hargaTambahanVaksin = 200000; // Biaya tambahan jika status vaksin "Belum"
                let jumlahJemaah = {{ $data->jumlah_jemaah }};
                const totalBiayaElement = document.querySelector('#total-biaya');

                const statusVaksinSelects = document.querySelectorAll('select[name="status_vaksin[]"]');

                function updateTotalBiaya() {
                    let totalBiaya = hargaAwal * jumlahJemaah;

                    statusVaksinSelects.forEach(function (statusVaksinSelect) {
                        if (statusVaksinSelect.value === "Belum") {
                            totalBiaya += hargaTambahanVaksin;
                        }
                    });

                    totalBiayaElement.textContent = `Rp. ${totalBiaya.toLocaleString()},-`;
                }

                // Panggil fungsi ini pertama kali untuk menginisialisasi total biaya
                updateTotalBiaya();

                // Tambahkan event listener untuk mengupdate total biaya jika jumlah jemaah berubah
                const jumlahJemaahInput = document.querySelector('input[name="jumlah_jemaah"]');
                jumlahJemaahInput.addEventListener('input', function () {
                    jumlahJemaah = parseInt(jumlahJemaahInput.value) || 0;
                    updateTotalBiaya();
                });

                // Tambahkan event listener untuk mengupdate total biaya jika status vaksin berubah
                statusVaksinSelects.forEach(function (statusVaksinSelect) {
                    statusVaksinSelect.addEventListener('change', updateTotalBiaya);
                });
            });
        </script>

    @endsection
