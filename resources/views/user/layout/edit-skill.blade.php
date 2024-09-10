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
    <div class="edit-skill__container">
      <div class="edit-skill__wrapper">
        <div class="edit-skill__headline">
          <h2>Kemampuan</h2>
        </div>
        <div class="edit-skill__list">
          <ul>
            @foreach ($user->skills as $skill)
              <div class="edit-skill__item">
                <li>{{ $skill->nama_skill }}</li>
                <form action="{{ route('user.remove-skill-action', ['id' => $user->id, 'id_skill' => $skill->id_skill]) }}" method="POST" style="display: inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="edit-skill__delete"><i class="fa-solid fa-trash"></i></button>
                </form>
              </div>
              <hr />
            @endforeach
          </ul>
        </div>
        <form action="{{ route('user.add-skill-action', ['id' => $user->id]) }}" method="POST">
          @csrf
          <div class="edit-skill__form">
            <input
              class="edit-skill__input"
              type="text"
              id="skill"
              name="nama_skill"
              placeholder="Tambahkan kemampuan baru"
              required
            />
            <button class="edit-skill__button" type="submit">Tambah Skill</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
@include('user.layout.templates.footer')
