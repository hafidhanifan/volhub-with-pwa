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
            <h2>Tambah Kriteria {{$kegiatan->nama_kriteria}}</h2>
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
              <div class="edit-skill__headline">
                <p class="fs-4">Kriteria</p>
              </div>
              <ul>
                @foreach ($kegiatan->Kriterias as $kriteria)
                  <div class="button_custom_kegiatan">
                    <li>{{ $kriteria->nama_kriteria }}</li>
                      <form action="{{ route('admin.remove-kriteria-action', ['id' => $kegiatan->id_kegiatan, 'id_kriteria' => $kriteria->id_kriteria])}}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="confirmDelete(event)" type="submit" class="edit-skill__delete"><i class="fa-solid fa-trash"></i></button>
                      </form>
                  </div>
                  <hr>
                @endforeach
              </ul>
            </div>

            <form action="{{ route('admin.add-kriteria-kegiatan-action', ['id' => $kegiatan->id_kegiatan]) }}" method="POST">
              @csrf
              <div class="input-style-1">
                <input name="nama_kriteria" type="text" placeholder="Kriteria" required/>
              </div>
              <button type="submit" href="#0" class="main-btn-kategori primary-btn rounded btn-hover right-align">Tambah Kriteria</button>
            </form>
          </div>
          <a
            href="{{ route('admin.detail-kegiatan-page', ['id' => $kegiatan->id_kegiatan]) }}"
            id="detailProject"
            class="main-btn primary-btn btn-hover"
            ></i>Kembali
          </a>
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