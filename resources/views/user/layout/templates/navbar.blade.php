<header class="app-bar">
    <div class="app-bar__logo">
      <img src="{{ asset('img/volhub-small-logo.png') }}" alt="Volhub Logo" />
      <i id="drawerButton" class="fa-solid fa-bars"></i>
    </div>
    <nav class="app-bar__navigation">
      @if(auth()->check())
      @php
          $user = auth()->user();
      @endphp
      <ul class="">
        <li><a href="{{ route('home') }}">Beranda</a></li>
        <li><a href="{{ route('user.daftarKegiatan', ['id' => $user->id]) }}">Daftar Kegiatan</a></li>
        <li><a href="{{ route('user.faq') }}">FAQ</a></li>
      </ul>
      @else
      <ul class="">
        <li><a href="{{ route('home') }}">Beranda</a></li>
        <li><a href="{{ route('daftar.kegiatan') }}">Daftar Kegiatan</a></li>
        <li><a href="{{ route('user.faq') }}">FAQ</a></li>
      </ul>
      @endif
    </nav>

    @if(auth()->check())
      @php
          $user = auth()->user();
      @endphp
      <div class="app-bar__user-panel">
        <a href=""><i class="fa-solid fa-bell notification-icon"></i></a>
        <div class="app-bar__user-icon">
          @if(!empty($user->foto_profile))
            <img src="{{asset('storage/foto-profile/'.$user->foto_profile)}}" alt="profile user" />
          @else
            <img src="{{asset('img/logo-user.png')}}" alt="profile user" />
          @endif
        <i class="fa-solid fa-chevron-down user-dropdown"></i>
        </div>
      </div>
      <div class="dropdown">
        <div class="dropdown-item">
          <div class="dropdown-icon">
            <i class="fa-solid fa-user"></i>
          </div>
          <a href="{{ route('user.detail-profile-page', ['id' => $user->id]) }}"class="dropdown-text">PROFILE</a>
        </div>
        <div class="dropdown-item">
          <div class="dropdown-icon">
            <i class="fa-solid fa-gear"></i>
          </div>
          <a href="{{route('user.edit-profile-page', ['id' => $user->id])}}" class="dropdown-text">PENGATURAN AKUN</a>
        </div>
        <div class="dropdown-item">
          <div class="dropdown-icon">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
          </div>
          <a href="{{route('user.logout')}}" class="dropdown-text">KELUAR</a>
        </div>
      </div>
    @else
      <div class="app-bar__sign-up">
        <div class="app-bar__sign-up__user">
          <a href="{{route('user.login')}}">Masuk</a>
        </div>
        <div class="app-bar__sign-up__mitra">
          <a href="{{route('mitra.login')}}">Untuk Mitra</a>
        </div>
      </div>
    @endif
      
    <div class="mobile-nav">
      <li><a href="{{ route('home') }}">Beranda</a></li>
      <li><a href="{{ route('daftar.kegiatan') }}">Daftar Kegiatan</a></li>
      <li><a href="{{ route('user.faq') }}">FAQ</a></li>
      <li><a href="#">Notification</a></li>
      @if(auth()->check())
      @php
          $user = auth()->user();
      @endphp
      <li><a href="{{ route('user.detail-profile-page', ['id' => $user->id]) }}">Profile</a></li>
      <li><a href="{{ route('user.detail-profile-page', ['id' => $user->id]) }}">Pengaturan Akun</a></li>
      <li><a href="{{route('user.logout')}}">Keluar</a></li>
    @else

      <li><a href="{{route('user.register')}}" class="sign-up">Daftar</a></li>
    @endif

    </div>
  </header>

  