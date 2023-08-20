@extends('Template UI.layouts.main')

@section('title')
    La Tahzan | Home
@endsection


@section('content')

    <div class="layer-1">
        <div class="layer1-left">
            <h5>Jaminan 100% Aman!</h5>
            <h1>Daftar Umroh Kini Lebih Gampang, Cepat dan Aman Pake La Tahzan!</h1>
            <h5 style="font-size: 13px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis
                voluptates dolore autem optio corporis, veniam error vero obcaecati
                ratione voluptate laboriosam iste vitae magni, rerum maxime exercitationem
                iure doloribus, illum iusto architecto
            </h5>

            <button type="button">Lihat Layanan Kami!</button>
        </div>

        <div class="layer1-right">
            <img src="img/logo-1.png">
        </div>
    </div>

    {{-- <div class="layer-2-container">
        <div class="layer-2">
            <div class="layer2-top">
                <h1>Layanan Kami</h1>
                <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste, nisi?</h5>
            </div>


            <div class="layer2-bottom">
                <div class="btn-feature">
                    <button type="button" onclick="umroh()"><img src="img/umroh.png"></button>
                    <h3>Umroh</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Suscipit atque labore quo unde, sit recusandae.</p>
                </div>
                <div class="btn-feature">
                    <button type="button" onclick="prop()"><img src="img/properti.png"></button>
                    <h3>Properti</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Suscipit atque labore quo unde, sit recusandae.</p>
                </div>
                <div class="btn-feature">
                    <button type="button" onclick="oto()"><img src="img/motor.png"></button>
                    <h3>Otomotif</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                        Suscipit atque labore quo unde, sit recusandae.</p>
                </div>
            </div>

        </div>
    </div> --}}


    {{-- ------------------------------------------------------------------------------------------------------------------------------------------- --}}

    <div class="layer-3-container">
        <div class="layer-3">
            <div class="layer3-title">
                <h1>Paket Umroh / Haji Terbatas!</h1>
            </div>

            <div class="line">
                <h4>&nbsp</h4>
            </div>

            <div class="layer3-content">
                @foreach ($data as $row)
                    <div class="product">
                        <div class="image">
                            <img src="img/umroh/umroh.jpeg" alt="cbr">
                        </div>
                        <div class="name-price">
                            <h3>{{ $row->nama_paket }}</h3>
                            <h1>Rp. {{ number_format($row->harga_awal, 0, ',', '.') }},-</h1>
                        </div>
                        <div class="year">
                            <?php
                            $days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

                            $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                            $tanggal_berangkat = date('Y-m-d', strtotime($row->tanggal_berangkat));
                            $tanggal_parts = explode('-', $tanggal_berangkat);
                            $day = date('w', strtotime($tanggal_berangkat));
                            $formatted_date = $days[$day] . ', ' . $tanggal_parts[2] . ' ' . $months[(int) $tanggal_parts[1] - 1] . ' ' . $tanggal_parts[0];
                            ?>
                            <h4>Tanggal Berangkat :</h4>
                            <ul>
                                <li style="font-size: 12px; margin-top:10px;">{{ $formatted_date }}</li>
                            </ul>

                        </div>

                        <div class="fasilitas">
                            <h4>Fasilitas :</h4>
                            <ul>
                                <li>
                                    <p>Maskapai: {{ $row->Maskapai }}</p>
                                </li>
                                <li>
                                    <p>Hotel: {{ $row->Hotel }}</p>
                                </li>
                                <li>
                                    <p>{{ $row->fasilitas1 }}</p>
                                </li>
                                <li>
                                    <p>
                                        @if ($row->fasilitas2 != null)
                                            {{ $row->fasilitas2 }}
                                        @else
                                            -
                                        @endif
                                    </p>
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
                        </div>
                        <div class="buy">
                            <a href="/tampilkandetailumroh/{{ $row->id }}" class="btn-produk">Beli Sekarang</a>
                            {{-- <form action="{{ route('konfirmasi-umroh', $row->id) }}" method="GET">
                                    @csrf
                                </form> --}}
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- <div class="layer4-btn">
                <button type="button" onclick="oto()">Beli Sekarang Selengkapnya Otomotif</button>
            </div> --}}

        </div>

    </div>


    <div class="layer-4-container">
        <div class="layer-4">
            <div class="layer4-title">
                <h1>Rekomendasi Otomotif</h1>
            </div>

            <div class="line">
                <h4>&nbsp</h4>
            </div>

            <div class="layer4-content">

                @foreach ($dataOto as $row)
                    <div class="product">
                        <div class="img-size">
                            <div class="image">
                                <img src="{{ asset('fotoOto/' . $row->foto1) }}">
                            </div>
                        </div>
                        <div class="name-price">
                            <h3>{{ $row->nama_kendaraan }}</h3>
                            <h1>Rp. {{ number_format($row->harga, 0, ',', '.') }},-</h1>
                        </div>
                        <div class="year">
                            <h5 style="font-size: 12px;">{{ $row->tahun }}</h5>
                        </div>
                        <div class="buy">
                            <a href="/tampilkandetailoto/{{ $row->id }}" class="btn-produk">Beli Sekarang</a>
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- <div class="layer4-btn">
                <button type="button" onclick="oto()">Beli Sekarang Selengkapnya Otomotif</button>
            </div> --}}

        </div>

    </div>

    <div class="layer-4-container">
        <div class="layer-4">
            <div class="layer4-title">
                <h1>Rekomendasi Properti Disekitar Anda!</h1>
            </div>

            <div class="line">
                <h4>&nbsp</h4>
            </div>


            <div class="layer4-content">
                @foreach ($dataprop as $row)
                <div class="product">
                    <div class="img-size">
                        <div class="image">
                            <img src="{{ asset('fotoProp1/'.$row->foto1) }}" height="50px">
                        </div>
                    </div>
                    <div class="name-price">
                        <h3>{{ $row->nama_properti }}</h3>
                        <h1>Rp. {{ number_format($row->harga, 0, ',', '.') }},-</h1>
                    </div>
                    <div class="year">
                        <p>{{ $row->luas }}m2</p>
                        <p>&nbsp;</p>
                        <p style="font-size: 10px;">{{ $row->alamat }}, Kota. {{ $row->kota }}</p>
                    </div>
                    <div class="buy">
                        <a class="btn-produk">Beli Sekarang</a>
                    </div>
                </div>
                @endforeach

            </div>


            {{-- <div class="layer4-btn">
                <button type="button" onclick="prop()">Beli Sekarang Selengkapnya Properti</button>
            </div> --}}

        </div>
    </div>
@endsection
