<header>
  <!-- Navbar -->
  <nav class="bg-white border-b border-gray-200 fixed top-0 left-0 w-full z-50">
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex bg-white justify-between h-20">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center bg-white z-50 cursor-pointer">
          <img src="{{ asset('img/volhub-logo/volhub-navigation-logo.png') }}" alt="Volhub Logo" class="w-16 md:w-20" />
        </a>

        <!-- Navbar untuk layar lebar -->
        @if(auth()->check())
        @php
            $user = auth()->user();
        @endphp
          <div class="hidden md:flex space-x-8 items-center justify-center w-full">
            <a href="{{ route('home') }}" class="px-6 py-2 rounded-md font-normal hover:bg-button_hover">Home</a>
            <a href="{{ route('user.daftarKegiatan', ['id' => $user->id]) }}"
              class="px-6 py-2 rounded-md font-normal hover:bg-button_hover">Volunteer</a>
            <a href="{{ route('partner') }}" class="px-6 py-2 rounded-md font-normal hover:bg-button_hover">Partner</a>
          </div>
        @else
          <div class="hidden md:flex space-x-8 items-center justify-center w-full">
            <a href="{{ route('home') }}" class="px-6 py-2 rounded-md font-normal hover:bg-button_hover">Home</a>
            <a href="{{ route('daftar.kegiatan') }}"
              class="px-6 py-2 rounded-md font-normal hover:bg-button_hover">Volunteer</a>
            <a href="{{ route('partner') }}" class="px-6 py-2 rounded-md font-normal hover:bg-button_hover">Partner</a>
          </div>
        @endif

        <!-- Profile avatar -->
        <div class="flex items-center">
          <button class="relative text-gray-500 focus:outline-none md:hidden" id="mobile-menu-button">
            <!-- Icon Burger untuk Mobile -->
            <svg id="burgerIcon" class="h-6 w-6 absolute transition-transform duration-300 ease-in-out"
              xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>

            <!-- Icon untuk menutup navbar -->
            <svg id="closeIcon"
              class="w-8 fill-gray-500 transition-transform duration-300 ease-in-out transform scale-0"
              viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M6.97 16.47a.75.75 0 1 0 1.06 1.06l-1.06-1.06Zm6.06-3.94a.75.75 0 1 0-1.06-1.06l1.06 1.06Zm-1.06-1.06a.75.75 0 1 0 1.06 1.06l-1.06-1.06Zm6.06-3.94a.75.75 0 0 0-1.06-1.06l1.06 1.06Zm-5 3.94a.75.75 0 1 0-1.06 1.06l1.06-1.06Zm3.94 6.06a.75.75 0 1 0 1.06-1.06l-1.06 1.06Zm-5-5a.75.75 0 1 0 1.06-1.06l-1.06 1.06ZM8.03 6.47a.75.75 0 0 0-1.06 1.06l1.06-1.06Zm0 11.06 5-5-1.06-1.06-5 5 1.06 1.06Zm5-5 5-5-1.06-1.06-5 5 1.06 1.06Zm-1.06 0 5 5 1.06-1.06-5-5-1.06 1.06Zm1.06-1.06-5-5-1.06 1.06 5 5 1.06-1.06Z" />
            </svg>
          </button>
          <!-- Avatar untuk Layar Lebar -->
          <div class="relative hidden md:block w-32">
            <div class="flex justify-center">
              <button id="profile-menu-button"
                class="text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                @if(auth()->check())
                @php
                $user = auth()->user();
                @endphp
                @if(!empty($user->foto_profile))
                <img class="w-12 h-12 object-cover rounded-full"
                  src="{{asset('storage/foto-profile/'.$user->foto_profile)}}" alt="Avatar" />
                @else
                <div class="relative group">
                  <img class="w-10 h-10 object-cover rounded-full" src="{{ asset('img/default-profile.png') }}"
                    alt="Avatar" />
                  <div
                    class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-1 h-5 w-5 flex items-center justify-center text-xs">
                    !
                  </div>
                  <div
                    class="absolute right-10 top-8 mb-2 w-64 px-2 py-1 text-xs text-white bg-rose-500 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none lg:text-sm">
                    You have not uploaded a profile picture
                  </div>
                </div>
                @endif
                @else
                <div class="relative group">
                  <img class="w-10 h-10 object-cover rounded-full" src="{{ asset('img/default-profile.png') }}"
                    alt="Avatar" />
                  <div
                    class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-1 h-5 w-5 flex items-center justify-center text-xs">
                    !
                  </div>
                  <div
                    class="absolute right-10 top-8 mb-2 w-64 px-2 py-1 text-xs text-white bg-rose-500 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none lg:text-sm">
                    You have not uploaded a profile picture
                  </div>
                </div>
                @endif
              </button>
            </div>
            <!-- Profile Dropdown -->
            <div id="profile-dropdown"
              class="hidden absolute right-0 mt-2 w-56 bg-white border border-gray-200 rounded-md shadow-lg z-50">
              @if(auth()->check())
              @php
              $user = auth()->user();
              @endphp
              <div class="px-4 py-2">
                <div class="text-gray-900 font-semibold">{{$user->nama_user}}</div>
                <div class="text-gray-500 text-sm overflow-hidden text-ellipsis whitespace-nowrap">
                  <span>{{$user->email_user}}</span>
                </div>
              </div>
              <div class="border-t border-gray-200"></div>
              <a href="{{ route('user.detail-profile-page', ['id' => $user->id]) }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-button_hover">Profile</a>
              <a href="{{route('user.logout')}}"
                class="block px-4 py-2 text-sm text-red-700 hover:bg-button_alert hover:text-white hover:rounded-b-md">Logout</a>
              @else
              <a href="{{ route('user.login') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-button_hover hover:text-white hover:rounded-t-md">Login
                User</a>
              <a href="{{ route('mitra.login') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-button_hover hover:text-white">Login
                Employer</a>
              <a href="{{ route('api.mitra.login') }}"
                class="block px-4 py-2 text-sm text-gray-700 hover:bg-button_hover hover:text-white hover:rounded-b-md">Login
                API
                Employer</a>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu"
      class="-z-10 absolute top-20 left-0 w-full bg-white shadow-lg transform -translate-y-[calc(100%+5rem)] opacity-0 transition-all duration-300 md:hidden">
      @if(auth()->check())
      @php
          $user = auth()->user();
      @endphp
      <div class="p-3">
        <div class="flex items-center mb-4">
          @if(!empty($user->foto_profile))
          <img class="h-10 w-10 rounded-full" src="{{asset('storage/foto-profile/'.$user->foto_profile)}}"
            alt="Avatar" />
          @else
          <img class="h-10 w-10 rounded-full" src="{{asset('img/logo-user.png')}}" alt="Avatar" />
          @endif
          <div class="ml-3">
            <div class="text-base font-medium text-gray-800">
              {{$user->nama_user}}
            </div>
            <div class="text-sm font-light">{{$user->email_user}}</div>
          </div>
        </div>
        <a href="{{ route('user.detail-profile-page', ['id' => $user->id]) }}"
          class="block px-2 py-2 mt-3 mb-1 text-base font-light rounded-lg hover:bg-button_hover">Profile</a>
        <a href="{{route('user.logout')}}"
          class="block px-2 py-2 text-base font-light text-red-600 hover:text-white hover:bg-button_alert rounded-lg">Logout</a>
      </div>
      <div class="border-t border-gray-200"></div>
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <a href="{{ route('home') }}"
          class="block px-3 py-2 text-base font-light rounded-lg hover:bg-button_hover">Home</a>
        <a href="{{ route('user.daftarKegiatan', ['id' => $user->id]) }}"
          class="block px-3 py-2 text-base font-light rounded-lg hover:bg-button_hover">Volunteer</a>
        <a href="#" class="block px-3 py-2 text-base font-light rounded-lg hover:bg-button_hover">Partner</a>
      </div>
  
      @else
      <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <a href="{{ route('home') }}"
          class="block px-3 py-2 text-base font-light rounded-lg hover:bg-button_hover">Home</a>
        <a href="{{ route('daftar.kegiatan') }}"
          class="block px-3 py-2 text-base font-light rounded-lg hover:bg-button_hover">Volunteer</a>
        <a href="#" class="block px-3 py-2 text-base font-light rounded-lg hover:bg-button_hover">Partner</a>
        <a href="{{ route('mitra.login') }}"
          class="block px-3 py-2 text-base font-light rounded-lg hover:bg-button_hover">Login Mitra</a>
        <a href="{{ route('user.login') }}"
          class="block px-3 py-2 text-base font-light rounded-lg hover:bg-button_hover">Login Volunteer</a>
      </div>
      <div class="border-t border-gray-200"></div>
      @endif
    </div>
  </nav>
</header>