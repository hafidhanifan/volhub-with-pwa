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
                  <h2>Informasi Pengguna</h2>
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
                            <h6>Domisili</h6>
                          </th>
                          <th>
                            <h6>Action</h6>
                          </th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                        <?php $no = 1 ?>
                        @foreach($user as $user)
                        <tr>
                          <td>
                            <p>{{$user->id}}</p>
                          </td>
                          <td class="min-width">
                            <p>{{$user->nama_user}}</p>
                          </td>
                          <td class="min-width">
                            <p><a href="#0">{{$user->email_user}}</a></p>
                          </td>
                          <td class="min-width">
                            @if(!empty($user->domisili))
                            <p>{{ $user->domisili }}, Indonesia</p>
                            @else
                            <p class="text-danger">User belum mengisikan data domisili</p>
                            @endif
                          </td>
                          <td>
                            <div class="action">
                              <a
                                href="{{ route('mitra.detail-user-page', ['id' => $user->id]) }}"
                                class="main-btn primary-btn btn-hover"
                                >Detail</a
                              >
                            </div>
                          </td>
                        </tr>
                        @endforeach
                        <!-- end table row -->
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