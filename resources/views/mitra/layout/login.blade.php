@include('user.layout.templates.header')
    <div class="container">
        <div class="container-left">
            <header class="container-left__header">
                <div class="container-left__content">
                    <img class="content-logo" src="{{asset('img/logo.png')}}">
                </div>
            </header>
            <div class="main-container-login">
                <main class="main-content">
                    <div class="content-left__text">
                        <p class="content-left__text-up">Selamat Datang!</p>
                        <p class="content-left__text-down">Rekrut volunteer cepat dan tepat!</p>
                    </div>
                        <form {{ route('mitra.login.action') }} method="POST" class="login-form">
                            @csrf
                            <div class="form-signup">
                                <div class="form-login-container">
                                    <div class="form-signup-item">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" name="username" required>
                                    </div>
                                    <div class="form-login-item">
                                        <label for="password">Kata Sandi</label>
                                        <input type="password" id="password" name="password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-signup-container__button">
                                <button class="form-login-button__login" type="submit">Masuk</button>
                                <a href="{{route('mitra.register')}}" class="form-login-button__signup">Belum Punya Akun?</a>
                            </div>
                        </form>
                </main>
            </div>
        </div>
        <div class="container-right">
            <div class="container-right__content">
                <img class="content__hero-image" src="{{asset('img/hero.jpg')}}">
                <div class="content__hero-tagline">
                    <h1 class="content__hero-tagline__text">Muda, Bergerak, Bertindak.</h1>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</body>
</html>