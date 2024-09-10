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
        <div class="edit-personal__container">
          <div class="edit-personal__wrapper">
            <form class="button-wrapper" action="{{ route('user.edit-foto-profile-action', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data" id="editFotoProfileForm">
              @csrf
              @method('PUT')
              <div class="edit-personal__picture">
                  @if(!empty($user->foto_profile))
                  <img class="edit-profile__picture" src="{{ asset('storage/foto-profile/'.$user->foto_profile) }}" id="profileImage" />
                @else
                  <img class="edit-profile__picture" src="{{asset('img/logo-user.png')}}" alt="profile user" />
                @endif
                  <label for="uploadInput" id="uploadLabel">
                      <i class="fa-regular fa-pen-to-square edit-icon"></i>
                  </label>
                  <input type="file" id="uploadInput" name="foto_profile" style="display: none;" />
                  <input type="hidden" id="cropped_image" name="cropped_image">
              </div>
              <button class="upload-edit" type="submit">Upload</button>
          </form>
      
          <div>
              <img id="preview">
          </div>

            <div class="edit-personal__headline">
              <h2>Data Diri</h2>
            </div>
              <div class="edit-personal__form__container">
                <form action="{{ route('user.edit-profile-action', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="edit-personal__form">
                  <div class="edit-personal__item">
                    <label>Nama Lengkap</label>
                    <input
                      class="edit-personal__input"
                      type="text"
                      id="skill"
                      name="nama_user"
                      required
                      value="{{ old('user', $user->nama_user) }}"
                    />
                  </div>
                  <div class="edit-personal__item">
                    <label>Bio</label>
                    <input
                      class="edit-personal__input"
                      type="text"
                      id="skill"
                      name="bio"
                      value="{{ old('user', $user->bio) }}"
                    />
                  </div>
                  <div class="edit-personal__item">
                    <label>Nomor Telephone</label>
                    <input
                      class="edit-personal__input"
                      type="text"
                      id="skill"
                      name="nomor_telephone"
                      value="{{ old('user', $user->nomor_telephone) }}"
                      required
                    />
                  </div>
                  <div class="edit-personal__item">
                    <label>Usia</label>
                    <input
                      class="edit-personal__input"
                      type="text"
                      id="skill"
                      name="usia"
                      value="{{ old('user', $user->usia) }}"
                    />
                  </div>
                  <div class="edit-personal__item">
                    <label>Domisili</label>
                    <input
                      class="edit-personal__input"
                      type="text"
                      id="skill"
                      name="domisili"
                      value="{{ old('user', $user->domisili) }}"
                    />
                  </div>
                  <div class="edit-personal__item">
                    <label>Gender</label>
                    <select name="gender">
                      <option value="">Pilih Gender</option>
                      @foreach($gender as $gender)
                        <option value="{{ $gender }}" @if(old('gender', $user->gender) == $gender) selected @endif>{{ ucfirst($gender) }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="edit-personal__item">
                    <label>Pendidikan Terakhir</label>
                    <select name="pendidikan_terakhir">
                      <option value="">Pilih Pendidikan Terakhir</option>
                      @foreach($pendidikanTerakhir as $pendidikan)
                        <option value="{{ $pendidikan }}"@if(old('pendidikan', $user->pendidikan_terakhir) == $pendidikan) selected @endif>{{ ucfirst($pendidikan) }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="edit-personal__item">
                    <label>CV</label>
                    <input
                      class="edit-personal__input"
                      type="file"
                      name="cv"
                    />
                  </div>
                </div>
              </div>
            <div class="edit-personal__headline">
              <h2>Tentang Saya</h2>
            </div>
            <div>
              <div class="edit-personal__form__container">
                <div class="edit-personal__form-deskripsi">
                  <textarea
                    class="edit-personal__input"
                    type="text"
                    id="deskripsi"
                    name="deskripsi"
                  >{{ old('user', $user->deskripsi) }}</textarea>
                </div>
                <button class="edit-personal__button" type="submit">Simpan Perubahan</button>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </main>
@include('user.layout.templates.footer')
