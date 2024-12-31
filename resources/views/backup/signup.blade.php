@include('user.layout.templates.header')
    <div class="container">
      <div class="container-left">
        <header class="container-left__header">
          <div class="container-left__content">
            <img class="content-logo" src="{{ asset('img/volhub-small-logo.png') }}" />
          </div>
        </header>
        <div class="main-container-signup">
          <main class="main-content">
            <div class="content-left__text">
              <p class="content-left__text-up">Buat Akun Pribadi</p>
              <p class="content-left__text-down">Jadilah bagian dari VolHub!</p>
            </div>
            <form  action={{ route('user.register.action')}} method="POST">
              @csrf
              <div class="form-signup">
                <div class="form-signup-container">
                  <div class="form-signup-item">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama_user" required />
                  </div>
                  <div class="form-signup-item">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required />
                  </div>
                  <div class="form-signup-item">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email_user" required />
                  </div>
                  <div class="form-signup-item">
                    <label for="password">Kata Sandi</label>
                    <input
                      type="password"
                      id="password"
                      name="password"
                      required
                    />
                  </div>
                  <div class="form-signup-item">
                    <label for="nomor">Nomor Handphone</label>
                    <input type="text" id="nomor" name="nomor_telephone" required />
                  </div>
                  <div></div>
                </div>
                <div class="form-signup-container__button">
                  <button class="form-signup-button__signup" type="submit">Buat Akun</button>
                  <a href="{{route('user.login')}}" class="form-signup-button__login">Sudah Punya Akun?</a>
                </div>
              </div>
            </form>
          </main>
        </div>
      </div>
      <div class="container-right">
        <div class="container-right__content">
          <img class="content__hero-image" src="/img/hero.jpg" />
          <div class="content__hero-tagline">
            <h1 class="content__hero-tagline__text">
              Muda, <br> 
              Bergerak, Bertindak.
            </h1>
          </div>
        </div>
      </div>
    </div>
    @include('sweetalert::alert')
  </body>
</html>
