@include('user.layout.templates.header')
@include('user.layout.templates.navbar')
    <main>
      <div class="profile-container">
        <section class="abstract">
          <div class="abstract__profile">
            <div class="abstract__profile-image">
              @if(!empty($user->foto_profile))
              <img src="{{asset('storage/foto-profile/'.$user->foto_profile)}}" alt="profile user" />
            @else
              <img src="{{asset('img/logo-user.png')}}" alt="profile user" />
            @endif
            </div>
            <div class="abstract__profile-summary">
              <div class="abstract__summary-header">
                <h1>{{ $user->nama_user }}</h1>
                <p>{{ $user->bio }}</p>
              </div>
              <div class="abstract__summary-body">
                <div class="abstract__body-telephone">
                  <h2>NOMER TELEPHONE</h2>
                  <p>{{ $user->nomor_telephone }}</p>
                </div>
                <div class="abstract__body-email">
                  <h2>EMAIL</h2>
                  <p>{{ $user->email_user }}</p>
                </div>
                <div class="abstract__body-domisili">
                  <h2>DOMISILI</h2>
                  <p>{{ $user->domisili }}, Indonesia</p>
                </div>
                <div class="abstract__body-usia">
                  <h2>USIA</h2>
                  <p>{{ $user->usia }} Tahun</p>
                </div>
                <div class="abstract__body-pendidikan">
                  <h2>PENDIDIKAN TERAKHIR</h2>
                    @if(!empty($user->pendidikan_terakhir))
                      <p>{{ $user->pendidikan_terakhir }}, Indonesia</p>
                    @else
                      <p class="belum-ada-data">Ups! Data masih kosong</p>
                    @endif
                </div>
                <div class="abstract__body-cv">
                  <h2>CV</h2>
                      <a href="{{ asset('storage/cv/' . auth()->user()->cv) }}" target="_blank" class="d-flex align-items-center text-primary text-decoration-none" download>
                        <img src="{{ asset('img/pdf.png')}}" alt="PDF Icon" class="me-2" width="20" height="20"/> {{$user->cv}}
                      </a>
                </div>
                <div class="abstract__body-cv">
                  <h2>Gender</h2>
                  @if(!empty($user->gender))
                    <p>{{ $user->gender }}</p>
                  @else
                    <p class="belum-ada-data">Ups! Data masih kosong</p>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="abstract__button">
            <a href="{{ route('user.edit-profile-page', ['id' => $user->id]) }}">Edit Profil</a>
          </div>
        </section>
        <section class="about">
          <div class="about__header">
            <h2>Tentang Saya</h2>
          </div>
          <div class="about__body">
            @if(!empty($user->deskripsi))
              <p>{{ $user->deskripsi }}</p>
            @else
              <p class="belum-ada-data">Ups! Data masih kosong</p>
            @endif
          </div>
        </section>
        <section class="status">
          <div class="status__skill">
            <div class="status__skill-body">
              <h3>Top Skills</h3>
              @if(isset($user->skills) && $user->skills->isNotEmpty())
                <ul>
                  <?php $no = 1 ?>
                  @foreach($user->skills as $skill)
                  <li>{{$skill->nama_skill}}</li>
                  @endforeach
                </ul>
              @else
            <p class="belum-ada-data">Ups! Data masih kosong</p>
            @endif
            </div>
            <div class="status__skill-button">
              <a href="{{ route('user.edit-skill-page', ['id' => $user->id]) }}">Tambah Keahlian</a>
            </div>
          </div>
          <div class="status__process">
            <div class="status__process-header">
              <h3>Status Lamaran</h3>
            </div>
            <div class="status__process-body">
              @if(isset($user->pendaftars) && $user->pendaftars->isNotEmpty())
      
              <?php $no = 1 ?>
              @foreach($user->pendaftars as $pendaftar)
              <div class="status__process-item">
                <div class="status__item-logo">
                  <img src="{{ asset('img/volhub-small-logo.png') }}" alt="volhub logo" />
                </div>
                <div class="status__item-text">
                  <h4>{{$pendaftar->kegiatan->nama_kegiatan}}</h4>
                  <div class="status__item-date">
                    <i class="fa-regular fa-calendar"></i>
                    <p>Dikirm pada {{$pendaftar->tgl_pendaftaran}}</p>
                  </div>
                  <p class="announcement" 
                    @if($pendaftar->status_pendaftaran == 'Dalam Review') 
                        style="background-color: orange;" 
                    @elseif($pendaftar->status_pendaftaran == 'Diterima') 
                        style="background-color: green;" 
                    @elseif($pendaftar->status_pendaftaran == 'Ditolak') 
                        style="background-color: red;" 
                    @endif>
                    {{ $pendaftar->status_pendaftaran }}
                  </p>
                </div>
              </div>
              @endforeach
              @else
              <p class="belum-ada-data">Ups! Anda belum mendaftar kegiatan volunteer.</p>
              @endif
            </div>
          </div>
        </section>
      </div>
    </main>
@include('user.layout.templates.footer')
