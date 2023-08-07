@extends('layouts.main')

@section('title')
    La Tahzan | Home
@endsection

@section('content')
    <div action class="container-detail">
        <div class="small-container single-product">
            <div class="row">
                <div class="col-2">
                    <img src="/fotoUmroh/kabah2.jpg" alt="" width="100%" id="productImg" class="foto-umroh">
                    <div class="small-img-row">
                        <div class="small-img-col">
                            <img src="/fotoUmroh/kabah2.jpg" alt="" width="100%" class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="/fotoUmroh/kabah2.jpg" alt="" width="100%" class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="/fotoUmroh/kabah2.jpg" alt="" width="100%" class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="/fotoUmroh/kabah2.jpg" alt="" width="100%" class="small-img">
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="information">
                        <p class="path">Home/Umroh</p>
                    <h1>{{ $data->nama_paket }}</h1>
                    <h4 class="harga">Rp. {{ number_format($data->harga, 0, ',', '.') }},-</h4>
                    <p class="attr-tgl">Tanggal Keberangkatan : <span>&nbsp; 21/08/2023</span></p>
                    <p class="attr">Jasa Travel : <span>&nbsp; An-Namiroh</span></p>
                    <p class="attr">CP. Admin : <span>&nbsp; 081233756910</span></p>
                    {{-- <select name="" id="">
                        <option value="">Pilih Warna</option>
                        <option value="">Merah</option>
                        <option value="">Putih</option>
                        <option value="">Hitam</option>
                    </select> --}}
                    <input type="number" value="1">
                    <a href="" class="btn-beli">Pesan Sekarang</a>
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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat eligendi neque velit doloremque cupiditate magnam impedit sequi debitis amet id culpa quaerat veritatis, facere totam fuga veniam sit odio ratione odit cum. Vero corrupti officia tenetur sed autem consectetur deserunt!</p>
                </div>

                <div class="row2-col2">
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
                    </p>
                </div>

            </div>
        </div>
    </div>
@endsection
