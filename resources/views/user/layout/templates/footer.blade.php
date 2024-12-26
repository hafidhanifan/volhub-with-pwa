<footer class="bg-[#3795BD] w-full mt-16">
  <div class="pb-8 flex flex-col items-center gap-8 lg:flex-row lg:justify-evenly lg:items-start">
    <div class="max-w-xs pt-8 flex justify-evenly lg:gap-4">
      <img src="../src/image/volhub-white-logo.png" alt="Volhub footer logo" class="w-1/3 lg:w-2/5" />
      <div class="flex flex-col lg:gap-2">
        <span class="text-2xl font-medium text-white lg:text-3xl">MUDA</span>
        <span class="text-2xl font-medium text-white lg:text-3xl">BERGERAK</span>
        <span class="text-2xl font-medium text-white lg:text-3xl">BERTINDAK</span>
      </div>
    </div>
    <div class="mt-4 pt-4 flex justify-evenly gap-6">
      <div class="flex flex-col gap-3">
        <span class="text-slate-800 font-semibold">Company</span>
        <a href="" class="text-white cursor-pointer">About Us</a>
        <a href="" class="text-white cursor-pointer">Our Team</a>
        <a href="" class="text-white cursor-pointer">Contact Us</a>
      </div>
      <div class="flex flex-col gap-3">
        <span class="text-slate-800 font-semibold">For Volunteer</span>
        <a href="" class="text-white cursor-pointer">Volunteer Category</a>
        <a href="" class="text-white cursor-pointer">Volunteer Location</a>
        <a href="" class="text-white cursor-pointer">Help Center</a>
      </div>
    </div>
    <div class="mt-4 max-w-xs pt-4 text-center">
      <span class="block mb-4 text-slate-800 font-semibold">Supported by</span>
      <img src="../src/image/logo-kampus merdeka dan dicoding.png" alt="Logo kampus merdeka dan dicoding"
        class="w-4/5 mx-auto lg:mt-6 lg:w-11/12" />
    </div>
  </div>
  <!-- Credit card start -->
  <div class=""></div>
</footer>

<script src="{{ asset('/js/user.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
        @endif

        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        @endif
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
  function toggleContent() {
    console.log('Icon clicked'); // Pastikan fungsi ini dipanggil
    var content = document.getElementById('credit-hover-content');

    console.log('Current display style:', window.getComputedStyle(content).display); // Tambahkan log ini untuk melihat status saat ini
    
    if (window.getComputedStyle(content).display === 'none') {
        content.style.display = 'block';
        console.log('Content shown'); // Ini untuk memastikan bahwa konten seharusnya muncul
    } else {
        content.style.display = 'none';
        console.log('Content hidden'); // Ini untuk memastikan bahwa konten disembunyikan
    }
}
</script>

</body>

</html>