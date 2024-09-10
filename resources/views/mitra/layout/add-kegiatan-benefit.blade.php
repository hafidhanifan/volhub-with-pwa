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
            <h2>Tambah Benefit {{$kegiatan->nama_kegiatan}}</h2>
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
              <div class="card-style mb-30 d-flex flex-column">
                <div class="edit-skill__list">
                  <div class="edit-skill__headline mb-50">
                    <p class="fs-4">Benefit</p>
                  </div>
                  <ul>
                    @foreach ($kegiatan->Benefits as $benefit)
                      <div class="button_custom_kegiatan">
                        <li>{{ $benefit->nama_benefit }}</li>
                        <form action="{{ route('mitra.remove-benefit-action', ['id' => $kegiatan->id_kegiatan, 'id_benefit' => $benefit->id_benefit])}}" method="POST" style="display: inline;">
                          @csrf
                          @method('DELETE')
                          <button onclick="confirmDelete(event)" type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                      </div>
                      <hr>
                    @endforeach
                  </ul>
                </div>

                <form action="{{ route('mitra.add-benefit-kegiatan-action', ['id' => $mitra->id_mitra,'id_keg' => $kegiatan->id_kegiatan]) }}" method="POST">
                  @csrf
                    <div class="input-style-1">
                      <input name="nama_benefit" type="text" placeholder="Benefit" required/>
                    </div>
                    <button type="submit" href="#0" class="main-btn-kategori primary-btn rounded btn-hover right-align">Tambah Benefit</button>
                </form>
              </div>
                  <a
                    href="{{ route('mitra.detail-kegiatan-page', ['id' => $mitra->id_mitra,'id_keg' => $kegiatan->id_kegiatan]) }}"
                    id="detailProject"
                    class="main-btn primary-btn btn-hover"
                    ></i>Kembali</a>

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

@include('mitra.layout.templates.footer');