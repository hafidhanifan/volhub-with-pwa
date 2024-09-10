@include('admin.layout.templates.header')
@include('admin.layout.templates.sidebar')
@include('admin.layout.templates.navbar')

<section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Daftar Kegiatan / Volunteer</h2>
                </div>
                <a
                  href="{{ route('admin.add-kegiatan-page') }}"
                  class="main-btn dark-btn btn-hover"
                >
                  <i class="lni lni-plus mr-5"></i>Tambah Project</a
                >
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="cards-styles">
            <!-- ========= card-style-2 start ========= -->
            <div class="row">
              <div class="col-12">
                <div class="title mt-30 mb-30"></div>
              </div>
              <!-- end col -->
              <?php $no = 1 ?>
              @foreach($kegiatan as $kegiatan)
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="card-style-2 mb-30">
                  <div class="card-image gambar-kegiatan">
                    <a href="#0">
                      @if ($kegiatan->gambar)
                        <img src="{{asset('storage/gambar/'.$kegiatan->gambar)}}" alt="Gambar Kegiatan" />
                      @endif
                    </a>
                  </div>
                  <div class="card-content daftar-kegiatan">
                    <h4>
                      <a href="#0">{{$kegiatan->nama_kegiatan}}</a>
                    </h4>
                    <div
                      class="card-content-location d-flex align-items-center fw-bold text-dark"
                    >
                      <i class="lni lni-map-marker"></i
                      ><span class="ms-3 fst-italic text-muted daftar-lokasi">{{$kegiatan->lokasi_kegiatan}}</span>
                    </div>
                    <ul
                      class="d-flex flex-wrap align-items-center justify-content-between mt-25"
                    >
                      <li>
                        <a
                          href="{{ route('admin.detail-kegiatan-page', ['id' => $kegiatan->id_kegiatan]) }}"
                          id="detailProject"
                          class="main-btn primary-btn btn-hover"
                        >
                          Detail
                        </a>
                      </li>
                      <form action="{{ route('admin.delete-kegiatan-action', ['id' => $kegiatan->id_kegiatan]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="confirmDelete(event)" style="background:none; border:none; padding:0; cursor:pointer;">
                            <i class="lni lni-trash-can text-danger delete-button"></i>
                        </button>
                    </form>
                    </ul>
                  </div>
                </div>
                </div>
              @endforeach
              <!-- end col -->
              
            </div>
            <!-- end row -->
            <!-- ========= card-style-2 end ========= -->
          </div>
        </div>
        <!-- end container -->
      </section>
@include('admin.layout.templates.footer')
