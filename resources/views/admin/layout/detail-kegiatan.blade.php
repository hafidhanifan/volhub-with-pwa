@include('admin.layout.templates.header')
@include('admin.layout.templates.sidebar')
@include('admin.layout.templates.navbar')  
 <!-- ========== section start ========== -->
 <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Detail Project Volunteering</h2>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->

          <div class="row">
            <!-- Section detail header -->
            <section class="detail-header">
              <div class="image-detail-kegiatan">
                <img class="image-detail-kegiatan-asset" src="{{asset('storage/gambar/'.$kegiatan->gambar)}}" alt="" />
              </div>
              <div class="detail-header__wrapper">
                <div class="detail-header__body">
                  <div class="detail-header__body-name">
                    <div class="detail-header__body-logo">
                      <img src="{{ asset('/img/logo.png') }}" alt="" />
                    </div>
                    <div class="detail-header__body-title">
                      <h1>{{ $kegiatan->nama_kegiatan }}</h1>
                    </div>
                  </div>
                  <div class="detail-header__body-button">
                    <a class="main-btn primary-btn" href="{{ route('admin.edit-kegiatan-page', ['id' => $kegiatan->id_kegiatan]) }}" >Edit</a>
                  </div>
                </div>
              </div>
            </section>
            <!-- Section detail header End -->
            <div class="col-lg-16 section-detail">
              <div class="card-style mb-30" style="margin-top: 100px">
                <h1 class="mb-30">Informasi Kegiatan</h1>
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
                    <p>{{ $kegiatan->lama_kegiatan}}</p>
                  </div>
                  <div class="information__text-system">
                    <h3>Sistem Kegiatan</h3>
                    <p>{{ $kegiatan->sistem_kegiatan }}</p>
                  </div>
                  <div class="information__text-location">
                    <h3>Lokasi</h3>
                    <p>{{ $kegiatan->lokasi_kegiatan }}, Indonesia</p>
                  </div>

                  <div class="information__text-kategori">
                    <h3>Kategori</h3>
                    <p>{{ $kegiatan->kategori->nama_kategori }}</p>
                  </div>
                </article>
              </div>
              <!-- end card -->
            </div>

            <div class="col-lg-16">
              <div class="card-style mb-30">
                <h1 class="mb-30">Deskripsi</h1>
                <p>
                  <span class="text-success text-medium"></span>
                  {{ $kegiatan->deskripsi }}
                </p>
              </div>
              <!-- end card -->
            </div>

            <div class="col-lg-6">
              <!-- end card -->
              <div class="card-style mb-30">
                <div class="benefit-button-wrapper">
                  <h1 class="mb-30 text-medium">Benefit</h1>
  
                  <form action="{{ route('admin.add-benefit-kegiatan-page', ['id' => $kegiatan->id_kegiatan]) }}" method="POST">
                    @csrf
                    @method('GET')
                    <button type="submit" href="#0" class="main-btn-kategori primary-btn btn-hover right-align">Tambah Benefit</button>
                  </form>
                </div>
                <ul class="custom-list">
                <?php $no = 1 ?>
                @foreach($kegiatan->benefits as $benefit)
                  <li>{{$benefit->nama_benefit}}</li>
                @endforeach
                </ul>
              </div>
              <!-- end card -->
            </div>
            <div class="col-lg-6">
              <!-- end card -->
              <div class="card-style mb-30">
                <div class="benefit-button-wrapper">
                  <h1 class="mb-30 text-medium">Kriteria</h1>
                  <form action="{{ route('admin.add-kriteria-kegiatan-page', ['id' => $kegiatan->id_kegiatan]) }}" method="POST">
                    @csrf
                    @method('GET')
                    <button type="submit" href="#0" class="main-btn-kategori primary-btn btn-hover right-align benefit-button">Tambah Kriteria</button>
                  </form>
                </div>
                <ul class="custom-list">
                  <?php $no = 1 ?>
                  @foreach($kegiatan->kriterias as $kriteria)
                  <li>{{$kriteria->nama_kriteria}}</li>
                  @endforeach
                </ul>
        
              </div>
              <!-- end card -->
            </div>
          </div>
        </div>

        <!-- end container -->
      </section>

      <!-- ========== section end ========== -->
      @include('admin.layout.templates.footer')
