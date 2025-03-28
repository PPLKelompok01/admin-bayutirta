@extends('loginPage')
@section('login')

    <link rel="stylesheet" href="/css/login.css">

    <section class="background-radial-gradient overflow-hidden min-vh-100 d-flex align-items-center position-relative">
        <div id="radius-shape-1"></div>
        <div id="radius-shape-2"></div>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                function createShootingStar() {
                    let star = document.createElement("div");
                    star.classList.add("shooting-star");
                    star.style.left = Math.random() * 100 + "vw";
                    star.style.top = Math.random() * -10 + "vh";
                    star.style.animationDuration = (Math.random() * 2 + 1.5) + "s";
                    document.body.appendChild(star);
                    setTimeout(() => star.remove(), 2000);
                }
                setInterval(createShootingStar, 700);
            });
        </script>

        <div class="container py-5 h-100 d-flex justify-content-center align-items-center position-relative">
            <div class="row d-flex justify-content-center align-items-center w-100">
                <div class="col col-xl-10">
                    <div class="card bg-glass" style="border-radius: 1rem; height: 100%;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="/img/login.bg.png" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem; height: 100%; width: auto;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <img src="/img/vector.png" alt="Logo" class="me-3" style="height: 50px;">
                                        </div>
                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masuk dengan akun admin
                                        </h5>
                                        @if (session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="username">Username</label>
                                            <input type="text" id="username" class="form-control form-control-lg"
                                                name="username" required placeholder="Masukkan Username" />
                                        </div>
                                        <div class="form-outline mb-4">
                                            <label class="form-label fw-bold" for="password">Kata Sandi</label>
                                            <input type="password" id="password" class="form-control form-control-lg"
                                                name="password" required placeholder="Masukkan Kata Sandi" />
                                        </div>
                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-dark btn-lg btn-block" type="submit">Masuk</button>
                                        </div>
                                        <a href="#" class="small text-muted">Terms of use</a>
                                        <a href="#" class="small text-muted">Privacy policy</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection