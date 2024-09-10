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
                  <h2>Skill</h2>
                </div>
                <a
                  href="{{ route('admin.add-skill-page')}}"
                  class="main-btn primary-btn btn-hover btn-sm"
                >
                  <i class="lni lni-plus mr-5"></i>Tambah Skill</a
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
                <h6 class="mb-10">Data Skill</h6>
                <p class="text-sm mb-20">
                  Berikut semua data skill yang ada :
                </p>
                <div class="table-wrapper table-responsive">
                  <table class="table striped-table">
                    <thead>
                      <tr>
                        <th>
                          <h6>Id Skill</h6>
                        </th>
                        <th>
                          <h6>Nama Skill</h6>
                        </th>
                        <th>
                          <h6>Action</h6>
                        </th>
                      </tr>
                      <!-- end table row-->
                    </thead>
                    <tbody>
                      <?php $no = 1 ?>
                      @foreach($skill as $skill) 
                      <tr>
                        <td>
                          <p>{{ $skill->id_skill}}</p>
                        </td>
                        <td>
                          <p>{{ $skill->nama_skill }}</p>
                        </td>
                        <td>
                          <div class="action">
                            <div class="d-flex action-kategori">
                              <a href="{{ route('admin.edit-skill-page', ['id' => $skill->id_skill]) }}" id="editSkill">
                                <i class="lni lni-pencil text-primary"></i>
                              </a>
                              <form action="{{ route('admin.delete-skill-action', ['id' => $skill->id_skill]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="confirmDelete(event)" style="background:none; border:none; padding:0; cursor:pointer;">
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