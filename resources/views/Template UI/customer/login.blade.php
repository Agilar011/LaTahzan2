@extends('layouts.main')

@section("title")
    La Tahzan | Masuk
@endsection


@section('content')
    <div class="container-login-all">
        <div class="login">
            <h1>Selamat Datang Kembali!</h1>
            <h5>Silahkan Masuk Untuk Melanjutkan</h5>
            <input type="text" name="Email" placeholder="Email">
            <input type="password" name="Password" placeholder="Password">
            <a href="#">Lupa Password?</a>
            <button type="submit">Masuk</button>
            <p>Belum Punya Akun?<span><a href="#">Daftar</a></span></p>
        </div>
    </div>
@endsection
