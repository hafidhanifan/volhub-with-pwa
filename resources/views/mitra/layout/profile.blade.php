@include('mitra.layout.templates.header')
@include('mitra.layout.templates.sidebar')
@include('mitra.layout.templates.navbar')  
<!-- ========== section start ========== -->
  <section class="section">
    <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Profile Perusahaan</h2>
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
          <!-- ========== form-elements-wrapper start ========== -->
          <div class="form-elements-wrapper">
            
            <div class="row">
              <div class="col-lg-12">
                <form class="button-wrapper" action="{{ route('mitra.edit-foto-profile-action', ['id' => $mitra->id_mitra]) }}" method="POST" enctype="multipart/form-data" id="editFotoProfileForm">
                  @csrf
                  @method('PUT')
                  <div class="edit-personal__picture">
                    @if(!empty($mitra->logo))
                      <img class="edit-profile__picture" src="{{ asset('storage/logo/'.$mitra->logo) }}" id="profileImage" />
                    @else
                      <img class="edit-profile__picture" src="{{asset('img/logo-user.png')}}" alt="logo mitra" />
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

                <form action="{{ route('mitra.edit-profile-action', ['id' => $mitra->id_mitra]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                <!-- input style start -->
                <div class="card-style mb-30 edit-profile-mitra">
                  <div class="input-style-1">
                    <label>Nama Perusahaan</label>
                    <input type="text" name="nama_mitra"/>
                  </div>
                  <div class="input-style-1">
                    <label>Bio Perusahaan</label>
                    <input type="text" name="bio"/>
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>Industri</label>
                    <input type="text" name="industri"/>
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>Ukuran Perusahaan</label>
                    <input type="text" name="ukuran_perusahaan"/>
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>Situs</label>
                    <input type="text" name="situs"/>
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>Alamat</label>
                    <input type="text" name="alamat"/>
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>Nomor Perusahaan</label>
                    <input type="text" name="nomor_telephone"/>
                  </div>
                  <!-- end input -->
                  {{-- <div class="input-style-1">
                    <label>Logo Perusahaan</label>
                    <input type="file" name="logo"/>
                  </div> --}}
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>Gambar Cover</label>
                    <input type="file" name="gambar"/>
                  </div>
                  <!-- end input -->
                </div>
                <!-- end card -->
                <!-- ======= input style end ======= -->

                <!-- ======= textarea style start ======= -->
                <div class="card-style mb-30">
                    <div class="input-style-1">
                      <label>Deskripsi</label>
                      <textarea rows="5" name="deskripsi"></textarea>
                    </div>
                    <!-- end textarea -->
                </div>
                <!-- ======= textarea style end ======= -->
                
              </div>
              <!-- end col -->

          <!-- end card -->
          <!-- ======= input style end ======= -->

              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
            
            <button type="submit" href="#0" class="main-btn-kategori primary-btn btn-hover right-align">Simpan</button>
          </form>
          </div>
          <!-- ========== form-elements-wrapper end ========== -->
        </div>
        <!-- end container -->
  </section>
      <!-- ========== section end ========== -->
@include('mitra.layout.templates.footer')