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
            <a href="{{ route('user.detail-profile-page', ['id' => $user->id]) }}" class="dropdown-text">PROFILE</a>
        </div>
        <div class="dropdown-item">
            <div class="dropdown-icon">
                <i class="fa-solid fa-gear"></i>
            </div>
            <a href="" class="dropdown-text">PENGATURAN AKUN</a>
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

<main>
    <div class="layout-wrapper">
        @if(auth()->check())
        @php
        $user = auth()->user();
        @endphp
        <section class="sidebar">
            <div class="profile">
                <div class="profile__image">
                    @if(!empty($user->foto_profile))
                    <img src="{{asset('storage/foto-profile/'.$user->foto_profile)}}" alt="profile user" />
                    @else
                    <img src="{{asset('img/logo-user.png')}}" alt="profile user" />
                    @endif
                </div>
                <div class="profile__data">
                    <div class="profile__data-name">
                        <p>{{$user->nama_user}}</p>
                    </div>
                    <div class="profile__data-location">
                        @if(!empty($user->email_user))
                        <p>{{ $user->email_user }}</p>
                        @else
                        <p>Ups! Data masih kosong</p>
                        @endif
                    </div>
                    <form action="{{ route('user.detail-profile-page', ['id' => $user->id]) }}" method="POST"
                        class="profile__data-button">
                        @csrf
                        @method('GET')
                        <button>Kegiatan</button>
                    </form>
                </div>
            </div>
            <div class="skill">
                <div class="skill__header">
                    <p>Top Skills</p>
                </div>
                <div class="skill__item">
                    <ul>
                        <?php $no = 1 ?>
                        @foreach($user->skills as $skill)
                        <li>{{$skill->nama_skill}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        @else
        <section class="sidebar">
            <div class="profile">
                <div class="profile__image">
                    <img src="{{ asset('img/logo-user.png')}}" alt="" />
                </div>
                <div class="profile__data">
                    <div class="profile__data-name">
                        <p>Silahkan Login Terlebih Dahulu</p>
                    </div>
                    <form action="{{route('user.login')}}">
                        <div class="profile__data-button-logout">
                            <button>Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        @endif

        <section class="content">
            <div class="content__header">
                <div class="content__header-showing">
                    <p><span>{{ $totalKegiatan }}</span> Volunteer Activities</p>
                    <form class="content__header-search" method="GET" action="{{ route('search') }}">
                        @csrf
                        <div class="search-wrapper">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" name="search" placeholder="Search.." value="{{ request('search') }}" />
                        </div>
                    </form>
                </div>
                <div class="content__header-show-profile">
                    <i id="showUser" class="fa-solid fa-address-card"></i>
                </div>
                <div id="overlay" class="overlay"></div>
            </div>

            <div class="content__body">
                <?php $no = 1 ?>
                @foreach($kegiatans as $kegiatan)
                @if(auth()->check())
                @php
                $user = auth()->user();
                @endphp
                <a href="{{ route('user.detail-kegiatan-page', ['id' => $user->id, 'id_kegiatan' => $kegiatan->id_kegiatan]) }}"
                    method="POST" class="content__data-button">
                    @csrf
                    @method('GET')
                    <div class="content__body-item">
                        <div class="content__body-item-up">
                            <div class="content__item-kegiatan">
                                <img class="content__item-logo-mitra"
                                    src="{{asset('storage/logo/'.$kegiatan->mitra->logo)}}" />
                                <div class="content__data-title">
                                    <h1>{{ $kegiatan->nama_kegiatan }}</h1>
                                    <span>{{ $kegiatan->mitra->nama_mitra }}</span>
                                </div>
                            </div>
                            <i class="fa-regular fa-bookmark" style="font-size: 20px"></i>
                        </div>
                        <div class="content__item-data">
                            <div class="content__item-dataDeskripsi">
                                <p>{{ $kegiatan->deskripsi}}</p>
                            </div>
                            <div class="content__item-dataInformation">
                                <div class="content__data-sistemKegiatan">
                                    <i class="fa-solid fa-briefcase" style="color:#9d9d9d"></i>
                                    <p>{{ $kegiatan->sistem_kegiatan}}</p>
                                </div>
                                <div class="content__data-location">
                                    <i class="fa-solid fa-location-dot" style="color:#9d9d9d"></i>
                                    <p>{{ $kegiatan->lokasi_kegiatan }}</p>
                                </div>
                                <div class="content__data-pendaftar">
                                    <i class="fa-solid fa-user" style="color:#9d9d9d"></i>
                                    <p>{{ $kegiatan->pendaftars_count }} applied</p>
                                </div>
                                <div class="content__data-waktu">
                                    <i class="fa-solid fa-clock" style="color:#9d9d9d"></i>
                                    @if($kegiatan->sisa_hari > 0)
                                    <p>{{ $kegiatan->sisa_hari }} days left</p>
                                    @else
                                    <p>Ditutup</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @else
                <a href="{{ route('user.detail-kegiatan', ['id_kegiatan' => $kegiatan->id_kegiatan]) }}" method="POST"
                    class="content__data-button">
                    @csrf
                    @method('GET')
                    <div class="content__body-item">
                        <div class="content__body-item-up">
                            <div class="content__item-kegiatan">
                                <img class="content__item-logo-mitra"
                                    src="{{asset('storage/logo/'.$kegiatan->mitra->logo)}}" />
                                <div class="content__data-title">
                                    <h1>{{ $kegiatan->nama_kegiatan }}</h1>
                                    <span>{{ $kegiatan->mitra->nama_mitra }}</span>
                                </div>
                            </div>
                            <i class="fa-regular fa-bookmark" style="font-size: 20px"></i>
                        </div>
                        <div class="content__item-data">
                            <div class="content__item-dataDeskripsi">
                                <p>{{ $kegiatan->deskripsi}}</p>
                            </div>
                            <div class="content__item-dataInformation">
                                <div class="content__data-sistemKegiatan">
                                    <i class="fa-solid fa-briefcase" style="color:#9d9d9d"></i>
                                    <p>{{ $kegiatan->sistem_kegiatan}}</p>
                                </div>
                                <div class="content__data-location">
                                    <i class="fa-solid fa-location-dot" style="color:#9d9d9d"></i>
                                    <p>{{ $kegiatan->lokasi_kegiatan }}</p>
                                </div>
                                <div class="content__data-pendaftar">
                                    <i class="fa-solid fa-user" style="color:#9d9d9d"></i>
                                    <p>{{ $kegiatan->pendaftars_count }} applied</p>
                                </div>
                                <div class="content__data-waktu">
                                    <i class="fa-solid fa-clock" style="color:#9d9d9d"></i>
                                    @if($kegiatan->sisa_hari > 0)
                                    <p>{{ $kegiatan->sisa_hari }} days left</p>
                                    @else
                                    <p>Ditutup</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @endif
                @endforeach
            </div>

        </section>

    </div>
</main>