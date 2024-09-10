 <!-- ========== footer start =========== -->
 <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 order-last order-md-first">
              <div class="copyright text-center text-md-start">
                <p class="text-sm">
                  Designed and Developed by
                  <a
                    href="https://plainadmin.com"
                    rel="nofollow"
                    target="_blank"
                  >
                    PlainAdmin
                  </a>
                </p>
              </div>
            </div>
            <!-- end col-->
            <div class="col-md-6">
              <div
                class="terms d-flex justify-content-center justify-content-md-end"
              >
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

    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/js/Chart.min.js') }}"></script>
    <script src="{{ asset('/js/dynamic-pie-chart.js') }}"></script>
    <script src="{{ asset('/js/moment.min.js') }}"></script>
    <script src="{{ asset('/js/fullcalendar.js') }}"></script>
    <script src="{{ asset('/js/jvectormap.min.js') }}"></script>
    <script src="{{ asset('/js/world-merc.js') }}"></script>
    <script src="{{ asset('/js/polyfill.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
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
                window.location.href = '{{ route('admin.logout') }}';
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
  </body>
</html>
