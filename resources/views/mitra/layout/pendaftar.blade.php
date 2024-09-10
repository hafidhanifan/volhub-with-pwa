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
                  <h2>Informasi Pendaftar</h2>
                </div>
              </div>
            </div>
            <!-- end row -->
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <div class="table-wrapper table-responsive">
                    <table class="table ">
                      <thead>
                        <tr>
                          <th>
                            <h6 class="foto_profile">Nama</h6>
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
                      <div>
                        <tr onclick="window.location='{{ route('mitra.detail.pendaftar', ['id' => $mitra->id_mitra, 'id_pendaftar' => $pendaftar->id_pendaftar]) }}';" class="informasi-pendaftar">
                          <td class="list_profile_pendaftar ">
                            <img class="foto_profile" src="{{asset('storage/foto-profile/'.$pendaftar->user->foto_profile)}}" alt="Profile">
                            <div class="profile_identity">
                                <p class="profile_name">{{$pendaftar->user->nama_user}}</p>
                                <p class="profile_bio">{{$pendaftar->user->bio}}</p>
                            </div>    
                          </td>
                          <td class="list_email_pendaftar">
                            <p class="email_pendaftar">{{$pendaftar->user->email_user}}</p>
                          </td>
                          <td class="list_kegiatan_pendaftar">
                            <p class="kegiatan_pendaftar">{{$pendaftar->kegiatan->nama_kegiatan}}</p>
                          </td>
                          <td class="min-width">
                            <button class="announcement status-btn primary-btn btn-hover"
                              @if($pendaftar->status_pendaftaran == 'Dalam Review') 
                                  style="background-color: #fcb87543; color: #f79738; font-weight:600;" 
                              @elseif($pendaftar->status_pendaftaran == 'Diterima') 
                                  style="background-color: green;" 
                              @elseif($pendaftar->status_pendaftaran == 'Ditolak') 
                                  style="background-color: red;" 
                              @endif>
                              {{ $pendaftar->status_pendaftaran }}
                            </button>  
                          </td>
                        {{-- </div> --}}
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
      @include('mitra.layout.templates.footer')