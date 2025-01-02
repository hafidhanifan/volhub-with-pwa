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
        <img class="w-20 h-20 object-cover rounded-full" src="{{ asset('img/default-profile.png') }}" alt="Avatar" />
        <div class="flex gap-2">
          <button class="w-24 text-sm px-4 py-1 rounded-lg bg-sky-400 hover:bg-sky-500">Change</button>
          <button class="w-24 text-sm px-4 py-1 rounded-lg bg-rose-400 hover:bg-rose-500">Delete</button>
        </div>
      </div>
    </div>
  </div>
</section>