@include('user.layout.templates.header')
@include('user.layout.templates.navbar')

<main class="mt-20 mb-20">
  <!-- Search section start -->
  <section class="flex items-center p-4 ml-4 max-w-2xl">
    <!-- Search Bar -->
    <form method="GET" action="{{ route('search') }}" class="flex">
      <!-- Dropdown -->
      <div class="relative inline-block">
        <select id="dropdownCategories" name="kategori"
          class="h-[37.6px] flex items-center gap-1 px-4 rounded-l-md font-light text-sm text-slate-600 bg-slate-100 border-l border-t border-b border-slate-300">
          <option value="" {{ request('kategori')=='' ? 'selected' : '' }}>All Categories</option>
          @foreach ($kategori as $itemKategori)
          <option value="{{ $itemKategori->id_kategori }}" {{ request('kategori')==$itemKategori->id_kategori ?
            'selected' : '' }}>
            {{ $itemKategori->nama_kategori }}
          </option>
          @endforeach
        </select>
      </div>

      <!-- Input Search -->
      <div class="flex-1">
        <input type="text" name="search" placeholder="Search..."
          class="w-full px-4 py-2 text-sm border-slate-300 bg-slate-100 focus:border-sky-500 focus:ring focus:ring-sky-500 focus:ring-opacity-0"
          value="{{ request('search') }}" />
      </div>

      <!-- Search Button -->
      <button type="submit" class="h-[37.6px] px-2 py-2 rounded-r-md bg-cyan-500">
        <svg class="w-6 fill-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M15 10.5a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm-.82 4.74a6 6 0 1 1 1.06-1.06l4.79 4.79-1.06 1.06-4.79-4.79Z" />
        </svg>
      </button>
    </form>
  </section>
  <!-- Search section end -->

  <!-- All volunteer start -->
  <section>
    <div class="lg:flex lg:justify-center lg:gap-x-4 lg:px-8 lg:mt-2">
      <!-- Volunteer Card -->
      <div class="bg-white lg:w-1/3 lg:bg-white lg:rounded-lg lg:shadow-sm lg:p-4">
        <div class="p-2 border-b bg-white lg:rounded-t-lg">
          <span class="block font-medium">All Volunteer</span>
          <span class="block text-sm text-slate-500 font-normal">{{ $totalKegiatan }} results</span>
        </div>

        @if(auth()->check())
        @php
        $user = auth()->user();
        @endphp
        <div class="overflow-y-auto max-h-[75vh]">
          @if($kegiatans->isNotEmpty())
          <?php $no = 1 ?>
          @foreach($kegiatans as $kegiatan)
          <div id="volunteerCard"
            class="volunteerCard flex p-2 gap-x-4 border-b hover:bg-button_hover2 transition duration-100"
            data-id-kegiatan="{{ $kegiatan->id_kegiatan }}"
            data-route="{{ route('user.add-pendaftaran-action', ['id' => auth()->id(), 'id_kegiatan' => $kegiatan->id_kegiatan]) }}"
            data-nama-kegiatan="{{ $kegiatan->nama_kegiatan }}" data-nama-mitra="{{ $kegiatan->mitra->nama_mitra }}"
            data-lokasi-kegiatan="{{ $kegiatan->lokasi_kegiatan }}"
            data-logo="{{ asset('storage/logo/'.$kegiatan->mitra->logo) }}"
            data-sistem-kegiatan="{{ $kegiatan->sistem_kegiatan}}" {{-- data-sisa-hari="{{ $kegiatan->sisa_hari }}" --}}
            data-pendaftar-count="{{ $kegiatan->pendaftars_count}} applied" data-deskripsi="{{ $kegiatan->deskripsi}}"
            data-nama-kriteria="{{ implode(',', $kegiatan->kriterias->pluck('nama_kriteria')->toArray()) }}"
            data-nama-benefit="{{ implode(',', $kegiatan->benefits->pluck('nama_benefit')->toArray()) }}"
            data-sisa-hari="
                   @if($kegiatan->sisa_hari > 0)
                      {{ $kegiatan->sisa_hari }} days left
                  @else
                      Closed
                  @endif
                  " data-button="{{ $kegiatan->sisa_hari > 0 ? 'Apply' : 'Closed' }}">
            <div class="max-w-16">
              <img src="{{asset('storage/logo/'.$kegiatan->mitra->logo)}}" alt=""
                class="w-full rounded-full outline outline-1 outline-slate-200" />
            </div>
            <div class="w-full">
              <div class="flex flex-col gap-1">
                <p class="font-semibold line-clamp-1">
                  {{ $kegiatan->nama_kegiatan }}
                </p>
                <p class="text-sm text-gray-800 line-clamp-1">
                  {{ $kegiatan->mitra->nama_mitra }}
                </p>
                <p class="text-sm text-gray-800 line-clamp-1">{{ $kegiatan->lokasi_kegiatan }}</p>
                <p class="text-sm text-gray-800">{{ $kegiatan->sistem_kegiatan}}</p>
              </div>
            </div>
          </div>
          @endforeach
          @else
          @if(!$kegiatanByKategori)
          <div class="flex items-center justify-center h-screen">
            <p class="text-gray-500 text-center">No activities match your search.</p>
          </div>
          @elseif(!$kegiatanByKategori && $kegiatanBySearch)
          <div class="flex items-center justify-center h-screen">
            <p class="text-gray-500 text-center">No activities match your search.</p>
          </div>
          @elseif(!$kegiatanBySearch && $kegiatanByKategori)
          <div class="flex items-center justify-center h-screen">
            <p class="text-gray-500 text-center">No activities match your search.</p>
          </div>
          @endif
          @endif
        </div>
        @else
        <div class="overflow-y-auto max-h-[75vh]">
          @if($kegiatans->isNotEmpty())
          <?php $no = 1 ?>
          @foreach($kegiatans as $kegiatan)
          <div id="volunteerCard"
            class="volunteerCard flex p-2 gap-x-4 border-b hover:bg-button_hover2 transition duration-100"
            data-id-kegiatan="{{ $kegiatan->id_kegiatan }}" data-nama-kegiatan="{{ $kegiatan->nama_kegiatan }}"
            data-nama-mitra="{{ $kegiatan->mitra->nama_mitra }}" data-lokasi-kegiatan="{{ $kegiatan->lokasi_kegiatan }}"
            data-logo="{{ asset('storage/logo/'.$kegiatan->mitra->logo) }}"
            data-sistem-kegiatan="{{ $kegiatan->sistem_kegiatan}}" {{-- data-sisa-hari="{{ $kegiatan->sisa_hari }}" --}}
            data-pendaftar-count="{{ $kegiatan->pendaftars_count}} applied" data-deskripsi="{{ $kegiatan->deskripsi}}"
            data-nama-kriteria="{{ implode(',', $kegiatan->kriterias->pluck('nama_kriteria')->toArray()) }}"
            data-nama-benefit="{{ implode(',', $kegiatan->benefits->pluck('nama_benefit')->toArray()) }}"
            data-sisa-hari="
                   @if($kegiatan->sisa_hari > 0)
                      {{ $kegiatan->sisa_hari }} days left
                  @else
                      Closed
                  @endif
                  " data-button="{{ $kegiatan->sisa_hari > 0 ? 'Apply' : 'Closed' }}">
            @if(!empty($kegiatan->mitra->logo))
            <div class="w-20">
              <img src="{{asset('storage/logo/'.$kegiatan->mitra->logo)}}" alt=""
                class="w-12 h-12 object-cover rounded-full outline outline-1 outline-slate-200 lg:w-14 lg:h-14" />
            </div>
            @else
            <div class="w-20 relative group">
              <img class="w-12 h-12 object-cover rounded-full outline outline-1 outline-slate-200 lg:w-14 lg:h-14"
                src="{{ asset('img/default-profile.png') }}" alt="Avatar" />
              <div
                class="absolute top-0 right-3 bg-red-600 text-white rounded-full p-1 h-5 w-5 flex items-center justify-center text-xs">
                !
              </div>
              <div
                class="absolute right-10 top-8 mb-2 w-64 px-2 py-1 text-xs text-white bg-rose-500 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none lg:text-sm">
                You have not uploaded a profile picture
              </div>
            </div>
            @endif
            <div class="w-full">
              <div class="flex flex-col gap-1">
                <p class="font-semibold line-clamp-1">
                  {{ $kegiatan->nama_kegiatan }}
                </p>
                <p class="text-sm text-gray-800 line-clamp-1">
                  {{ $kegiatan->mitra->nama_mitra }}
                </p>
                <p class="text-sm text-gray-800 line-clamp-1">{{ $kegiatan->lokasi_kegiatan }}</p>
                <p class="text-sm text-gray-800">{{ $kegiatan->sistem_kegiatan}}</p>
              </div>
            </div>
          </div>
          @endforeach
          @else
          @if(!$kegiatanByKategori)
          <div class="flex items-center justify-center h-screen">
            <p class="text-gray-500 text-center">No activities match your search.</p>
          </div>
          @elseif(!$kegiatanByKategori && $kegiatanBySearch)
          <div class="flex items-center justify-center h-screen">
            <p class="text-gray-500 text-center">No activities match your search.</p>
          </div>
          @elseif(!$kegiatanBySearch && $kegiatanByKategori)
          <div class="flex items-center justify-center h-screen">
            <p class="text-gray-500 text-center">No activities match your search.</p>
          </div>
          @endif
          @endif
        </div>
        @endif
      </div>
      <!-- Detail Volunteer -->
      <div id="detailVolunteer"
        class="fixed top-0 left-0 w-full h-screen bg-white z-50 transform transition-transform duration-500 ease-in-out overflow-y-auto no-scrollbar lg:static lg:translate-y-0 lg:w-2/3 lg:h-auto lg:z-auto lg:transition-none lg:rounded-lg lg:shadow-sm lg:p-8">
        <div class="p-4 lg:hidden">
          <button id="backBtn">
            <svg class="w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 386.242 386.242" xml:space="preserve">
              <path
                d="M374.212 182.3H39.432l100.152-99.767c4.704-4.704 4.704-12.319 0-17.011-4.704-4.704-12.319-4.704-17.011 0L3.474 184.61c-4.632 4.632-4.632 12.379 0 17.011l119.1 119.1c4.704 4.704 12.319 4.704 17.011 0 4.704-4.704 4.704-12.319 0-17.011L39.432 206.36h334.779c6.641 0 12.03-5.39 12.03-12.03s-5.389-12.03-12.029-12.03z" />
            </svg>
          </button>
        </div>
        <div class="flex items-center justify-center h-screen default-message">
          <p class="text-gray-500 text-center">Detail Activity Here</p>
        </div>
        <div class="detail-content hidden">
          @if(isset($kegiatan))
          <div class="px-8 md:p-2">
            <div class="flex items-center gap-x-4">
              <div class="max-w-16">
                <img src="" alt="logo mitra" class="w-full rounded-full" />
              </div>
              <span class="namaMitra lock"></span>
            </div>
            <div class="mt-4 pb-4">
              <h1 class="namaKegiatan text-lg font-semibold"></h1>
              <p class="lokasiKegiatan mt-2 text-gray-500 text-sm"></p>
            </div>
            <div class="flex gap-x-2">
              <svg class="w-6 fill-slate-500" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M27 29H4a2 2 0 0 1-2-2V15s5.221 2.685 10 3.784V20a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-1.216C23.778 17.685 29 15 29 15v12a2 2 0 0 1-2 2zM17 17a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1h3zm2 0a1 1 0 0 0-1-1h-5a1 1 0 0 0-1 1v.896C7.221 16.764 2 14 2 14v-4a2 2 0 0 1 2-2h6V6a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v2h6a2 2 0 0 1 2 2v4s-5.222 2.764-10 3.896V17zm0-10a1 1 0 0 0-1-1h-5a1 1 0 0 0-1 1v1h7V7z" />
              </svg>
              <div class="flex items-center gap-x-1">
                <span class="sistemKegiatan block h-auto text-sm bg-sky-200 px-2 text-gray-800 rounded-md"></span>
                <span class="block h-auto">&middot;</span>
                <span class="sisaHari block h-auto text-sm bg-sky-200 px-2 text-gray-800 rounded-md"></span>
                <span class="block h-auto">&middot;</span>
                <span class="pendaftarCount block h-auto text-sm bg-sky-200 px-2 text-gray-800 rounded-md"></span>
              </div>
            </div>
            <div class="mt-4 gap-2 border-b pb-4">
              <button id="applyBtn"
                class="button px-6 py-2 bg-cyan-500 hover:bg-button_hover rounded-lg text-sm text-white">
              </button>
              <button class="px-6 py-2 border border-sky-300 hover:bg-sky-300 rounded-lg text-sm">
                Save
              </button>
            </div>
            <div class="mt-4 md:w-2/3">
              <h2 class="font-semibold">Description</h2>
              <p class="deskripsi text-sm text-justify">
              </p>
              <div class="mt-4">
                <h2 class="font-semibold">Requirement</h2>
                <div class="kriteriaContainer flex gap-2 flex-wrap mt-2">
                  <span class="namaKriteria px-4 py-1 bg-sky-200 text-sm rounded-lg"></span>
                  <span class="namaKriteria px-4 py-1 bg-red-200 text-sm rounded-lg"></span>
                </div>
              </div>
              <div class="mt-4">
                <h2 class="font-semibold">Benefits</h2>
                <div class="benefitContainer flex gap-2 flex-wrap mt-2">
                  <span class="namaBenefit px-4 py-1 bg-sky-200 text-sm rounded-lg"></span>
                  <span class="namaBenefit px-4 py-1 bg-red-200 text-sm rounded-lg"></span>
                </div>
              </div>
            </div>
          </div>
          @else
          <div class="flex items-center justify-center h-screen">
            <p class="text-gray-500 text-center">No details available.</p>
          </div>
          @endif
        </div>
      </div>
    </div>

    <!-- Modal for apply Volunteer -->
    @if(auth()->check())
    @php
    $user = auth()->user();
    @endphp
    <div id="applyMdl" data-id-user="{{ auth()->user()->id }}"
      class="fixed inset-0 bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
      <!-- Modal Content -->
      <div
        class="bg-white rounded-lg shadow-lg w-4/5 p-6 transform scale-95 transition-transform duration-300 md:w-1/3">
        <div class="flex justify-between items-center mb-4">
          <label for="motivation" class="font-semibold">Your Motivation</label>
          <button id="closeApplyMdl" class="text-gray-500 hover:text-gray-700 text-xl">
            &times;
          </button>
        </div>
        <form action="" method="POST" id="registrationForm" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id_kegiatan" value=""></input>
          <textarea id="motivation" rows="4" name="motivasi"
            class="block mb-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300"
            placeholder="Write your motivation ..."></textarea>
          @if($user->cv)
          <p>CV Anda telah diunggah. <a href="{{ asset('storage/cv/' . auth()->user()->cv) }}" target="_blank">Unduh
              CV</a></p>
          @else
          <label for="cv" class="font-semibold">Upload Your CV</label>
          <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
            <div class="flex flex-col items-center">
              <svg class="w-20 fill-gray-300" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                  <g>
                    <path class="st0"
                      d="M378.413,0H208.297h-13.182L185.8,9.314L57.02,138.102l-9.314,9.314v13.176v265.514 c0,47.36,38.528,85.895,85.896,85.895h244.811c47.353,0,85.881-38.535,85.881-85.895V85.896C464.294,38.528,425.766,0,378.413,0z M432.497,426.105c0,29.877-24.214,54.091-54.084,54.091H133.602c-29.884,0-54.098-24.214-54.098-54.091V160.591h83.716 c24.885,0,45.077-20.178,45.077-45.07V31.804h170.116c29.87,0,54.084,24.214,54.084,54.092V426.105z">
                    </path>
                    <path class="st0"
                      d="M171.947,252.785h-28.529c-5.432,0-8.686,3.533-8.686,8.825v73.754c0,6.388,4.204,10.599,10.041,10.599 c5.711,0,9.914-4.21,9.914-10.599v-22.406c0-0.545,0.279-0.817,0.824-0.817h16.436c20.095,0,32.188-12.226,32.188-29.612 C204.136,264.871,192.182,252.785,171.947,252.785z M170.719,294.888h-15.208c-0.545,0-0.824-0.272-0.824-0.81v-23.23 c0-0.545,0.279-0.816,0.824-0.816h15.208c8.42,0,13.447,5.027,13.447,12.498C184.167,290,179.139,294.888,170.719,294.888z">
                    </path>
                    <path class="st0"
                      d="M250.191,252.785h-21.868c-5.432,0-8.686,3.533-8.686,8.825v74.843c0,5.3,3.253,8.693,8.686,8.693h21.868 c19.69,0,31.923-6.249,36.81-21.324c1.76-5.3,2.723-11.681,2.723-24.857c0-13.175-0.964-19.557-2.723-24.856 C282.113,259.034,269.881,252.785,250.191,252.785z M267.856,316.896c-2.318,7.331-8.965,10.459-18.21,10.459h-9.23 c-0.545,0-0.824-0.272-0.824-0.816v-55.146c0-0.545,0.279-0.817,0.824-0.817h9.23c9.245,0,15.892,3.128,18.21,10.46 c0.95,3.128,1.62,8.56,1.62,17.93C269.476,308.336,268.805,313.768,267.856,316.896z">
                    </path>
                    <path class="st0"
                      d="M361.167,252.785h-44.812c-5.432,0-8.7,3.533-8.7,8.825v73.754c0,6.388,4.218,10.599,10.055,10.599 c5.697,0,9.914-4.21,9.914-10.599v-26.351c0-0.538,0.265-0.81,0.81-0.81h26.086c5.837,0,9.23-3.532,9.23-8.56 c0-5.028-3.393-8.553-9.23-8.553h-26.086c-0.545,0-0.81-0.272-0.81-0.817v-19.425c0-0.545,0.265-0.816,0.81-0.816h32.733 c5.572,0,9.245-3.666,9.245-8.553C370.411,256.45,366.738,252.785,361.167,252.785z">
                    </path>
                  </g>
                </g>
              </svg>
              <div class="mt-4 text-sm lg:flex leading-6 text-gray-600">
                <label for="cv"
                  class="relative cursor-pointer rounded-md bg-white font-semibold text-sky-600 hover:text-indigo-500">
                  <input type="file" id="cv" name="cv" />
                </label>
              </div>
            </div>
          </div>
          @endif
          <div class="flex justify-end mt-2">
            <button type="submit" id="submitBtn" class="px-4 py-2 bg-sky-400 rounded-lg text-white hover:bg-sky-600">
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
    @else
    <div id="applyMdl"
      class="fixed inset-0 bg-gray-800 bg-opacity-50 z-50 flex items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
      <!-- Modal Content -->
      <div
        class="bg-white rounded-lg shadow-lg w-4/5 p-6 transform scale-95 transition-transform duration-300 md:w-1/3">
        <div class="flex justify-between items-center mb-4">
          <label for="motivation" class="font-semibold">Apply Volunteer</label>
          <button id="closeApplyMdl" class="text-gray-500 hover:text-gray-700 text-xl">
            &times;
          </button>
        </div>

        <div class="flex items-center justify-center h-5/6">
          <p class="text-gray-500 text-center">Login first</p>
        </div>
      </div>
    </div>
    @endif
    <!-- Modal for appy Volunteer End -->

    <!-- Modal Notification  -->
    {{-- @if(!$user->cv)
    <div id="notification"
      class="fixed bottom-4 right-4 bg-sky-400 text-white text-sm px-4 py-2 rounded-lg shadow-lg opacity-0 transition-opacity duration-300 pointer-events-none z-50">
      CV has been submitted
    </div>
    @endif --}}
    <!-- Modal Notification End -->
  </section>
  <!-- All volunteer end -->
</main>
@include('user.layout.templates.footer')