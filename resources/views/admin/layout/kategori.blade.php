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
                  <h2>Kategori Volunteer</h2>
                </div>
                <a
                  href="{{ route('admin.add-kategori-page')}}"
                  class="main-btn primary-btn btn-hover btn-sm"
                >
                  <i class="lni lni-plus mr-5"></i>Tambah Kategori</a
                >
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card-style mb-30 mt-50">
                <h6 class="mb-10">Data Kategori Volunteer</h6>
                <p class="text-sm mb-20">
                  Berikut semua data kategori volunteer yang ada :
                </p>
                <div class="table-wrapper table-responsive">
                  <table class="table striped-table">
                    <thead>
                      <tr>
                        <th>
                          <h6>Id Kategori</h6>
                        </th>
                        <th>
                          <h6>Nama Kategori</h6>
                        </th>
                        <th>
                          <h6>Action</h6>
                        </th>
                      </tr>
                      <!-- end table row-->
                    </thead>
                    <tbody>
                      <?php $no = 1 ?>
                      @foreach($kategori as $kategori) 
                      <tr>
                        <td>
                          <p>{{ $kategori->id_kategori}}</p>
                        </td>
                        <td>
                          <p>{{ $kategori->nama_kategori }}</p>
                        </td>
                        <td>
                          <div class="action">
                            <div class="d-flex action-kategori">
                              <a href="{{ route('admin.edit-kategori-page', ['id' => $kategori->id_kategori]) }}" id="editKategori">
                                <i class="lni lni-pencil text-primary"></i>
                              </a>
                              <form action="{{ route('admin.delete-kategori-action', ['id' => $kategori->id_kategori]) }}" method="POST" data-confirm-delete="true" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button data-confirm-delete="true" type="submit" onclick="confirmDelete(event)" style="background:none; border:none; padding:0; cursor:pointer;">
                                    <i class="lni lni-trash-can text-danger"></i>
                                </button>
                            </form>
                            </div>
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
        <!-- end container -->
      </section>

@include('admin.layout.templates.footer')