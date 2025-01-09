@include('mitra.layout.templates.api.api-header')
@include('mitra.layout.templates.api.api-sidebar')
@include('mitra.layout.templates.overlay')

<!-- Content Start -->
<main class="w-full">
  <!-- Header Content Start -->
  <!-- Mobile -->
  <div class="lg:hidden">
    <button id="toggleSidebar" class="h-14 z-40 p-2">
      <svg class="w-7 stroke-gray-500" viewBox="0 0 24 24">
        <path d="M4 12h16m0 0-4-4m4 4-4 4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    </button>
    <div class="w-full flex flex-col justify-between md:items-center md:flex-row">
      <div class="pl-4 pb-3">
        <h1 class="font-normal text-lg">Activity Management</h1>
        <p class="text-gray-500 text-sm">Manage your Activity data</p>
      </div>
      <div class="pl-4 md:pr-4">
        <a href=""
          class="py-3 px-3 h-fit text-white text-sm font-medium rounded-lg bg-sky-500 hover:bg-sky-600">
          Add Activity
        </a>
      </div>
    </div>
  </div>

  <div class="hidden w-full lg:flex justify-between items-center">
    <div class="p-4">
      <h1 class="font-normal text-lg">Activity Management</h1>
      <p class="text-gray-500 text-sm">Manage your Activity data</p>
    </div>
    <div class="pr-4">
      <a href=""
        class="py-3 px-3 h-fit text-white text-sm font-medium rounded-lg bg-sky-500 hover:bg-sky-600">
        Add Activity
      </a>
    </div>
  </div>

  <!-- Header Content End -->
  <div class="mt-8 overflow-x-auto w-full lg:mt-0 lg:p-4">
    <!-- Volunteer list start -->

    <table class="min-w-full table-auto border-separate border-spacing-0 border border-gray-200 lg:rounded-lg">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">
            Activity listing
          </th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">
            Date posted
          </th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">
            Date expires
          </th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">
            Action
          </th>
        </tr>
      </thead>
      <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
        @if($kegiatans)
          @foreach ($kegiatans as $kegiatan)
              <tr id="activity" class="activity cursor-pointer hover:bg-button_hover2"
              data-id-kegiatan="{{ $kegiatan['id_kegiatan'] }}"
              data-id-mitra="{{ $kegiatan['id_mitra'] }}",
              data-nama-mitra="{{ $mitra['nama_mitra']}}"
              >
                  <td class="px-6 py-4 text-sm text-gray-800">
                      <span class="font-semibold">{{ $kegiatan['nama_kegiatan'] ?? 'Tidak ada nama kegiatan' }}</span>
                      <p class="text-sm text-gray-500">{{ $kegiatan['lokasi_kegiatan'] ?? 'Tidak ada lokasi' }}</p>
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-600">
                      {{ $kegiatan['formatted_kegiatan_date'] ?? 'Tanggal tidak tersedia' }}
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-600">
                      {{ $kegiatan['formatted_penutupan_date'] ?? 'Tanggal tidak tersedia' }}
                  </td>
                  <td class="px-6 py-4 flex">
                    <button type="submit">
                      <svg class="w-7 stroke-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="m18 6-.8 12.013c-.071 1.052-.106 1.578-.333 1.977a2 2 0 0 1-.866.81c-.413.2-.94.2-1.995.2H9.994c-1.055 0-1.582 0-1.995-.2a2 2 0 0 1-.866-.81c-.227-.399-.262-.925-.332-1.977L6 6M4 6h16m-4 0-.27-.812c-.263-.787-.394-1.18-.637-1.471a2 2 0 0 0-.803-.578C13.938 3 13.524 3 12.694 3h-1.388c-.829 0-1.244 0-1.596.139a2 2 0 0 0-.803.578c-.243.29-.374.684-.636 1.471L8 6"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </button>
                  </td>
              </tr>
          @endforeach
        @else
          <p>Tidak ada data kegiatan</p>
        @endif
      </tbody>
    </table>
    <!-- Volunteer list end -->
  </div>
  <!-- Detail volunteer start -->
  <div id="detailVolunteer"
  {{-- data-auth-mitra="{{ auth()->user()->id_mitra }}" --}}
    class="fixed w-full h-screen top-0 bg-white transform translate-x-full transition-transform duration-500 ease-in-out z-50 overflow-y-auto lg:w-1/3 lg:right-0">
    <div class="relative h-20 rounded-t-lg bg-slate-100">
      <div class="absolute right-2 top-2">
        <button id="closeDetailVolunteerMitraBtn">
          <svg class="w-7 fill-slate-600" viewBox="0 -0.5 25 25" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M6.97 16.47a.75.75 0 1 0 1.06 1.06l-1.06-1.06Zm6.06-3.94a.75.75 0 1 0-1.06-1.06l1.06 1.06Zm-1.06-1.06a.75.75 0 1 0 1.06 1.06l-1.06-1.06Zm6.06-3.94a.75.75 0 0 0-1.06-1.06l1.06 1.06Zm-5 3.94a.75.75 0 1 0-1.06 1.06l1.06-1.06Zm3.94 6.06a.75.75 0 1 0 1.06-1.06l-1.06 1.06Zm-5-5a.75.75 0 1 0 1.06-1.06l-1.06 1.06ZM8.03 6.47a.75.75 0 0 0-1.06 1.06l1.06-1.06Zm0 11.06 5-5-1.06-1.06-5 5 1.06 1.06Zm5-5 5-5-1.06-1.06-5 5 1.06 1.06Zm-1.06 0 5 5 1.06-1.06-5-5-1.06 1.06Zm1.06-1.06-5-5-1.06 1.06 5 5 1.06-1.06Z" />
          </svg>
        </button>
      </div>
      <img src="../src/image/mitra-logo-3.jpg" alt="Logo Mitra"
        class="absolute -bottom-8 left-2 max-w-16 bg-transparent rounded-full" />
    </div>
    <div class="mt-9 p-4">
      <h1 class="namaKegiatan font-medium text-lg line-clamp-3">
      </h1>
      <h2 class="namaMitra mt-2 text-slate-600 font-light text-sm">
      </h2>
    </div>
    <div class="pl-4 mt-2 flex gap-4">
      <div class="flex items-center gap-2">
        <svg class="w-5 stroke-slate-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M3 19v-1a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v1m0-8a3 3 0 1 0 0-6m6 14v-1a4 4 0 0 0-4-4h-.5M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <p class="pendaftarCount leading-none text-sm text-slate-600"></p>
      </div>
      <div class="flex items-center gap-2">
        <svg class="w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round">
            <path opacity=".34" d="M5 10h2c2 0 3-1 3-3V5c0-2-1-3-3-3H5C3 2 2 3 2 5v2c0 2 1 3 3 3Z" />
            <path d="M17 10h2c2 0 3-1 3-3V5c0-2-1-3-3-3h-2c-2 0-3 1-3 3v2c0 2 1 3 3 3Z" />
            <path opacity=".34" d="M17 22h2c2 0 3-1 3-3v-2c0-2-1-3-3-3h-2c-2 0-3 1-3 3v2c0 2 1 3 3 3Z" />
            <path d="M5 22h2c2 0 3-1 3-3v-2c0-2-1-3-3-3H5c-2 0-3 1-3 3v2c0 2 1 3 3 3Z" />
          </g>
        </svg>
        <p class="sistemKegiatan leading-none text-sm text-slate-600"></p>
      </div>
      <div class="flex items-center gap-2">
        <svg class="w-4 fill-slate-600" viewBox="-4 0 32 32" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6Zm0-8a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm0 22c-1.663.009-10-12.819-10-17C2 6.478 6.477 2 12 2s10 4.478 10 10c0 4.125-8.363 17.009-10 17Zm0-29C5.373 0 0 5.373 0 12c0 5.018 10.005 20.011 12 20 1.964.011 12-15.05 12-20 0-6.627-5.373-12-12-12Z"
            fill-rule="evenodd" />
        </svg>
        <p class="lokasiKegiatan leading-none text-sm text-slate-600"></p>
      </div>
    </div>
    <div class="w-full p-4">
      <a id="editBtn" href="#" class="w-full block text-center py-3 text-white font-medium rounded-lg bg-sky-500 hover:bg-sky-600">
        Edit Activity
      </a>
    </div>
    <div class="px-4 flex justify-evenly gap-2">
      <div class="w-1/2 bg-red-200 rounded-lg p-2">
        <span class="text-sm font-normal">Registration closed :</span>
        <p class="tglPenutupan text-sm leading-none font-light"></p>
      </div>
      <div class="w-1/2 bg-sky-200 rounded-lg p-2">
        <span class="text-sm font-normal">Volunteering begin :</span>
        <p class="tglKegiatan text-sm leading-none font-light"></p>
      </div>
    </div>
    <div class="px-4 pt-5">
      <h2 class="font-semibold">Description</h2>
      <p class="deskripsiKegiatan text-sm text-justify"></p>
    </div>
    <div class="px-4 pt-5">
      <div class="flex justify-between items-center">
        <h2 class="font-semibold">Requirement</h2>
        <a id="addRequirementBtn" href="#" class="text-sm text-sky-700 cursor-pointer flex items-center">
          <svg class="w-4 stroke-sky-700" viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 12h16m-8-8v16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          Add requirement
        </a>
      </div>

      <div class="kriteriaContainer flex gap-2 flex-wrap mt-2">
        <span class="namaKriteria px-4 py-1 bg-sky-200 text-sm rounded-lg"></span>
        <span class="namaKriteria px-4 py-1 bg-red-200 text-sm rounded-lg"></span>
      </div>
    </div>
    <div class="px-4 pt-5">
      <div class="flex justify-between items-center">
        <h2 class="font-semibold">Benefit</h2>
        <a id="addBenefitBtn" href="#" class="text-sm text-sky-700 cursor-pointer flex items-center">
          <svg class="w-4 stroke-sky-700" viewBox="0 0 24 24" fill="" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 12h16m-8-8v16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          Add benefit
        </a>
      </div>
      <div class="benefitContainer flex gap-2 flex-wrap mt-2">
        <span class="namaBenefit px-4 py-1 bg-sky-200 text-sm rounded-lg"></span>
        <span class="namaBenefit px-4 py-1 bg-red-200 text-sm rounded-lg"></span>
      </div>
    </div>
  </div>
  <!-- Detail volunteer end -->
