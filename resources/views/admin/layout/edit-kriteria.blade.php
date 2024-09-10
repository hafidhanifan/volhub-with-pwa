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
                  <h2>Edit Kriteria Project</h2>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="form-elements-wrapper">
            <div class="row">
              <div class="col-lg-6">
                <!-- input style start -->
                <form action="{{ route('admin.edit-kriteria-action', ['id' => $kriteria->id_kriteria]) }}" method="POST">
                    @csrf
                    @method('PUT')
                  <div class="card-style mb-30 d-flex flex-column">
                      <div class="input-style-1">
                        <label for="kriteria">Masukkan Nama Kriteria Baru</label>
                        <input value="{{ old('kriteria', $kriteria->nama_kriteria) }}" name="nama_kriteria" type="text" placeholder="Nama Kriteria" required/>
                      </div>
                      <button type="submit" href="#0" class="main-btn-kategori primary-btn rounded-full btn-hover right-align">Edit Kriteria</button>
                    </div>
                </form>

                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->

@include('admin.layout.templates.footer');