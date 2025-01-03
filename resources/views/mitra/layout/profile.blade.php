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

  <div class="p-4">
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
          <form id="update-picture-form" action="{{ route('mitra.edit-foto-profile-action', $mitra->id_mitra) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="profile_picture" id="profile_picture" class="hidden" onchange="this.form.submit()">
            <button type="button" onclick="document.getElementById('profile_picture').click()"
              class="w-24 text-sm px-4 py-1 rounded-lg bg-sky-400 hover:bg-sky-500">
              Update
            </button>
          </form>
          <button class="w-24 text-sm px-4 py-1 rounded-lg bg-rose-400 hover:bg-rose-500">Delete</button>
        </div>
      </div>

      @if (session('success'))
      <p class="text-green-500">{{ session('success') }}</p>
      @endif

      @if (session('error'))
      <p class="text-red-500">{{ session('error') }}</p>
      @endif


      {{-- Preview image before uploading start --}}
      <div class="mt-4">
        <img id="image-preview" class="max-w-full max-h-96 mx-auto hidden" />
      </div>
      <button type="button" id="crop-button" data-id="{{ auth()->user()->id_mitra }}"
        class="mt-4 px-4 py-2 bg-green-500 text-white rounded hidden">
        Crop & Upload
      </button>
      {{-- Preview image before uploading end --}}
    </div>
  </div>
</section>