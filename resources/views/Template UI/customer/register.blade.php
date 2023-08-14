@extends('layouts.main')

@section("title")
    La Tahzan | Daftar
@endsection

@section('content')
<div class="container-register-all">
    <div class="register">
        <h1>Yuk Daftar Dulu Disini!</h1>
        <h5>Daftar terlebih dahulu untuk mengakses fitur lanjutan kami!</h5>

        <input type="text" name="Nama" placeholder="Nama Lengkap">
        <input type="text" name="Alamat" placeholder="Alamat Lengkap">
        <input type="text" name="Telp" onkeypress="return noTelp(event)" placeholder="Nomor Telfon Aktif">
        <input type="date" name="Tanggal" placeholder="Tanggal Lahir">
        <input type="text" name="Tempat" placeholder="Tempat Lahir">
        <input type="text" name="Email" placeholder="Email">
        <input type="password" name="Password" placeholder="Password">
        <input type="password" name="Password" placeholder="Ketik Ulang Password">
        <button type="submit">Daftar</button>
        <p>Sudah Punya Akun?<span><a href="#">Masuk</a></span></p>
    </div>
</div>
@endsection
