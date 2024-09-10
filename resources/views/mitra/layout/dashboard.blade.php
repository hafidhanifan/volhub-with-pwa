@include('admin.layout.templates.header')
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
                  <h2>VolHub for Company</h2>
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
                        Volhub
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
          <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon purple">
                  <i class="lni lni-users"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Total Pengguna</h6>
                  <h3 class="text-bold mb-10"></h3>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon success">
                  <i class="lni lni-network"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Total Pendaftar</h6>
                  <h3 class="text-bold mb-10">{{$totalPendaftar}}</h3>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
              <div class="icon-card mb-30">
                <div class="icon primary">
                  <i class="lni lni-grow"></i>
                </div>
                <div class="content">
                  <h6 class="mb-10">Total Kegiatan</h6>
                  <h3 class="text-bold mb-10">{{$totalKegiatan}}</h3>
                </div>
              </div>
              <!-- End Icon Cart -->
            </div>
          </div>
          <!-- End Row -->

        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->

@include('admin.layout.templates.footer')