</main>
<script>
  // Injeksi token ke dalam JavaScript
const API_TOKEN = "{{ $token }}";

document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const toggleSidebar = document.getElementById("toggleSidebar");
    const overlay = document.getElementById("overlay");

    // Open sidebar
    const openSidebar = () => {
        sidebar.classList.remove("-translate-x-full");
        sidebar.classList.add("translate-x-0");
        overlay.classList.remove("hidden", "opacity-0");
        overlay.classList.add("opacity-50");
    };

    // Close sidebar
    const closeSidebar = () => {
        sidebar.classList.remove("translate-x-0");
        sidebar.classList.add("-translate-x-full");
        overlay.classList.add("opacity-0");
        overlay.classList.add("hidden");
    };

    toggleSidebar.addEventListener("click", openSidebar);
    overlay.addEventListener("click", closeSidebar);
});

document.addEventListener("DOMContentLoaded", function () {
    const overlay = document.getElementById("overlay");
    const detailVolunteer = document.getElementById("detailVolunteer");
    const tableBody = document.getElementById("tableBody");
    const closeDetailVolunteerMitraButton = document.getElementById(
        "closeDetailVolunteerMitraBtn"
    );

    // Function to show the detail and overlay
    const showDetail = () => {
        detailVolunteer.classList.remove("translate-x-full");
        detailVolunteer.classList.add("translate-x-0");
        overlay.classList.remove("opacity-0", "hidden");
        overlay.classList.add("opacity-100");
    };

    // Function to hide the detail and overlay
    const hideDetail = () => {
        detailVolunteer.classList.remove("translate-x-0");
        detailVolunteer.classList.add("translate-x-full");
        overlay.classList.remove("opacity-100");
        overlay.classList.add("opacity-0");
        setTimeout(() => {
            overlay.classList.add("hidden");
        }, 500); // Match the duration of the transition
    };

    // Add event listener to each row
    tableBody.querySelectorAll("tr").forEach((row) => {
        row.addEventListener("click", showDetail);
    });

    // Add event listener to close button and overlay
    closeDetailVolunteerMitraButton.addEventListener("click", hideDetail);
    overlay.addEventListener("click", hideDetail);
});

