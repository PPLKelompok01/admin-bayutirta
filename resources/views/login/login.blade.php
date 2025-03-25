@extends('loginPage')
@section('login')

<div class="container-fluid">
    <div class="row d-flex flex-row">
        <div class="col vh-100 p-0 mb-lg-0 d-none d-lg-block">
            <img class="image" src="/img/login.bg.png" alt="login">
        </div>
        <div class="col d-flex flex-column align-items-center justify-content-center p-5 p-lg-2 vh-100">
            <div>
                <div class="title mb-5">
                    <h1 class="mb-2">Masuk Akun</h1>
                    <p>Masuk akun admin kamu untuk mengatur websitemu</p>
                </div>
                <div class="form mb-5">
                    <form method="POST" action="/" class="d-flex flex-column gap-3">
                        @csrf
                        <div class="d-flex flex-column gap-2">

                            <label for="username" class="form-label fw-bold">Username</label>
                            <input
                                id="username"
                                name="username"
                                placeholder="Tulis username anda"
                                class="form-control p-1"
                                required
                                autofocus
                            />
                        </div>
                        <div class="d-flex flex-column gap-2">
                            <label for="inputPassword5" class="form-label fw-bold">Kata Sandi</label>
                            <input
                                type="password"
                                id="inputPassword5"
                                name="password"
                                placeholder="Tulis kata sandi anda"
                                class="form-control p-1"
                                aria-describedby="passwordHelpBlock"
                                required
                            />
                        </div>
                        <div class="button">
                            <button type="submit" class="btn btn-primary btn-2">
                                Masuk
                            </button>
                        </div>
                        @if (isset($msg))
                            <h1>{{$msg}}</h1>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection