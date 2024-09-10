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
                  <h2>Informasi Pendaftar</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Page
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>

              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="invoice-wrapper">
            <div class="row">
              <div class="col-12">
                <div class="invoice-card card-style mb-30">
                  <div class="invoice-header">
                    <div class="invoice-for">
                      <h2 class="mb-10">Informasi Pribadi</h2>
                      <p class="text-sm">Dikirim pada {{$pendaftar->tgl_pendaftaran}}</p>
                    </div>
                    <div class="invoice-date">
                      <form action="{{ route('admin.updateStatus', $pendaftar->id_pendaftar) }}" method="POST"  id="statusForm">
                        @csrf
                        @method('PATCH')
                        <select name="status_pendaftaran" class="main-btn warning-btn rounded button-review" id="statusDropdown" onchange="this.form.submit(); updateStatusClass();">
                            <option value="Dalam Review" {{ $pendaftar->status_pendaftaran == 'Dalam Review' ? 'selected' : '' }}>Dalam Review</option>
                            <option value="Diterima" {{ $pendaftar->status_pendaftaran == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="Ditolak" {{ $pendaftar->status_pendaftaran == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </form>
                    </div>
                    <div class="invoice-date">
                      <a href="{{ route('admin.detail-user-page', $pendaftar->user->id) }}" class="main-btn dark-btn rounded btn-hover"
                        >Detail</a
                      >
                    </div>
                  </div>
                  <article class="information__text">
                    <div class="information__text-closed">
                      <h3>Nama</h3>
                      <p>{{$pendaftar->user->nama_user}}</p>
                    </div>
                    <div class="information__text-start">
                      <h3>Gender</h3>
                      <p>{{$pendaftar->user->gender}}</p>
                    </div>
                    <div class="information__text-duration">
                      <h3>Email</h3>
                      <p>{{$pendaftar->user->email_user}}</p>
                    </div>
                    <div class="information__text-system">
                      <h3>Usia</h3>
                      <p>{{$pendaftar->user->usia}} Tahun</p>
                    </div>
                    <div class="information__text-location">
                      <h3>Kontak</h3>
                      <p>{{$pendaftar->user->nomor_telephone}}</p>
                    </div>

                    <div class="information__text-kategori">
                      <h3>Domisili</h3>
                      <p>{{$pendaftar->user->domisili}}</p>
                    </div>
                  </article>
                </div>
                <!-- End Card -->
              </div>
              <!-- ENd Col -->
            </div>
            <!-- End Row -->
          </div>

          <div class="invoice-wrapper">
            <div class="row">
              <div class="col-12">
                <div class="invoice-card card-style mb-30">
                  <div class="invoice-header">
                    <div class="invoice-for">
                      <h2 class="mb-10">Informasi Kegiatan</h2>
                    </div>
                    <div class="invoice-date">
                      <a href="{{ route('admin.detail-kegiatan-page', $pendaftar->kegiatan->id_kegiatan) }}" class="main-btn dark-btn rounded btn-hover"
                        >Detail</a
                      >
                    </div>
                  </div>
                  <div class="informasi-kegiatan">
                    <div class="kegiatan-item">
                      <h3>Kegiatan</h3>
                      <p>{{$pendaftar->kegiatan->nama_kegiatan}}</p>
                    </div>
                    <div class="kegiatan-item">
                      <h3>Sistem Kerja</h3>
                      <p>{{$pendaftar->kegiatan->sistem_kegiatan}}</p>
                    </div>
                    <div class="kegiatan-item">
                      <h3>Lokasi</h3>
                      <p>{{$pendaftar->kegiatan->lokasi_kegiatan}}</p>
                    </div>
                  </div>
                </div>
                <!-- End Card -->
              </div>
              <!-- ENd Col -->
            </div>
            <!-- End Row -->
          </div>

          <div class="invoice-card card-style mb-30">
            <div class="invoice-header">
              <div class="invoice-for">
                <h2 class="mb-10">Lampiran</h2>
              </div>
            </div>
            <div class="invoice-address">
              <div class="address-item">
                <h5 class="text-bold">CV</h5>
                <a href="{{ asset('storage/cv/' . $pendaftar->user->cv) }}" target="_blank" class="d-flex align-items-center text-primary text-decoration-none" download>
                  <img src="{{ asset('img/pdf.png')}}" alt="PDF Icon" class="me-2" width="20" height="20"/> {{$pendaftar->user->cv}}
                </a>
              </div>
            </div>
            <div class="address-item">
              <h5 class="text-bold">Deskripsi</h5>
              <p class="text-lg">
                {{$pendaftar->user->deskripsi}}
              </p>
            </div>
          </div>
        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->
      
      @include('admin.layout.templates.footer')