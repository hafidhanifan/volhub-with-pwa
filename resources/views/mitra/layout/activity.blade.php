@include('mitra.layout.templates.header')
@include('mitra.layout.templates.sidebar')
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
        <h1 class="font-normal text-lg">Volunteer Management</h1>
        <p class="text-gray-500 text-sm">Manage your volunteer data</p>
      </div>
      <div class="pl-4 mt-2 md:pr-4 md:mt-0">
        <a href="{{ route('mitra.add-kegiatan-page', ['id' => $mitra->id_mitra]) }}"
          class="py-3 px-3 h-fit text-white text-sm font-medium rounded-lg bg-sky-500 hover:bg-sky-600">
          Add Volunteer
        </a>
      </div>
    </div>
  </div>

  <div class="hidden w-full lg:flex justify-between items-center">
    <div class="p-4">
      <h1 class="font-normal text-lg">Volunteer Management</h1>
      <p class="text-gray-500 text-sm">Manage your volunteer data</p>
    </div>
    <div class="pr-4">
      <a href="{{ route('mitra.add-kegiatan-page', ['id' => $mitra->id_mitra]) }}"
        class="py-3 px-3 h-fit text-white text-sm font-medium rounded-lg bg-sky-500 hover:bg-sky-600">
        Add Volunteer
      </a>
    </div>
  </div>
  <!-- Header Content End -->

  <!-- Volunteer list start -->
  <div class="mt-8 overflow-x-auto w-full lg:mt-0 lg:p-4">
    @if(!empty($kegiatans))
    <table class="min-w-full table-auto border-separate border-spacing-0 border border-gray-200 lg:rounded-lg">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">
            Volunteer listing
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
        <?php $no = 1 ?>
        @foreach($kegiatans as $kegiatan)
        <tr id="activity" class="activity cursor-pointer hover:bg-button_hover2"
          data-id-kegiatan="{{ $kegiatan->id_kegiatan }}" data-nama-kegiatan="{{ $kegiatan->nama_kegiatan }}"
          data-nama-mitra="{{ $kegiatan->mitra->nama_mitra }}" data-lokasi-kegiatan="{{ $kegiatan->lokasi_kegiatan }}"
          data-logo="
                    @if($mitra->logo)
                    {{ asset('storage/logo/'.$kegiatan->mitra->logo) }}
                    @else
                    {{ asset('img/default-profile.png') }}
                    @endif
                  " data-sistem-kegiatan="{{ $kegiatan->sistem_kegiatan}}"
          data-pendaftar-count="{{ $kegiatan->pendaftars_count}} applied"
          data-deskripsi-kegiatan="{{ $kegiatan->deskripsi }}"
          data-nama-kriteria="{{ implode(',', $kegiatan->kriterias->pluck('nama_kriteria')->toArray()) }}"
          data-nama-benefit="{{ implode(',', $kegiatan->benefits->pluck('nama_benefit')->toArray()) }}"
          data-tgl-kegiatan="{{ $kegiatan->formatted_kegiatan_date }}"
          data-tgl-penutupan="{{ $kegiatan->formatted_penutupan_date }}">

          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
            <span class="font-semibold">{{$kegiatan->nama_kegiatan}}</span>
            <p class="text-sm text-gray-500">{{$kegiatan->lokasi_kegiatan}}</p>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{$kegiatan->formatted_kegiatan_date}}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{$kegiatan->formatted_penutupan_date}}</td>
          <td class="px-6 py-4 flex">
            <form
              action="{{ route('mitra.delete-kegiatan-action', ['id' => $mitra->id_mitra, 'id_keg' => $kegiatan->id_kegiatan]) }}"
              method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="event.stopPropagation();">
                <svg class="w-7 stroke-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                    d="m18 6-.8 12.013c-.071 1.052-.106 1.578-.333 1.977a2 2 0 0 1-.866.81c-.413.2-.94.2-1.995.2H9.994c-1.055 0-1.582 0-1.995-.2a2 2 0 0 1-.866-.81c-.227-.399-.262-.925-.332-1.977L6 6M4 6h16m-4 0-.27-.812c-.263-.787-.394-1.18-.637-1.471a2 2 0 0 0-.803-.578C13.938 3 13.524 3 12.694 3h-1.388c-.829 0-1.244 0-1.596.139a2 2 0 0 0-.803.578c-.243.29-.374.684-.636 1.471L8 6"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
        <!-- Tambahkan baris lainnya sesuai data -->
      </tbody>
    </table>

    {{-- If data is empty --}}
    @else
    <div class="w-full h-[calc(100vh-200px)] flex flex-col gap-3 items-center justify-center ">
      <p class="text-center">Hmm, it seems the data is still empty. Please add volunteer data first !</p>
      <svg class="w-10" viewBox="0 0 91 91" id="Layer_1" version="1.1" xml:space="preserve"
        xmlns="http://www.w3.org/2000/svg" fill="#000">
        <g id="SVGRepo_iconCarrier">
          <style>
            .st0 {
              fill: #4e7a9e
            }
          </style>
          <path class="st0"
            d="M25.6 31.7c2.1 2.1 4.2 4.2 6.2 6.5 3 3.4 8.4-2.1 5-5-3.2-2.7-6.1-5.7-9.2-8.5-1.5-1.5-3.8-1.1-5 .6-2.5 3.8-5.4 7-8.8 10-1.7 1.4.1 4.6 2.2 3.8 3.8-1.5 7-4.3 9.6-7.4zM67.4 24.7c-1.5-1.5-3.8-1.1-5 .6-2.5 3.8-5.4 7-8.8 10-1.7 1.4.1 4.6 2.2 3.8 3.8-1.5 6.9-4.3 9.6-7.4 2.1 2.1 4.2 4.2 6.2 6.5 3 3.4 8.4-2.1 5-5-3.3-2.7-6.2-5.7-9.2-8.5zM67.5 57.2c-3.7 1.6-6.9 3.8-10.9 4.9-4 1.1-8.1 1.6-12.2 1.5-8 0-15-3.2-22.3-6-.8-.3-1.6.8-1.1 1.4 1.3 1.6 2.4 3.2 4.1 4.4 1.9 1.3 4 2.2 6.1 3.1 4.2 1.7 8.7 2.6 13.2 2.9 4.6.3 9.4-.3 13.8-1.5 4.3-1.2 9.6-2.9 12.8-6.2 2.4-2.4-.6-5.7-3.5-4.5z" />
        </g>
      </svg>
    </div>
    @endif
    <!-- Volunteer list end -->
  </div>
  <!-- Detail volunteer start -->
  <div id="detailVolunteer" data-id-mitra="{{ auth()->user()->id_mitra }}"
    class="fixed w-full h-screen top-0 bg-white transform translate-x-full transition-transform duration-500 ease-in-out z-40 overflow-y-auto lg:w-1/3 lg:right-0">
    <div class="relative h-20 rounded-t-lg bg-slate-100">
      <div class="absolute right-2 top-2">
        <button id="closeDetailVolunteerMitraBtn">
          <svg class="w-7 fill-slate-600" viewBox="0 -0.5 25 25" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M6.97 16.47a.75.75 0 1 0 1.06 1.06l-1.06-1.06Zm6.06-3.94a.75.75 0 1 0-1.06-1.06l1.06 1.06Zm-1.06-1.06a.75.75 0 1 0 1.06 1.06l-1.06-1.06Zm6.06-3.94a.75.75 0 0 0-1.06-1.06l1.06 1.06Zm-5 3.94a.75.75 0 1 0-1.06 1.06l1.06-1.06Zm3.94 6.06a.75.75 0 1 0 1.06-1.06l-1.06 1.06Zm-5-5a.75.75 0 1 0 1.06-1.06l-1.06 1.06ZM8.03 6.47a.75.75 0 0 0-1.06 1.06l1.06-1.06Zm0 11.06 5-5-1.06-1.06-5 5 1.06 1.06Zm5-5 5-5-1.06-1.06-5 5 1.06 1.06Zm-1.06 0 5 5 1.06-1.06-5-5-1.06 1.06Zm1.06-1.06-5-5-1.06 1.06 5 5 1.06-1.06Z" />
          </svg>
        </button>
      </div>
      <div class="absolute -bottom-8 left-2">
        <div class="relative group">
          <img class="img w-16 h-16 object-cover rounded-full" alt="Avatar" />
          <div
            class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-1 h-5 w-5 flex items-center justify-center text-xs">
            !
          </div>
          <div
            class="absolute left-10 mb-2 w-60 px-2 py-1 text-xs text-white bg-rose-500 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none lg:text-sm">
            You have not uploaded the company logo
          </div>
        </div>
      </div>
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
        <p class="sistemKegiatan leading-none text-sm text-slate-600">Offline</p>
      </div>
      <div class="flex items-center gap-2">
        <svg class="w-4 fill-slate-600" viewBox="-4 0 32 32" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6Zm0-8a5 5 0 1 0 0 10 5 5 0 0 0 0-10Zm0 22c-1.663.009-10-12.819-10-17C2 6.478 6.477 2 12 2s10 4.478 10 10c0 4.125-8.363 17.009-10 17Zm0-29C5.373 0 0 5.373 0 12c0 5.018 10.005 20.011 12 20 1.964.011 12-15.05 12-20 0-6.627-5.373-12-12-12Z"
            fill-rule="evenodd" />
        </svg>
        <p class="lokasiKegiatan leading-none text-sm text-slate-600">Yogyakarta</p>
      </div>
    </div>
    <div class="w-full p-4">
      <a id="editBtn" href="#"
        class="w-full block text-center py-3 text-white font-medium rounded-lg bg-sky-500 hover:bg-sky-600">
        Edit Volunteer
      </a>
    </div>
    <div class="px-4 flex justify-evenly gap-2">
      <div class="w-1/2 bg-red-200 rounded-lg p-2">
        <span class="text-sm font-normal">Registration closed :</span>
        <p class="tglPenutupan text-sm leading-none font-light">24 December 2024</p>
      </div>
      <div class="w-1/2 bg-sky-200 rounded-lg p-2">
        <span class="text-sm font-normal">Volunteering begin :</span>
        <p class="tglKegiatan text-sm leading-none font-light">25 December 2025</p>
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
<!-- Content End -->

{{-- @include('admin.layout.templates.footer') --}}