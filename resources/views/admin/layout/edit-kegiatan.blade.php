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
                  <h2>Edit Project {{$kegiatan->nama_kegiatan}}</h2>
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
                <form action="{{ route('admin.edit-kegiatan-action', ['id' => $kegiatan->id_kegiatan]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <!-- input style start -->
                <div class="card-style mb-30 tambah-kegiatan">
                  <div class="input-style-1">
                    <label>Nama Kegiatan</label>
                    <input value="{{ old('kegiatan', $kegiatan->nama_kegiatan) }}" type="text" name="nama_kegiatan"/>
                  </div>
                  <!-- end input -->
                  <div class="select-style-1">
                    <label>Kategori</label>
                    <div class="select-position">
                      <select name="kategori">
                        <?php $no = 1 ?>
                          <option value="">Pilih Kategori</option>
                          @foreach($kategori as $kategori) 
                            <option value="{{$kategori->id_kategori}}">{{ $kategori->nama_kategori }}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <!-- end input -->
                  <div class="select-style-1">
                    <label>Sistem Kegiatan</label>
                    <div class="select-position">
                      <select name="sistem_kegiatan">
                        <option value="">Pilih Sistem Kerja</option>
                        @foreach($sistemKegiatan as $sistem)
                        <option value="{{ $sistem }}"@if(old('sistem_kegiatan', $kegiatan->sistem_kegiatan) == $sistem) selected @endif>{{ ucfirst($sistem) }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>Tanggal Penutupan</label>
                    <input type="date" name="tgl_penutupan" value="{{ old('kegiatan', $kegiatan->tgl_penutupan) }}"/>
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>Tanggal Kegiatan</label>
                    <input type="date" name="tgl_kegiatan" value="{{ old('kegiatan', $kegiatan->tgl_kegiatan) }}"/>
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>Lama Kegiatan</label>
                    <input type="text" name="lama_kegiatan" value="{{ old('kegiatan', $kegiatan->lama_kegiatan) }}"/>
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi_kegiatan" value="{{ old('kegiatan', $kegiatan->lokasi_kegiatan) }}"/>
                  </div>
                  <!-- end input -->
                  <div class="input-style-1">
                    <label>Upload Gambar</label>
                    <input type="file" name="gambar" value="{{ old('kegiatan', $kegiatan->gambar) }}"/>
                  </div>
                  <!-- end input -->
                </div>
                <!-- end card -->
                <!-- ======= input style end ======= -->

                <!-- ======= textarea style start ======= -->
                <div class="card-style mb-30">
                    <div class="input-style-1">
                      <label>Deskripsi</label>
                      <textarea rows="5" name="deskripsi">{{ old('kegiatan', $kegiatan->deskripsi) }}</textarea>
                    </div>
                    <!-- end textarea -->
                </div>
                <!-- ======= textarea style end ======= -->
                
              </div>
              <!-- end col -->


            </div>
            <!-- end row -->
            
            <button type="submit" href="#0" class="main-btn-kategori primary-btn btn-hover right-align">Edit Kegiatan</button>
          </form>
          </div>
          <!-- ========== form-elements-wrapper end ========== -->
        </div>
        <!-- end container -->
  </section>
      <!-- ========== section end ========== -->
@include('admin.layout.templates.footer')