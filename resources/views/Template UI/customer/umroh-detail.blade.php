

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
                            <img src="/fotoUmroh/kabah2.jpg" alt="" width="100%" id="productImg" class="foto-umroh">
                        </div>
                        <div class="small-img-row">
                            <div class="small-img-col">
                                <img src="/fotoUmroh/kabah2.jpg" alt="" width="100%" class="small-img"
                                    onclick="changeProductImage(this)">
                            </div>
                            <div class="small-img-col">
                                <img src="/fotoOto/Harga-Yamaha-R25-bekas.jpg" alt="" width="100%" class="small-img"
                                    onclick="changeProductImage(this)">
                            </div>
                            <div class="small-img-col">
                                <img src="/fotoStnk/planet9_Wallpaper_5000x2813.jpg" alt="" width="100%" class="small-img"
                                    onclick="changeProductImage(this)">
                            </div>
                            <div class="small-img-col">
                                <img src="/fotoUmroh/kabah.jpeg" alt="" width="100%" class="small-img"
                                    onclick="changeProductImage(this)">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="information">
                            <p class="path">Home/Umroh/{{ $data->nama_paket }}</p>
                            <h1>{{ $data->nama_paket }}</h1>
                            <h4 class="harga">Rp. {{ number_format($data->harga_awal, 0, ',', '.') }},-</h4>
                            <p class="attr-tgl">Tanggal Keberangkatan : <span>&nbsp; {{ $data->tanggal_berangkat }} </span>
                            </p>
                            <p class="attr">Jasa Travel : <span>&nbsp; {{ $data->jasa_travel }}</span></p>
                            <p class="attr">CP. Admin : <span>&nbsp; {{ $data->No_hp_uploader }}</span></p>
                            {{-- <select name="" id="">
                            <option value="">Pilih Warna</option>
                            <option value="">Merah</option>
                            <option value="">Putih</option>
                            <option value="">Hitam</option>
                        </select> --}}
                            <input type="number" value="1">
                            <form action="{{ route('konfirmasi-umroh', $data->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn-beli">Pesan Sekarang</button>
                                {{-- <a href="" class="btn-beli">Pesan Sekarang</a> --}}
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
                        <h3>Fasilitas Didapat : <i class="fa fa-indent"></i></h3>

                        <p>
                        <ul>
                            <li>
                                <p>Maskapai : {{ $data->Maskapai }}</p>
                            </li>
                            <li>
                                <p>Hotel Madinah: Manazel Falah/*3 Setaraf (jarak 200 m-an/5 menitan ke Masjid Nabawi)</p>
                            </li>
                            <li>
                                <p>Hotel Makkah: Lemeridien Towers/ *3 setaraf (2 menit via Shuttle Bus + 5 menitn jalan
                                    kaki ke Masjidil Haram)</p>
                            </li>
                            <li>
                                <p>City Tour Madinah & Makkah</p>
                            </li>
                            <li>
                                <p>Perlengkapan Umroh (Koper, Tas Kabin, Tas Paspor, Kain Ihram (laki-laki),
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
                        </p>
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


