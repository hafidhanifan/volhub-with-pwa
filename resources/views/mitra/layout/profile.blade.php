@include('mitra.layout.templates.header')
@include('mitra.layout.templates.sidebar')
@include('mitra.layout.templates.overlay')
<section class="w-full">
  <!-- Mobile header -->
  <div class="lg:hidden">
    <button id="toggleSidebar" class="h-14 z-40 p-2">
      <svg class="w-7 stroke-gray-500" viewBox="0 0 24 24">
        <path d="M4 12h16m0 0-4-4m4 4-4 4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    </button>
    <div class="w-full flex flex-col justify-between md:items-center md:flex-row">
      <div class="pl-4 pb-3">
        <h1 class="font-normal text-lg">Edit company profile</h1>
        <p class="text-gray-500 text-sm">Manage your company profile</p>
      </div>
    </div>
  </div>
  {{-- Mobile header end --}}

  {{-- Desktop header start --}}
  <div class="hidden w-full lg:flex justify-between items-center">
    <div class="p-4">
      <h1 class="font-normal text-lg">Edit company profile</h1>
      <p class="text-gray-500 text-sm">Manage your company profile</p>
    </div>
  </div>
  {{-- Desktop header end --}}

  <div class="p-4 h-[calc(100vh-81px)] overflow-y-auto">
    <div class="">
      <span class="block mb-4 text-sm text-gray-500">Company logo / picture</span>
      <div class="flex items-center gap-4">
        @if(!empty($mitra->logo))
        <img class="w-20 h-20 object-cover rounded-full" src="{{ asset('storage/logo/'.$mitra->logo) }}"
          alt="Logo Mitra" />
        @else
        <img class="w-20 h-20 object-cover rounded-full" src="{{ asset('img/default-profile.png') }}"
          alt="Logo Mitra" />
        @endif
        <div class="flex gap-2">
          {{-- Form update logo --}}
          <form id="updateLogoForm" action="{{ route('mitra.edit-foto-profile-action', ['id'=> $mitra->id_mitra]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="logo" id="uploadlogoMitra" class="hidden" accept="image/*">
            <button type="button" id="changeLogoBtn"
              class="w-24 text-sm px-4 py-1 rounded-lg bg-sky-400 hover:bg-sky-500">
              Update
            </button>
          </form>
          <form action="{{ route('mitra.delete-foto-profile-action', ['id'=> $mitra->id_mitra]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-24 text-sm px-4 py-1 rounded-lg bg-rose-400 hover:bg-rose-500">
              Delete
            </button>
          </form>
        </div>
      </div>

      {{-- Preview image before uploading start --}}
      {{-- <div class="mt-4">
        <img id="image-preview" class="max-w-full max-h-96 mx-auto hidden" />
      </div>
      <button type="button" id="crop-button" data-id="{{ auth()->user()->id_mitra }}"
        class="mt-4 px-4 py-2 bg-green-500 text-white rounded hidden">
        Crop & Upload
      </button> --}}
      {{-- Preview image before uploading end --}}
    </div>
    <div>
      <form action="{{ route('mitra.edit-profile-action', ['id' => $mitra->id_mitra]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mt-6 space-y-4 p-2 overflow-y-auto sm:max-w-4xl sm:grid sm:grid-cols-2 sm:gap-6 sm:space-y-0">

          <!-- Email Input -->
          <div class="">
            <label class="block text-sm mb-1 text-gray-500">Email</label>
            <input type="email" id="email" name="email_mitra" value="{{ old('email_mitra', $mitra->email_mitra) }}"
              class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400"
              placeholder="Enter your email" required />
          </div>

          <!-- Name Input -->
          <div class="">
            <label class="block text-sm mb-1 text-gray-500">Company name</label>
            <input type="text" id="name" name="nama_mitra" value="{{ old('nama_mitra', $mitra->nama_mitra) }}"
              class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400"
              placeholder="Enter your full name" required />
          </div>

          <!-- Phone Number Input -->
          <div class="">
            <label class="block text-sm mb-1 text-gray-500">Phone number</label>
            <input type="tel" id="phone" name="nomor_telephone" value="{{ old('nomor_telephone', $mitra->nomor_telephone) }}"
              class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400"
              placeholder="Enter your phone number" required />
          </div>

          <!-- Industri Input -->
          <div class="">
            <label class="block text-sm mb-1 text-gray-500">Industry</label>
            <input type="text" id="phone" name="industri" value="{{ old('industri', $mitra->industri) }}"
              class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400"
              placeholder="Enter industrial type" required />
          </div>

          <div class="">
            <label class="block text-sm mb-1 text-gray-500">Company Size</label>
            <input type="text" id="phone" name="ukuran_perusahaan" value="{{ old('ukuran_perusahaan', $mitra->ukuran_perusahaan) }}"
              class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400"
              placeholder="Enter company size" required />
          </div>

          <div class="">
            <label class="block text-sm mb-1 text-gray-500">Site</label>
            <input type="text" id="phone" name="situs" value="{{ old('situs', $mitra->situs) }}"
              class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400"
              placeholder="Enter company site" required />
          </div>

          <div class="">
            <label class="block text-sm mb-1 text-gray-500">Bio</label>
            <input type="text" id="phone" name="bio" value="{{ old('bio', $mitra->bio) }}"
              class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400"
              placeholder="Enter company bio" required />
          </div>

          <div class="">
            <label class="block text-sm mb-1 text-gray-500">Address</label>
            <input type="text" id="phone" name="alamat" value="{{ old('alamat', $mitra->alamat) }}"
              class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400"
              placeholder="Enter company address" required />
          </div>
        </div>
        <div class="mt-4 p-2 sm:max-w-4xl">
          <label class="block text-sm mb-1 text-gray-500">Description</label>
          <textarea name="deskripsi" id="" cols="30" rows="10" 
            class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400">{{ old('deskripsi', $mitra->deskripsi) }}</textarea>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 p-2 sm:flex sm:justify-end sm:max-w-4xl">
          <button type="submit"
            class="w-full bg-sky-500 text-white py-2 px-4 rounded-lg hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-1 sm:w-24">
            Save
          </button>
        </div>
      </form>
    </div>
  </div>
</section>