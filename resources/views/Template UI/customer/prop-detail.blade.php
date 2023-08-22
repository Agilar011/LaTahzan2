@extends('Template UI.layouts.main')

@section('title')
    La Tahzan | Home
@endsection

@section('content')
    <div action class="container-detail">
        <div class="small-container single-product">
            <div class="row">
                <div class="col-2">
                    <div class="main-img-size">
                        <img src="{{ asset('fotoProp1/' . $data->foto1) }}" alt="" id="productImg" class="foto-umroh">
                    </div>
                    <div class="small-img-row">
                        <div class="small-img-col">
                            <img src="{{ asset('fotoProp1/' . $data->foto1) }}" alt="" width="100%"
                                class="small-img" onclick="changeProductImage(this)">
                        </div>
                        <div class="small-img-col">
                            <img src="{{ asset('fotoProp2/' . $data->foto2) }}" alt="" width="100%"
                                class="small-img" onclick="changeProductImage(this)">
                        </div>
                        <div class="small-img-col">
                            <img src="{{ asset('fotoProp3/' . $data->foto3) }}" alt="" width="100%"
                                class="small-img" onclick="changeProductImage(this)">
                        </div>
                        <div class="small-img-col">
                            <img src="{{ asset('fotoProp4/' . $data->foto4) }}" alt="" width="100%"
                                class="small-img" onclick="changeProductImage(this)">
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="information">
                        <p class="path">Home/Umroh/{{ $data->nama_properti }}</p>
                        <h1>{{ $data->nama_properti }}</h1>
                        <h4 class="harga">Rp. {{ number_format($data->harga, 0, ',', '.') }},-</h4>
                        <p class="attr-tgl">Tipe Properti : <span>&nbsp; {{ $data->jenis }} </span>
                        </p>
                        <p class="attr">Luas : <span>&nbsp; {{ $data->luas }}m2</span></p>
                        <p class="attr">Alamat : <span>&nbsp; {{ $data->alamat }}</span></p>
                        {{-- <select name="" id="">
                        <option value="">Pilih Warna</option>
                        <option value="">Merah</option>
                        <option value="">Putih</option>
                        <option value="">Hitam</option>
                    </select> --}}
                        <input type="number" value="1">
                        <form action="{{ route('tampilkankonfirmasiprop', $data->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn-beli">Pesan Sekarang</button>
                        </form>
                        {{-- <h3>Deskripsi : <i class="fa fa-indent"></i></h3>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat eligendi neque velit doloremque cupiditate magnam impedit sequi debitis amet id culpa quaerat veritatis, facere totam fuga veniam sit odio ratione odit cum. Vero corrupti officia tenetur sed autem consectetur deserunt!</p>

                    <h3>Fasilitas Didapat : <i class="fa fa-indent"></i></h3>

                    <p>
                        <ul>
                            <li><p>Maskapai : Qatar Airways</p></li>
                            <li><p>Hotel Madinah: Manazel Falah/*3 Setaraf (jarak 200 m-an/5 menitan ke Masjid Nabawi)</p></li>
                            <li><p>Hotel Makkah: Lemeridien Towers/ *3 setaraf (2 menit via Shuttle Bus + 5 menitn jalan
                                kaki ke Masjidil Haram)</p></li>
                            <li><p>City Tour Madinah & Makkah</p></li>
                            <li><p>Perlengkapan Umroh (Koper, Tas Kabin, Tas Paspor, Kain Ihram (laki-laki),
                                Sabuk Ihram (laki-kai), Mukena, Khimar, Tas Serut, Bahan Batik Seragam, Buku
                                Manasik)</p>
                            </li>
                            <li>
                                <p>Bagasi 23 kg x2 + 7 kg kabin</p>
                            </li>
                            <li>
                                <p>Manasik Umroh Offline di Hotel</p>
                            </li>
                            <li>
                                <p>Kereta Cepat Madinah-Makkah</p>
                            </li>
                        </ul>
                    </p> --}}
                    </div>
                </div>
            </div>

            <div class="row2">
                <div class="row2-col1">
                    <h3>Deskripsi : <i class="fa fa-indent"></i></h3>
                    <p>{{ $data->deskripsi }}</p>
                </div>

                <div class="row2-col2">
                    <h3>Kelengkapan : <i class="fa fa-indent"></i></h3>

                    <div class="row2-col2">
                        @if ($data->foto_sertifikat != null)
                            <div
                                <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                    <p style="font-size: 24px; color: #28a745; margin-right: 10px;">&#10004;</p>
                                    <p style="font-size: 16px;">Sertifikat Rumah</p>
                                </div>
                            @else
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        function noTelp(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
                return true
            }
        }

        const dropdowns = document.querySelectorAll('.dropdown');
        dropdowns.forEach(dropdowns => {
            const select = dropdowns.querySelector('.select');
            const caret = dropdowns.querySelector('.caret');
            const menu = dropdowns.querySelector('.menu');
            const options = dropdowns.querySelector('.menu li');
            const selected = dropdowns.querySelector('.selected');

            select.addEventListener('click', () => {
                select.classList.toggle('select-clicked');
                caret.classList.toggle('caret-rotate');
                menu.classList.toggle('menu-open');
            });

            options.forEach(option => {
                option.addEventListener('click', () => {
                    selected.innerText = option.innerText;
                    select.classList.remove('select-clicked');
                    caret.classList.remove('caret-rotate');
                    menu.classList.remove('menu-open');
                    options.forEach(option => {
                        option.classList.remove('active');
                    });
                    option.classList.add('active');
                });
            });
        });

        function changeProductImage(clickedImage) {
            const productImg = document.getElementById('productImg');
            productImg.src = clickedImage.src;

            // Menghapus kelas 'clicked' dari semua elemen gambar sebelumnya
            const allSmallImgCols = document.querySelectorAll('.small-img-col');
            allSmallImgCols.forEach(imgCol => {
                imgCol.classList.remove('clicked');
            });

            // Menambahkan kelas 'clicked' pada elemen gambar yang diklik
            clickedImage.parentElement.classList.add('clicked');
        }


    </script>
@endsection


