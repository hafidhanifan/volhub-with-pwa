@include('user.layout.templates.header')
@include('user.layout.templates.navbar')
@include('user.layout.templates.hero')
<main>
  <section class="introduction">
    <div class="introduction__logo">
      <img src="{{ asset('img/volhub-big-logo.png') }}" alt="" />
    </div>
    <div class="introduction__wrapper">
      <div class="introduction__content">
        <article class="introduction__text introduction__text-top">
          <div class="introduction__title">
            <h2><span>Apa itu VolHub?</span></h2>
          </div>
          <div class="introduction__description">
            <p>
              VolHub merupakan platform kesukarelawanan.
              VolHub menjadi penghubung antara orang yang
              hendak menyalurkan kebaikannya kepada komunitas dan masyarakat
              yang membutuhkan bantuan.
            </p>
          </div>
        </article>

        <article class="introduction__text introduction__text-bottom">
          <div class="introduction__title">
            <h2><span>Kenapa harus VolHub?</span></h2>
          </div>
          <div class="introduction__description">
            <p>
              <span>VolHub</span> memberikan berbagai kegiatan sukarelawan
              dengan <span>kualitas yang tinggi, berdampak besar</span>, dan
              tentunya dapat memberikan
              <span>pengalaman berkesan</span> bagi yang mengikuti.
            </p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <section class="program">
    <div class="program__header">
      <h3>Kegiatan Tersedia!</h3>
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
              <img class="content__item-logo-mitra" src="{{asset('storage/logo/'.$kegiatan->mitra->logo)}}" />
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
              <img class="content__item-logo-mitra" src="{{asset('storage/logo/'.$kegiatan->mitra->logo)}}" />
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
    <div class="program__button">
      <a href="{{route('daftar.kegiatan')}}">Selengkapnya</a>
    </div>
  </section>


</main>
@include('user.layout.templates.footer')