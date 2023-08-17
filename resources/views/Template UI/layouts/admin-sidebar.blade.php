{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style-dashboard-admin.css">
    <link rel="stylesheet" href="/css/style-table.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <title>Dashboard</title>
</head> --}}


{{-- penempatan di layout.app dan navigation-menu --}}

@extends('layouts.app')

@section('conn-admin')

    <body>
        {{-- x-app-layout untuk button log out yang blom nemu lokasi e wkwkwkw --}}

        {{-- <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot> --}}

        <div class="container">

            <div class="sidebar">
                <div class="header">
                    <div class="list-items">
                        <a href="#">
                            <img src="" alt="" class="icon">
                            <span class="desc-header">Admin La Tahzan</span>
                        </a>
                    </div>
                    <div class="illustration">
                        <img src="/img/logo-1.png" alt="">
                    </div>
                    <!-- Authentication -->

                    <div class="admin-name">
                        <div>
                            <p style="color: #ffffff">{{ Auth::user()->name }}</p>
                        </div>
                    </div>

                    <div class="profile-container">
                        <div>
                            <img src="/img/admin/profile.png" alt="" class="icon">
                        </div>

                        <div>
                            <x-dropdown-link href="{{ route('profile.show') }}" style="font-size: 16px; color:#14b74a; width:100px;">
                                {{ __('SetProfile') }}
                            </x-dropdown-link>
                        </div>


                    </div>

                    <div class="logout-container">
                        <div>
                            <img src="/img/admin/logout.png" alt="" class="icon">
                        </div>

                        <div>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();" style="font-size: 16px; color:#FA5252; width:100px;">
                                    <p>{{ __('Log Out') }}</p>
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>


                </div>

                <div class="main">

                    <div class="category">
                        <div class="sub">
                            <p>Input Produk</p>
                        </div>
                    </div>

                    <div class="list-items">
                        <a href="/input-umroh">
                            <img src="/img/admin/in-umroh.png" alt="" class="icon">
                            <span class="desc">Inp. Umroh</span>
                        </a>

                    </div>
                    <div class="list-items">
                        <a href="/input-oto">
                            <img src="/img/admin/in-oto.png" alt="" class="icon">
                            <span class="desc">Inp. Otomotif</span>
                        </a>
                    </div>

                    <div class="list-items">
                        <a href="/input-properti">
                            <img src="/img/admin/in-prop.png" alt="" class="icon">
                            <span class="desc">Inp. Properti</span>
                        </a>
                    </div>

                    <div class="category">
                        <div class="sub">
                            <p>Etalase Toko</p>
                        </div>
                    </div>

                    <div class="list-items">
                        <a href="/crd-umroh">
                            <img src="/img/admin/umroh.png" alt="" class="icon">
                            <span class="desc">Umroh</span>
                        </a>
                    </div>
                    <div class="list-items">
                        <a href="/crd-oto">
                            <img src="/img/admin/oto.png" alt="" class="icon">
                            <span class="desc">Otomotif</span>
                        </a>
                    </div>
                    <div class="list-items">
                        <a href="crd-properti">
                            <img src="/img/admin/prop.png" alt="" class="icon">
                            <span class="desc">Properti</span>
                        </a>
                    </div>

                    <div class="category">
                        <div class="sub">
                            <p>Data Transaksi</p>
                        </div>
                    </div>

                    <div class="list-items">
                        <a href="/trx-umroh">
                            <img src="/img/admin/tr-umroh.png" alt="" class="icon">
                            <span class="desc">Transaksi Umroh</span>
                        </a>
                    </div>

                    <div class="list-items">
                        <a href="/trx-oto">
                            <img src="/img/admin/tr-oto.png" alt="" class="icon">
                            <span class="desc">Transaksi Otomotif</span>
                        </a>
                    </div>

                    <div class="list-items">
                        <a href="/trx-properti">
                            <img src="/img/admin/tr-prop.png" alt="" class="icon">
                            <span class="desc">Transaksi Properti</span>
                        </a>
                    </div>

                    <div class="list-items">
                        <a href="/report">
                            <img src="/img/admin/report.png" alt="" class="icon">
                            <span class="desc">Laporan Transaksi</span>
                        </a>
                    </div>

                    <div class="category">
                        <div class="sub">
                            <p>Customer</p>
                        </div>
                    </div>

                    <div class="list-items">
                        <a href="/customer">
                            <img src="/img/admin/person.png" alt="" class="icon">
                            <span class="desc">Admin/Customer</span>
                        </a>
                    </div>

                </div>
            </div>

            <div class="main-content">
                <div id="menu-button">
                    <input type="checkbox" name="" id="menu-checkbox">
                    <label for="menu-checkbox" id="menu-label">
                        <div id="hamburger"></div>
                    </label>
                </div>
                @yield('content')
            </div>

        </div>

    </body>


    <script src="js/script.js"></script>
@endsection
