<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto justify-content-end"> <!-- Menggunakan justify-content-end untuk memposisikan ke kanan -->
        <div class="whatsapp-logo m-2">
            <!-- Menggunakan tautan untuk membuka WhatsApp Web -->
            <a href="https://web.whatsapp.com/" target="_blank" class="text-decoration-none text-dark">
                <img src="{{ asset('img/whatsapp-logo.png') }}" alt="WhatsApp Logo" width="40" height="40">
            </a>
        </div>
        <div class="logout m-2">
            <a href="/logout" class="btn btn-danger" role="button">
                LogOut
            </a>
        </div>
    </ul>
</nav>
