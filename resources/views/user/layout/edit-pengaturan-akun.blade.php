@include('user.layout.templates.header')
@include('user.layout.templates.navbar')

    <main>
      <div class="edit-profile__container">
        <div class="edit-profile__menu">
          <nav class="edit-profile__navigation">
            <ul>
              <li>
                <a href="{{ route('user.edit-profile-page', ['id' => $user->id]) }}"><i class="fa-solid fa-user"></i>Profile</a>
              </li>
              <li>
                <a href="{{ route('user.edit-skill-page', ['id' => $user->id]) }}"><i class="fa-solid fa-brain"></i>Kemampuan</a>
              </li>
              <li>
                <a href="{{ route('user.edit-akun-page', ['id' => $user->id]) }}"><i class="fa-solid fa-gear"></i>Pengaturan Akun</a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="edit-akun__container">
          <div class="edit-akun__wrapper">
            <div class="edit-akun__headline">
              <h2>Pengaturan Akun</h2>
            </div>
            <form action="{{ route('user.edit-akun-action', ['id' => $user->id]) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="edit-akun__form__container">
                <div class="edit-akun__form">
                  <div class="edit-akun__item">
                    <label>Username</label>
                    <input
                      class="edit-akun__input"
                      type="text"
                      id="username"
                      name="username"
                      value="{{ old('user', $user->username) }}"
                      required
                    />
                  </div>
                  <div class="edit-akun__item">
                    <label>Email</label>
                    <input
                      class="edit-akun__input"
                      type="email"
                      id="email"
                      name="email_user"
                      value="{{ old('user', $user->email_user) }}"
                      required
                    />
                  </div>
                  <div class="edit-akun__item">
                    <label>Kata Sandi</label>
                    <input
                      class="edit-akun__input"
                      type="password"
                      id="password"
                      name="password"
                      value="{{ old('user', $user->password) }}"
                      required
                    />
                  </div>
                </div>
                <button class="edit-akun__button">Simpan Perubahan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
@include('user.layout.templates.footer')