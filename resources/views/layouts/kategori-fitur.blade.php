<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-landing.css">
    <link rel="stylesheet" href="css/style-login-register.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title')</title>
</head>
<body>
    <div class="container-all">

        <div class="container-navbar">

            <div class="navbar">
                <div class="nav-title">
                    <a href="/"><h1>LaTahzan</h1></a>
                </div>
                <div class="nav-btn">
                    <ul>
                        <li><a href="#">Layanan</a></li>
                        <li><a href="#">Testimoni</a></li>
                        <li><a href="#">Kontak Kami</a></li>
                        <li><a href="#">Tentang</a></li>
                    </ul>
                </div>

                <div class="searchbar">
                    <form>
                        <input type="text" placeholder="Temukan Motor, Rumah atau Paket Umroh Disini..">
                        <button type="submit">Cari</button>
                    </form>
                </div>

                <div class="login-register">
                    <div class="content">
                        <a href="/register">Daftar</a>
                        <button type="button" onclick="welcome()">Masuk</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="category-menu">
            <div class="dropdown">
                <div class="select">
                    <span class="selected">Semua Kategori</span>
                    <div class="caret"></div>
                </div>
                <ul class="menu">
                    <li><a href="/umroh">Umroh</a></li>
                    <li><a href="/properti">Properti</a></li>
                    <li><a href="/otomotif">Otomotif</a></li>
                </ul>
            </div>
        </div>

        <div class="container-content">
            @yield('content-kategori')
        </div>


    </div>

    <footer class="footer-container">
        <div class="footer-left">
            <h3>La <span>Tahzan</span></h3>
            <p class="footer-links">
                <a href="#">Home</a>
                |
                <a href="#">About</a>
                |
                <a href="#">Contact</a>
                |
                <a href="#">Blog</a>
            </p>

            <p class="footer-company-name">Copyright © 2021 <strong>La Tahzan</strong>
            All right reserved</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Blitar,</span> Jawa Timur</p>
            </div>
            <div>
                <i class="fa fa-phone"></i>
                <p>+62 877-7719-8429</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="#">la.tahzan@gmail.com</a></p>
            </div>
        </div>

        <div class="footer-right">
            <p class="footer-company-about">
                <span>About The Company</span>
                <strong>La Tahzan</strong> Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                Perspiciatis delectus mollitia qui? Corporis suscipit
                magni nemo facilis porro, non dolore!
            </p>
            <div class="footer-icons">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
    </footer>


    <script type="text/javascript">
        function noTelp(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57)){
                return false;
            return true
            }
        }

        function welcome() {
            window.open("/login")
        }

        function oto() {
            window.open("/otomotif")
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
                    options.forEach(option =>{
                        option.classList.remove('active');
                    });
                    option.classList.add('active');
                });
            });
        });

    </script>

</body>

</html>
