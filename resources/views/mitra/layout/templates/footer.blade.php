<!-- ========== footer start =========== -->
<footer class="footer">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 order-last order-md-first">
        <div class="copyright text-center text-md-start">
          <p class="text-sm">
            Designed and Developed by
            <a href="https://plainadmin.com" rel="nofollow" target="_blank">
              PlainAdmin
            </a>
          </p>
        </div>
      </div>
      <!-- end col-->
      <div class="col-md-6">
        <div class="terms d-flex justify-content-center justify-content-md-end">
          <a href="#0" class="text-sm">Term & Conditions</a>
          <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
        </div>
      </div>
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</footer>
<!-- ========== footer end =========== -->
</main>

{{-- <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/js/Chart.min.js') }}"></script>
<script src="{{ asset('/js/dynamic-pie-chart.js') }}"></script>
<script src="{{ asset('/js/moment.min.js') }}"></script>
<script src="{{ asset('/js/fullcalendar.js') }}"></script>
<script src="{{ asset('/js/jvectormap.min.js') }}"></script>
<script src="{{ asset('/js/world-merc.js') }}"></script>
<script src="{{ asset('/js/polyfill.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>
<script src="{{ asset('/js/mitra.js')}}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  function updateStatusClass() {
        const dropdown = document.getElementById('statusDropdown');
        const selectedValue = dropdown.value;
        
        dropdown.classList.remove('status-dalam-review', 'status-diterima', 'status-ditolak');
        
        if (selectedValue === 'Dalam Review') {
          dropdown.classList.add('status-dalam-review');
        } else if (selectedValue === 'Diterima') {
          dropdown.classList.add('status-diterima');
        } else if (selectedValue === 'Ditolak') {
          dropdown.classList.add('status-ditolak');
        }
      }
      
      document.addEventListener('DOMContentLoaded', (event) => {
        updateStatusClass(); // Initialize class based on the current value
      });
</script>

<script>
  function confirmDelete(event) {
        event.preventDefault();
        
        Swal.fire({
            title: 'Peringatan',
            text: "Anda yakin ingin menghapus data ini ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                // event.target.form.submit(); 
                event.target.closest('form').submit();
            }
        });
    }
</script>


@if (!request()->is('login'))
<script>
  let timer;
  const logoutTime = 900000; //

  function resetTimer() {
    clearTimeout(timer);
    timer = setTimeout(() => {
        Swal.fire({
            title: "Kamu tidak aktif!",
            text: "Anda akan logout otomatis karena tidak ada aktivitas",
            icon: "warning",
            showCancelButton: true, // Menampilkan tombol cancel
            confirmButtonText: "Log Out",
            cancelButtonText: "Tetap Login",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route('mitra.logout') }}';
            } else {
                resetTimer(); // Reset timer jika memilih Stay Logged In
            }
        });
    }, logoutTime);
}

  window.onload = () => {
      if (!window.location.href.includes('/login')) { // Cek jika pengguna tidak di halaman login
          resetTimer();
          window.onmousemove = resetTimer;
          window.onkeypress = resetTimer;
          window.onscroll = resetTimer;
          window.onclick = resetTimer;
      }
  };

  window.onbeforeunload = () => {
      clearTimeout(timer);
      window.onmousemove = null;
      window.onkeypress = null;
      window.onscroll = null;
      window.onclick = null;
  };
</script>
@endif

@if(session('error'))
<script>
  document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
        });
    });
</script>
@endif

@include('sweetalert::alert')
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const editButton = document.querySelector(".edit-icon");
    const uploadButton = document.querySelector(".upload-edit");

    if (editButton) {
        editButton.addEventListener("click", () => {
            uploadButton.style.display = "block";
        });
    }

    // Menangani perubahan pada input file
    const uploadInput = document.getElementById("uploadInput");

    if (uploadInput) {
        uploadInput.addEventListener("change", () => {
            if (uploadInput.files.length > 0) {
                uploadButton.style.display = "block";
            } else {
                uploadButton.style.display = "none";
            }
        });

        uploadInput.addEventListener("click", () => {
            uploadInput.value = null;
            uploadButton.style.display = "none";
        });
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/cropperjs@1.5.12/dist/cropper.min.js"></script>

<script>
  var image = document.getElementById('uploadInput');
  var preview = document.getElementById('preview');
  var cropper;

  image.addEventListener('change', function(e) {
      var files = e.target.files;
      if (files && files.length > 0) {
          var reader = new FileReader();
          reader.onload = function(event) {
              preview.src = event.target.result;
              preview.style.display = 'block';
              if (cropper) {
                  cropper.destroy(); // Menghancurkan cropper lama jika ada
              }
              cropper = new Cropper(preview, {
                  aspectRatio: 1,
                  viewMode: 1,
                  ready: function () {
                      cropper.setCropBoxData({ width: 256, height: 256 });
                  },
                  crop(event) {
                      var canvas = cropper.getCroppedCanvas({
                          width: 512,
                          height: 512,
                          minWidth: 256,
                          minHeight: 256,
                          maxWidth: 256,
                          maxHeight: 256,
                          fillColor: '#fff',
                          imageSmoothingEnabled: true,
                          imageSmoothingQuality: 'high',
                      });
                      canvas.toBlob(function(blob) {
                          var reader = new FileReader();
                          reader.readAsDataURL(blob);
                          reader.onloadend = function() {
                              var base64data = reader.result;
                              document.getElementById('cropped_image').value = base64data;
                          };
                      }, 'image/png', 1);
                  }
              });
          };
          reader.readAsDataURL(files[0]);
      }
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
  const ellipsisIcons = document.querySelectorAll('.fa-ellipsis-vertical');

  ellipsisIcons.forEach(icon => {
    icon.addEventListener('click', function(event) {
      // Mencegah default link action
      event.preventDefault();

      // Toggle visibility dari dropdown
      const dropdown = this.nextElementSibling;
      dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    });
  });
});
</script>

</body>

</html>