document.addEventListener("DOMContentLoaded", function () {
    const detailVolunteer = document.getElementById("detailVolunteer");
    const closeDetailVolunteerBtn = document.getElementById("closeDetailVolunteerMitraBtn");

    // Tambahkan event listener pada setiap baris kegiatan
    const activityRows = document.querySelectorAll("#tableBody .activity");
    activityRows.forEach(row => {
        row.addEventListener("click", function () {
            const mitraId = this.getAttribute("data-id-mitra"); // Ambil ID mitra
            const activityId = this.getAttribute("data-id-kegiatan"); // Ambil ID kegiatan
            const employerId = detailVolunteer.dataset.authMitra;

            // Clear data lama di modal untuk mencegah tampilan yang salah
            document.querySelector("#detailVolunteer .namaKegiatan").textContent = "Memuat...";
            document.querySelector("#detailVolunteer .namaMitra").textContent = "Memuat...";
            document.querySelector("#detailVolunteer .sistemKegiatan").textContent = "Memuat...";
            document.querySelector("#detailVolunteer .lokasiKegiatan").textContent = "Memuat...";
            document.querySelector("#detailVolunteer .tglPenutupan").textContent = "Memuat...";
            document.querySelector("#detailVolunteer .kriteriaContainer").textContent = "Memuat...";
            document.querySelector("#detailVolunteer .namaMitra").textContent = "Memuat...";
            document.querySelector("#detailVolunteer .benefitContainer").textContent = "Memuat...";

            // Ambil data kegiatan menggunakan API eksternal
            fetch(`https://api-volhub.cloud/employer/detailActivity?employerId=${mitraId}&activityId=${activityId}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${API_TOKEN}` // Gunakan token dari Blade
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch activity data');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    const activityData = data.data;

                    document.querySelector("#detailVolunteer .namaKegiatan").textContent = activityData.nama_kegiatan || "Tidak ada nama kegiatan";
                    document.querySelector("#detailVolunteer .sistemKegiatan").textContent = activityData.sistem_kegiatan || "Tidak ada nama kegiatan";
                    document.querySelector("#detailVolunteer .lokasiKegiatan").textContent = activityData.lokasi_kegiatan || "Tidak ada lokasi kegiatan";
                    document.querySelector("#detailVolunteer .tglPenutupan").textContent = activityData.tgl_penutupan || "Tidak ada tanggal penutupan";
                    document.querySelector("#detailVolunteer .tglKegiatan").textContent = activityData.tgl_kegiatan || "Tidak ada tanggal kegiatan";
                    document.querySelector("#detailVolunteer .pendaftarCount").textContent = `${activityData.jumlah_pendaftar || 0} Pendaftar`;

                    // Menampilkan kriteria
                    const kriteriaContainer = detailVolunteer.querySelector(".kriteriaContainer");
                    kriteriaContainer.innerHTML = ""; // Clear sebelumnya
                    if (activityData.kriterias && activityData.kriterias.length > 0) {
                        activityData.kriterias.forEach(item => {
                            const span = document.createElement("span");
                            span.classList.add("namaKriteria", "px-4", "py-1", "bg-sky-200", "text-sm", "rounded-lg");
                            span.textContent = item.nama_kriteria;
                            kriteriaContainer.appendChild(span);
                        });
                    } else {
                        const emptyMessage = document.createElement("span");
                        emptyMessage.classList.add("px-4", "py-1", "bg-red-200", "text-sm", "rounded-lg");
                        emptyMessage.textContent = "Mitra belum mengisikan data kriteria";
                        kriteriaContainer.appendChild(emptyMessage);
                    }

                    // Menampilkan benefit
                    const benefitContainer = detailVolunteer.querySelector(".benefitContainer");
                    benefitContainer.innerHTML = ""; // Clear sebelumnya
                    if (activityData.benefits && activityData.benefits.length > 0) {
                        activityData.benefits.forEach(item => {
                            const span = document.createElement("span");
                            span.classList.add("namaBenefit", "px-4", "py-1", "bg-sky-200", "text-sm", "rounded-lg");
                            span.textContent = item.nama_benefit;
                            benefitContainer.appendChild(span);
                        });
                    } else {
                        const emptyMessage = document.createElement("span");
                        emptyMessage.classList.add("px-4", "py-1", "bg-red-200", "text-sm", "rounded-lg");
                        emptyMessage.textContent = "Mitra belum mengisikan data benefit";
                        benefitContainer.appendChild(emptyMessage);
                    }

                    // Setelah berhasil fetch detailActivity, lanjutkan fetch profile
                    return fetch(`https://api-volhub.cloud/employer/profile?employerId=${employerId}`, {
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': `Bearer ${API_TOKEN}` // Gunakan token dari Blade
                        }
                    });
                } else {
                    throw new Error("Data API detailActivity tidak valid");
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch profile data');
                }
                return response.json();
            })
            .then(data => {
                if (data.data) {
                    document.querySelector("#detailVolunteer .namaMitra").textContent = data.data.nama_mitra || "Tidak ada nama mitra";
                } else {
                    throw new Error("Data API profile tidak valid");
                }
            })
            .catch(error => {
                console.error("Error fetching data:", error);
                document.querySelector("#detailVolunteer .namaMitra").textContent = "Gagal memuat nama mitra";
            });

            // Tampilkan modal
            detailVolunteer.classList.remove("translate-x-full");
        });
    });

    // Tombol untuk menutup modal
    closeDetailVolunteerBtn.addEventListener("click", function () {
        detailVolunteer.classList.add("translate-x-full");
    });
});
  
// Close modal
document.getElementById('closeDetailVolunteerMitraBtn').addEventListener('click', function () {
    document.getElementById('detailVolunteer').classList.add('translate-x-full');
});
</script>
<!-- Content End -->

{{-- @include('admin.layout.templates.footer') --}}