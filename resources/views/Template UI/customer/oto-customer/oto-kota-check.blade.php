
@extends('Template UI.layouts.main')
@section('content')


    <div class="title" style="text-align: center;">
        <h1>Dari Kota Mana Anda Berasal?</h1>
    </div>

    <div class="kota-check">
        <select name="selected_city" id="selectedCity">
            <option value="">Pilih Kota</option>
            <option value="Blitar">Blitar</option>
            <option value="Kota Lain">Kota Lain</option>
        </select>


        <button id="submitBtn">Pilih</button>


    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectedCity = document.getElementById("selectedCity");
            const submitBtn = document.getElementById("submitBtn");

            submitBtn.addEventListener("click", function() {
                const selectedValue = selectedCity.value;
                if (selectedValue === "Blitar") {
                    window.location.href = "/tambahOto";
                } else if (selectedValue === "Kota Lain") {
                    const confirmed = confirm("Mohon maaf, Fitur kami belum tersedia untuk Kota anda. Hubungi Admin untuk informasi lebih lanjut. ( (+62) 81-2329-5572-7 )");
                    if (confirmed) {
                        window.location.href = "/dashboard-oto-customer";
                    }
                }
            });
        });
    </script>

@endsection
