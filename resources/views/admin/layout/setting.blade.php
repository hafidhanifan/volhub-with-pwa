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
                  <h2>Setting</h2>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
          @foreach($setting as $setting)
          <form class="form-elements-wrapper">
            <div class="row">
              <div class="col-lg-6">
                <!-- input style start -->
                <div class="card-style mb-30 d-flex flex-column">
                  <div class="input-style-1">
                    <label>Username</label>
                    <input type="none" placeholder="Username" name="username" value="{{ old('setting', $setting->username) }}" readonly/>
                  </div>
                  <div class="input-style-1">
                    <label>Masukkan Password</label>
                    <input type="password" placeholder="Password" name="password" value="{{ old('setting', $setting->password) }}" readonly/>
                  </div>
                  <a
                    href="{{ route('admin.edit-setting-page', ['id' => $setting->id]) }}"
                    class="main-btn-kategori primary-btn rounded-full btn-hover right-align"
                    >Edit</a
                  >
                </div>

                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </form>
          @endforeach
        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->

      @include('admin.layout.templates.footer')