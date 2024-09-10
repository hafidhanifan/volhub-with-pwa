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
            </div>
            <!-- end row -->
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>
                            <h6>Id</h6>
                          </th>
                          <th>
                            <h6>Nama</h6>
                          </th>
                          <th>
                            <h6>Email</h6>
                          </th>
                          <th>
                            <h6>Kegiatan</h6>
                          </th>
                          <th>
                            <h6>Status</h6>
                          </th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                        <?php $no = 1 ?>
                      @foreach($pendaftar as $pendaftar) 
                        <tr>
                          <td>
                            <p>{{$pendaftar->id_pendaftar}}</p>
                          </td>
                          <td class="min-width">
                            <p>{{$pendaftar->user->nama_user}}</p>
                          </td>
                          <td class="min-width">
                            <p><a href="#0">{{$pendaftar->user->email_user}}</a></p>
                          </td>
                          <td class="min-width">
                            <p>{{$pendaftar->kegiatan->nama_kegiatan}}</p>
                          </td>
                          <td class="min-width">
                            <button class="announcement main-btn primary-btn btn-hover"
                              @if($pendaftar->status_pendaftaran == 'Dalam Review') 
                                  style="background-color: orange;" 
                              @elseif($pendaftar->status_pendaftaran == 'Diterima') 
                                  style="background-color: green;" 
                              @elseif($pendaftar->status_pendaftaran == 'Ditolak') 
                                  style="background-color: red;" 
                              @endif>
                              {{ $pendaftar->status_pendaftaran }}
                          </button>  
                          </td>
                          <td>
                            <div class="action">
                              <a
                                href="{{ route('admin.detail.pendaftar', ['id' => $pendaftar->id_pendaftar]) }}"
                                class="main-btn primary-btn btn-hover"
                                >Detail</a
                              >
                            </div>
                          </td>
                        </tr>
                        <!-- end table row -->
                        @endforeach
                      </tbody>
                    </table>
                    <!-- end table -->
                  </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
          </div>
          <!-- ========== title-wrapper end ========== -->
        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->
      @include('admin.layout.templates.footer')