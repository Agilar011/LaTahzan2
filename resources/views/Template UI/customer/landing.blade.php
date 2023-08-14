<x-app-layout>
    {{-- penempatan di layout.app dan navigation-menu --}}
</x-app-layout>
@extends('Template UI.layouts.main')

@section('title')
    La Tahzan | Home
@endsection


@section('content')
    <div class="layer-1">
        <div class="layer1-left">
            <h5>Jaminan 100% Aman!</h5>
            <h1>Daftar Umroh Kini Lebih Gampang, Cepat dan Aman Pake La Tahzan!</h1>
            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis
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

            @foreach ($data as $row)
                <div class="layer3-content">
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
                                <li>{{ $formatted_date }}</li>
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
                                @if ($row->fasilitas1 != null)
                                    <li>
                                        <p>{{ $row->fasilitas1 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas2 != null)
                                    <li>
                                        <p>{{ $row->fasilitas2 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas3 != null)
                                    <li>
                                        <p>{{ $row->fasilitas3 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas4 != null)
                                    <li>
                                        <p>{{ $row->fasilitas4 }}</p>
                                    </li>
                                @else
                                @endif

                                @if ($row->fasilitas5 != null)
                                    <li>
                                        <p>{{ $row->fasilitas5 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas6 != null)
                                    <li>
                                        <p>{{ $row->fasilitas6 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas7 != null)
                                    <li>
                                        <p>{{ $row->fasilitas7 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas8 != null)
                                    <li>
                                        <p>{{ $row->fasilitas8 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas9 != null)
                                    <li>
                                        <p>{{ $row->fasilitas9 }}</p>
                                    </li>
                                @else
                                @endif
                                @if ($row->fasilitas10 != null)
                                    <li>
                                        <p>{{ $row->fasilitas10 }}</p>
                                    </li>
                                @else
                                @endif

                            </ul>
                        </div>
                        <div class="buy">
                            <a href="/tampilkandetailumroh/{{ $row->id }}" class="btn-produk">Beli Sekarang</a>
                        </div>
                        {{-- <div class="buy">
                            <form action="{{ route('konfirmasi-umroh', $row->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn-ekspor">Purchase</button>
                            </form>
                        </div> --}}
                    </div>
                </div>
            @endforeach



            {{-- <div class="layer4-btn">
                <button type="button" onclick="umroh()">Lihat Selengkapnya Paket Umroh / Haji</button>
            </div> --}}

        </div>

    </div>


    {{-- ------------------------------------------------------------------------------------------------------------------------------------------- --}}



    <div class="layer-4-container">
        <div class="layer-4">
            <div class="layer4-title">
                <h1>Rekomendasi Otomotif</h1>
            </div>

            <div class="line">
                <h4>&nbsp</h4>
            </div>

            <div class="layer4-content">
                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/satria.png" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/fazio.png" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/vario.png" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/ninja.png" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/motor/cbr.jpg" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>All New CBR150R</h3>
                        <h1>Rp. 37.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>2021</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

            </div>

            {{-- <div class="layer4-btn">
                <button type="button" onclick="oto()">Lihat Selengkapnya Otomotif</button>
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
                <div class="product">
                    <div class="image">
                        <img src="img/rumah/type26.png" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>Dijual Rumah tipe 36</h3>
                        <h1>Rp. 670.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>96m2</h5>
                        <h5>Kec. Sananwetan, Kota Blitar</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/rumah/type26.png" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>Dijual Rumah tipe 36</h3>
                        <h1>Rp. 670.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>96m2</h5>
                        <h5>Kec. Sananwetan, Kota Blitar</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/rumah/type26.png" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>Dijual Rumah tipe 36</h3>
                        <h1>Rp. 670.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>96m2</h5>
                        <h5>Kec. Sananwetan, Kota Blitar</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/rumah/type26.png" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>Dijual Rumah tipe 36</h3>
                        <h1>Rp. 670.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>96m2</h5>
                        <h5>Kec. Sananwetan, Kota Blitar</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/rumah/type26.png" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>Dijual Rumah tipe 36</h3>
                        <h1>Rp. 670.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>96m2</h5>
                        <h5>Kec. Sananwetan, Kota Blitar</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/rumah/type26.png" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>Dijual Rumah tipe 36</h3>
                        <h1>Rp. 670.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>96m2</h5>
                        <h5>Kec. Sananwetan, Kota Blitar</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/rumah/type26.png" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>Dijual Rumah tipe 36</h3>
                        <h1>Rp. 670.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>96m2</h5>
                        <h5>Kec. Sananwetan, Kota Blitar</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/rumah/type26.png" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>Dijual Rumah tipe 36</h3>
                        <h1>Rp. 670.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>96m2</h5>
                        <h5>Kec. Sananwetan, Kota Blitar</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/rumah/type26.png" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>Dijual Rumah tipe 36</h3>
                        <h1>Rp. 670.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>96m2</h5>
                        <h5>Kec. Sananwetan, Kota Blitar</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

                <div class="product">
                    <div class="image">
                        <img src="img/rumah/type26.png" alt="cbr">
                    </div>
                    <div class="name-price">
                        <h3>Dijual Rumah tipe 36</h3>
                        <h1>Rp. 670.000.000,-</h1>
                    </div>
                    <div class="year">
                        <h5>96m2</h5>
                        <h5>Kec. Sananwetan, Kota Blitar</h5>
                    </div>
                    <div class="buy">
                        <button>Beli Sekarang</button>
                    </div>
                </div>

            </div>

            {{-- <div class="layer4-btn">
                <button type="button" onclick="prop()">Lihat Selengkapnya Properti</button>
            </div> --}}

        </div>
    </div>
@endsection
