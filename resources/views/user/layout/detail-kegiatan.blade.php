@include('user.layout.templates.header')
@include('user.layout.templates.navbar')

<section class="detail-header">
    <div class="detail-header__image-wrapper">
        <img class="detail-header__image" src="{{ asset('storage/gambar/'.$kegiatan->gambar) }}" alt="">
    </div>
    <div class="detail-header__wrapper">
        <div class="detail-header__body">
            <div class="detail-header__body-name">
                <div class="detail-header__body-logo">
                    <img class="detail-header__body-logo__mitra" src="{{asset('storage/logo/'.$kegiatan->mitra->logo)}}" alt="" />
                </div>
                <div class="detail-header__body-title">
                    <h1>{{ $kegiatan->nama_kegiatan }}</h1>
                </div>
            </div>
            <div class="detail-header__body-button">
                <i class="fa-regular fa-bookmark"></i>
                <button id="openModalBtn">Daftar</button>
            </div>
            @if(auth()->check())
            @php
              $user = auth()->user();
            @endphp
                <div id="modal" class="modal__registration">
                    <div class="modal__content">
                        <div class="modal__header">
                            <span id="closeModalBtn" class="close">&times;</span>
                            <h2>Daftar Kegiatan Ini</h2>
                        </div>
                        <div class="modal__form">
                            <form action="{{ route('user.add-pendaftaran-action', ['id' => $user->id, 'id_kegiatan' => $kegiatan->id_kegiatan]) }}" method="POST" id="registrationForm" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="kegiatan" value="{{ $kegiatan->id_kegiatan }}">
                                <label for="motivasi">Motivasi mengikuti kegiatan ini</label>
                                <textarea id="motivasi" name="motivasi" rows="4" cols="50" required></textarea>
                                <br /><br />
                                @if(auth()->user()->cv)
                                    <p>CV Anda telah diunggah. <a href="{{ asset('storage/cv/' . auth()->user()->cv) }}" target="_blank">Unduh CV</a></p>
                                @else
                                    <label for="cv">Upload CV</label>
                                    <input type="file" id="cv" name="cv" required />
                                    <br /><br />
                                @endif
                                <div class="modal__button">
                                    <button type="submit">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
            <div id="modal" class="modal__registration">
                <div class="modal__content">
                    <div class="modal__header">
                        <span id="closeModalBtn" class="close">&times;</span>
                        <h2>Daftar Kegiatan Ini</h2>
                    </div>
                    <div class="modal__form">
                            <p>Login Terlebih Dahulu</p>
                            <div class="modal__button">
                                <a href="{{route('user.login')}}" type="submit">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<main id="detail">
    <div class="container-detail">
        <section class="description">
            <div class="description__text">
                <article class="text">
                    <h2>Deskripsi</h2>
                    <p>{{ $kegiatan->deskripsi }}</p>
                </article>
                <section class="information">
                    <div class="information__header">
                        <h2>Informasi Kegiatan</h2>
                        <article class="information__text">
                            <div class="information__text-closed">
                                <h3>Penutupan</h3>
                                <p><span>{{ $kegiatan->tgl_penutupan }}</span></p>
                            </div>
                            <div class="information__text-start">
                                <h3>Tanggal Pelaksanan</h3>
                                <p>{{ $kegiatan->tgl_kegiatan }}</p>
                            </div>
                            <div class="information__text-duration">
                                <h3>Pelaksanaan</h3>
                                <p>{{ $kegiatan->lama_kegiatan }}</p>
                            </div>
                            <div class="information__text-system">
                                <h3>Sistem Kerja</h3>
                                <p>{{ $kegiatan->sistem_kegiatan }}</p>
                            </div>
                            <div class="information__text-location">
                                <h3>Lokasi</h3>
                                <p>{{ $kegiatan->lokasi_kegiatan }}, Indonesia</p>
                            </div>
                        </article>
                    </div>
                </section>
            </div>

            <div class="description__criteria">
                <div class="description__criteria-header">
                    <h2>Kriteria</h2>
                    <article class="description__criteria-body">
                        <ul>
                            @if($kegiatan->kriterias->isNotEmpty())
                                @foreach($kegiatan->kriterias as $kriteria)
                                    <li>{{ $kriteria->nama_kriteria }}</li>
                                @endforeach
                             @else
                                <p class="waiting-admin">Mitra belum mengisikan data</p>
                            @endif
                        </ul>
                    </article>
                </div>
            </div>
            <div class="description__benefit">
                <div class="description__benefit-header">
                    <h2>Benefit</h2>
                    <div class="description__benefit-body">
                        @if($kegiatan->benefits->isNotEmpty())
                        @foreach($kegiatan->benefits as $benefit)
                        <div class="description__benefit-item">
                            <div class="description__benefit-item-icon">
                                <i class="fa-solid fa-check"></i>
                                </div>
                                <div class="description__benefit-item-text">
                                    <p>{{ $benefit->nama_benefit }}</p>
                                </div>
                            </div>
                            @endforeach
                        @else
                        <div class="waiting-container">
                            <p class="waiting-admin">Mitra belum mengisikan data</p>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="recommendation">
        <div class="recommendation__header">
            <h2>Rekomendasi</h2>
            @if(auth()->check())
            @php
              $user = auth()->user();
            @endphp
            <a href="{{route('user.daftarKegiatan', ['id' => $user->id])}}">Selengkapnya</a>
            @else
            <a href="{{route('daftar.kegiatan')}}">Selengkapnya</a>
            @endif


        </div>
        <div class="content__body">
            <?php $no = 1 ?>
            @foreach($rekomendasi as $kegiatan)
            <div class="content__body-item">
              <div class="content__body-item-up">
                <div class="content__item-kegiatan">
                  <img class="content__item-logo-mitra" src="{{asset('storage/logo/'.$kegiatan->mitra->logo)}}"/>
                  <div class="content__data-title">
                    <h1>{{ $kegiatan->nama_kegiatan }}</h1>
                    <span>{{ $kegiatan->mitra->nama_mitra }}</span>
                  </div>
                </div>
                <i class="fa-regular fa-bookmark"></i>
              </div>
              <hr>
              <div class="content__item-data">
                <div class="content__item-dataInformation">
                  <div class="content__data-location">
                    <i class="fa-solid fa-location-dot"></i>
                    <p>{{ $kegiatan->lokasi_kegiatan }}</p>
                  </div>
                  <div class="content__data-sistemKegiatan">
                    <p>Kegiatan {{ $kegiatan->sistem_kegiatan}}</p>
                  </div>
                </div>
                @if(auth()->check())
                  @php
                    $user = auth()->user();
                  @endphp
                  <form action="{{ route('user.detail-kegiatan-page', ['id' => $user->id, 'id_kegiatan' => $kegiatan->id_kegiatan]) }}" method="POST" class="content__data-button">
                    @csrf
                    @method('GET')
                    <button>Detail</button>
                  </form>
                @else
                  <form action="{{ route('user.detail-kegiatan', ['id_kegiatan' => $kegiatan->id_kegiatan]) }}" method="POST" class="content__data-button">
                    @csrf
                    @method('GET')
                    <button>Detail</button>
                  </form>
                @endif
              </div>
            </div>
            @endforeach
          </div>
    </section>
</main>

@include('user.layout.templates.footer')