@include('user.layout.templates.header')
@include('user.layout.templates.navbar')
<main class="mt-20">
  <!-- Hero section start -->
  <section class="lg:h-[calc(100vh-80px)] overflow-hidden">
    <div class="lg:mt-8">
      <h1
        class="mx-auto pt-4 max-w-md text-center text-3xl font-medium sm:text-4xl sm:max-w-md md:text-4xl md:max-w-xl lg:text-5xl lg:max-w-3xl">
        Make
        <span class="bg-gradient-to-r from-cyan-500 to-blue-500 bg-clip-text text-transparent">Meaningful</span>
        Connections Through Volunteering
      </h1>
      <span class="block mx-auto mt-4 max-w-xs text-xs text-center sm:text-sm md:max-w-sm md:text-base lg:text-lg">Find
        Your Passion – Join Exciting Volunteer Opportunities on
        VolHub!</span>
    </div>
    <div class="flex justify-center mt-6 relative">
      <button class="p-3 absolute z-0 rounded-lg text-white text-sm bg-cyan-500 hover:bg-button_hover">
        Get Started
      </button>
    </div>
    <div class="mx-auto w-full">
      <img src="{{asset('img/hero image/hero-image.png') }}" alt="Hero Image"
        class="z-0 w-full mx-auto sm:w-4/5 md:w-8/12 lg:w-3/6 lg:-mt-12" />
    </div>

    <div class="pattern2"></div>
  </section>
  <!-- Hero section end -->

  <!-- Promotion section start -->
  <section class="bg-white w-full lg:mt-8">
    <div class="pt-4 md:flex lg:w-4/5 lg:mx-auto lg:justify-evenly">
      <div class="md:max-w-md lg:max-w-xl">
        <div class="p-4">
          <p class="text-3xl inline leading-relaxed sm:text-4xl sm:leading-relaxed md:text-2xl lg:text-4xl">
            Keep registration simple and efficient with
          </p>
          <div class="inline align-baseline">
            <svg class="w-8 inline -mt-2 lg:w-10" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true" class="iconify iconify--twemoji">
              <path fill="#FFAC33"
                d="m34.347 16.893-8.899-3.294-3.323-10.891a1 1 0 0 0-1.912 0l-3.322 10.891-8.9 3.294a1 1 0 0 0 0 1.876l8.895 3.293 3.324 11.223a1 1 0 0 0 1.918-.001l3.324-11.223 8.896-3.293a.998.998 0 0 0-.001-1.875z" />
              <path fill="#FFCC4D"
                d="m14.347 27.894-2.314-.856-.9-3.3a.998.998 0 0 0-1.929-.001l-.9 3.3-2.313.856a1 1 0 0 0 0 1.876l2.301.853.907 3.622a1 1 0 0 0 1.94-.001l.907-3.622 2.301-.853a.997.997 0 0 0 0-1.874zM10.009 6.231l-2.364-.875-.876-2.365a.999.999 0 0 0-1.876 0l-.875 2.365-2.365.875a1 1 0 0 0 0 1.876l2.365.875.875 2.365a1 1 0 0 0 1.876 0l.875-2.365 2.365-.875a1 1 0 0 0 0-1.876z" />
            </svg>
            <h2
              class="text-3xl inline font-bold bg-gradient-to-r from-cyan-500 to-blue-500 bg-clip-text text-transparent sm:text-4xl md:text-3xl lg:text-5xl lg:font-semibold">
              VolHub
            </h2>
            <svg class="w-8 inline -mt-2 lg:w-10" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"
              aria-hidden="true" class="iconify iconify--twemoji">
              <path fill="#FFAC33"
                d="m34.347 16.893-8.899-3.294-3.323-10.891a1 1 0 0 0-1.912 0l-3.322 10.891-8.9 3.294a1 1 0 0 0 0 1.876l8.895 3.293 3.324 11.223a1 1 0 0 0 1.918-.001l3.324-11.223 8.896-3.293a.998.998 0 0 0-.001-1.875z" />
              <path fill="#FFCC4D"
                d="m14.347 27.894-2.314-.856-.9-3.3a.998.998 0 0 0-1.929-.001l-.9 3.3-2.313.856a1 1 0 0 0 0 1.876l2.301.853.907 3.622a1 1 0 0 0 1.94-.001l.907-3.622 2.301-.853a.997.997 0 0 0 0-1.874zM10.009 6.231l-2.364-.875-.876-2.365a.999.999 0 0 0-1.876 0l-.875 2.365-2.365.875a1 1 0 0 0 0 1.876l2.365.875.875 2.365a1 1 0 0 0 1.876 0l.875-2.365 2.365-.875a1 1 0 0 0 0-1.876z" />
            </svg>
          </div>
        </div>

        <div class="px-4 py-4 flex flex-col gap-6 md:max-w-sm md:pl-12 lg:gap-10 lg:ml-5">
          <!-- Item -->
          <div class="flex items-center gap-8">
            <div class="">
              <svg class="w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve">
                <path style="fill: #e8f5f7"
                  d="M256 110.659v273.342L89.124 413.52 76.3 415.778V174.216l95.576-33.795 83.076-29.358z" />
                <path style="fill: #c3e4e6" d="M435.7 174.216v241.562L256 384.001V110.659l1.048.404z" />
                <path style="fill: #3fbee1"
                  d="M256 239.626V481.19l-153.487-54.281-26.213-9.276V176.071l23.229 8.227 21.051 7.42 40.57 14.357 88.64 31.374 4.597 1.533.887.323zM435.689 176.051l-179.678 63.563v241.558l179.678-63.564zM512 62.75l-7.178 10.888-66.944 101.787-2.178-.725L256 112.675l1.048-1.612L330.122 0l154.294 53.233zM256 112.675l-86.059 29.682L76.3 174.7l-2.178.725L0 62.75 181.878 0l51.781 78.639 21.293 32.424z" />
                <path style="opacity: 0.1; fill: #0c1531"
                  d="m277.777 243.095-9.275 14.115-12.421 19.034-.081.081-66.863 102.351L76.3 339.801v-25.326L20.809 295.36l7.42-11.292L76.3 210.914l5.081-7.663 22.987 4.679 145.422 29.519 5.968 1.211h.323l.322.08 1.371.242z" />
                <path style="opacity: 0.1; fill: #0c1531"
                  d="m234.341 243.09 21.735 33.234 66.901 102.331 112.773-38.889v-25.258l55.546-19.156-55.546-84.472-5.013-7.624-168.479 34.18-5.91 1.185-.272.064z" />
                <path style="fill: #3fbee1"
                  d="m256 238.175-.242.485-.081.08-.403.565-11.776 17.905-61.62 93.721L76.3 314.475 20.809 295.36l-2.903-.968L0 288.181l74.122-112.675 2.178.727 23.229 8.065 21.212 7.258z" />
                <path style="fill: #48bfde" d="m330.132 350.892 181.866-62.704-74.12-112.692-181.867 62.705z" />
                <path style="opacity: 0.07; fill: #040000"
                  d="m437.877 175.496-2.177.75V174.7l2.178.725 66.944-101.787L512 62.75l-27.584-9.517-30.524-10.531L78.266 418.328l24.247 8.581L256 481.19v-97.189l.011.002v97.168l179.678-63.563v-1.832l.011.002v-75.994l.051-.018v-25.258l55.546-19.155-.015-.023 20.716-7.143z" />
              </svg>
            </div>
            <div class="">
              <h3 class="font-semibold">Effortless</h3>
              <p class="text-sm">
                Discover and join various volunteer programs in one place.
              </p>
            </div>
          </div>
          <!-- Item -->
          <div class="flex items-center gap-8">
            <div class="">
              <svg class="w-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" xml:space="preserve">
                <path style="fill: #6ab5d3"
                  d="M431.953 50.012V461.94c0 27.547-22.512 50.06-50.06 50.06H50.016c-1.526 0-3.053-.076-4.502-.229-1.526-.076-2.976-.305-4.426-.61a10.332 10.332 0 0 1-2.213-.458 45.53 45.53 0 0 1-11.905-4.426c-.076 0-.076-.076-.076-.076-.229-.076-.458-.153-.611-.305a37.156 37.156 0 0 1-4.121-2.519 28.092 28.092 0 0 1-4.502-3.434c-.992-.764-1.908-1.679-2.823-2.595-1.755-1.679-3.358-3.586-4.808-5.571-.458-.61-.916-1.297-1.374-1.908-1.068-1.526-2.061-3.128-2.823-4.731-.763-1.298-1.374-2.671-1.908-4.044a36.558 36.558 0 0 1-1.603-4.35c-.381-.992-.611-1.908-.839-2.976a27.433 27.433 0 0 1-.611-2.671c-.153-.764-.229-1.602-.381-2.366 0-.153-.076-.306-.076-.457-.229-2.061-.381-4.198-.381-6.333V179.36L179.363.028h202.53c5.876 0 11.523.991 16.712 2.975 14.194 4.961 25.412 16.255 30.372 30.372.992 2.443 1.679 4.961 2.137 7.556.305 1.449.458 2.976.611 4.426.152 1.525.228 3.129.228 4.655z" />
                <path style="fill: #4884b9"
                  d="M129.306 179.348c27.523 0 50.042-22.519 50.042-50.042V0L0 179.348h129.306z" />
                <path style="opacity: 0.06; fill: #040000"
                  d="M431.953 50.012V461.94c0 27.547-22.512 50.06-50.06 50.06H50.016c-1.526 0-3.053-.076-4.502-.229-1.526-.076-2.976-.305-4.426-.61a10.332 10.332 0 0 1-2.213-.458 45.53 45.53 0 0 1-11.905-4.426c-.076 0-.076-.076-.076-.076-.229-.076-.458-.153-.611-.305a37.156 37.156 0 0 1-4.121-2.519 28.092 28.092 0 0 1-4.502-3.434c-.992-.764-1.908-1.679-2.823-2.595-1.755-1.679-3.358-3.586-4.808-5.571-.458-.61-.916-1.297-1.374-1.908-1.068-1.526-2.061-3.128-2.823-4.731-.763-1.298-1.374-2.671-1.908-4.044a36.558 36.558 0 0 1-1.603-4.35c-.381-.992-.611-1.908-.839-2.976a27.433 27.433 0 0 1-.611-2.671l204.362-204.362 11.752-11.676 9.92-9.996h.076L431.114 40.931c.305 1.449.458 2.976.611 4.426.152 1.525.228 3.129.228 4.655z" />
                <path style="opacity: 0.1; fill: #040000"
                  d="M431.495 447.898v11.294c0 27.473-22.512 49.984-49.984 49.984H49.634c-10.989 0-21.215-3.586-29.456-9.692-4.273-3.053-7.937-6.792-11.065-11.065-3.739-5.19-6.563-11.066-8.089-17.476-.229-.688-.381-1.449-.534-2.213 0-.153-.076-.306-.076-.457l2.518-2.441.916 2.289c7.86 17.475 25.488 29.838 45.787 29.838h331.878c27.471 0 49.982-22.512 49.982-50.061z" />
              </svg>
            </div>
            <div class="">
              <h3 class="font-semibold">Simple</h3>
              <p class="text-sm">
                The registration process is simple and doesn't require many
                steps.
              </p>
            </div>
          </div>
          <!-- Item -->
          <div class="flex items-center gap-8">
            <div class="">
              <svg class="w-10" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                class="iconify iconify--twemoji">
                <ellipse transform="rotate(-78 23.001 8)" fill="#55ACEE" cx="23" cy="8" rx="8" ry="6.75" />
                <path fill="#269"
                  d="M9.724 14.687v1.579c-2.414.525-5.381 1.851-5.829 3.741C2.493 25.919 2.87 35.081 2.87 35.212v.134c0 .654.663.654 1.316.654h16.097c.653 0 1.315 0 1.315-.654V20.007c0-1.719-1.413-3.438-4.632-3.834v-1.486H9.724z" />
                <path fill="#55ACEE"
                  d="M26.276 13.303v2.963c2.414.525 5.381 1.851 5.829 3.741 1.401 5.913 1.025 15.075 1.025 15.205v.134c0 .654-.663.654-1.316.654H15.717c-.653 0-1.315 0-1.315-.654V20.007c0-1.719 1.413-3.438 4.632-3.834v-1.486l7.242-1.384z" />
                <ellipse transform="rotate(-12 12.992 8)" fill="#269" cx="12.992" cy="8" rx="6.75" ry="8" />
                <path fill="#55ACEE"
                  d="M19.092 16.088c-1.31.381-3.441.546-5.898-.382-2.593-.98-4.978-1.944-5.908-2.268-.846-.295-3.005-.033-3.486.848-.481.881-.753 2.485.437 3.659s7.458 3.491 9.23 4.533c.928.546.874 3.823.928 6.499.083 4.043 7.383-13.67 4.697-12.889z" />
                <path fill="#269"
                  d="M12.233 25.283c1.331.298 3.604.811 5.999-.269 2.527-1.14 4.712-2.732 5.619-3.113.826-.347 2.571-.683 3.532.629.594.81.907 2.434-.207 3.679-1.115 1.246-5.497 3.919-8.739 4.702-2.749.664-6.967.6-8.313-.793-2.101-2.175.281-5.245 2.109-4.835zm12.758-8.048c0-1.952 1.724-3.016 3.739-3.797.835-.324 3.005-.033 3.486.848.481.881.753 2.485-.437 3.659s-6.788 2.294-6.788-.71z" />
              </svg>
            </div>
            <div class="">
              <h3 class="font-semibold">Impactful</h3>
              <p class="text-sm">
                Make a positive impact on those around you.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="flex justify-center">
        <div class="mt-8 mx-6 px-2 relative bg-sky-300 rounded-lg lg:md-0">
          <img src="{{ asset('img/about-image/about-image.jpg') }}" alt="About Image"
            class="max-w-64 sm:max-w-80 md:max-w-64 lg:max-w-96 rounded-lg -rotate-3 hover:rotate-0 hover:scale-110 transition-transform duration-500" />
          <img src="{{ asset('img/about-image/about-small-card1.png') }}" alt="Small About Image Card"
            class="w-2/4 absolute top-1/3 left-2/3 border border-sky-300 shadow-xl rounded-lg hover:scale-105 transition-transform duration-500" />
          <img src="{{ asset('img/about-image/about-small-card2.png') }}" alt="Small About Image Card"
            class="w-2/4 absolute bottom-1/4 right-2/3 border border-sky-300 shadow-xl rounded-lg hover:scale-105 transition-transform duration-500" />
        </div>
      </div>
    </div>
  </section>
  <!-- Promotion section end -->

  <!-- Volunteer activity section start -->
  <section class="mt-16 px-4 mx-auto lg:w-11/12">
    <div class="flex justify-between">
      <span class="text-xl max-w-52 sm:max-w-60 sm:text-2xl lg:text-3xl lg:max-w-72">
        Discover
        <span class="relative inline-block">
          <span class="bg-sky-300 absolute inset-x-0 bottom-0 h-1/2"></span>
          <span class="relative font-semibold">Volunteer</span>
        </span>
        Opportunities
      </span>
      <a href="{{route('daftar.kegiatan')}}" class="h-8 text-md flex items-center md:text-lg lg:text-xl">
        See All<svg class="w-6 md:w-8 lg:w-10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
          <g id="SVGRepo_iconCarrier">
            <path d="M7 17L17 7M17 7H8M17 7V16" stroke="#000000" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round"></path>
          </g>
        </svg>
      </a>
    </div>
    <!-- Card Container -->
    <div class="mt-6 flex flex-wrap flex-1 justify-center md:flex-nowrap md:gap-2 lg:gap-6">
      <!-- Card Items -->
      <?php $no = 1 ?>
      @foreach($kegiatans as $kegiatan)
      <div class="w-full mt-4 rounded-lg p-4 max-w-lg shadow-md border-2 hover:border-2 hover:border-sky-300 md:w-1/3">
        <div class="flex items-start justify-between">
          <div class="flex gap-4">
            @if(!empty($kegiatan->mitra->logo))
            <img src="{{asset('storage/logo/'.$kegiatan->mitra->logo)}}" alt="Logo"
              class="w-14 h-14 object-cover rounded-full" />
            @else
            <img class="w-14 h-14 object-cover rounded-full" src="{{ asset('img/default-profile.png') }}"
              alt="Logo Mitra" />
            @endif
            <div class="w-full">
              <h2 class="line-clamp-1 font-semibold">
                {{ $kegiatan->nama_kegiatan }}
              </h2>
              <span class="text-sm">{{ $kegiatan->mitra->nama_mitra }}</span>
            </div>
          </div>
          <svg class="w-7" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <path clip-rule="evenodd"
                d="M5 2.92445C5 1.8616 5.8616 1 6.92444 1H20.3956C21.4584 1 22.32 1.8616 22.32 2.92444V25.0556C22.32 26.6414 20.5096 27.5466 19.2409 26.5951L13.66 22.4094L8.07911 26.5951C6.81045 27.5466 5 26.6414 5 25.0556V2.92445ZM20.3956 3.50178C20.3956 3.18293 20.1371 2.92444 19.8182 2.92444L7.50178 2.92445C7.18293 2.92445 6.92444 3.18293 6.92444 3.50178V24.4782C6.92444 24.7161 7.19601 24.8519 7.38631 24.7092L12.5053 20.8699C13.1896 20.3567 14.1304 20.3567 14.8147 20.8699L19.9337 24.7092C20.124 24.8519 20.3956 24.7161 20.3956 24.4782V3.50178Z"
                fill="#000000" fill-rule="evenodd"></path>
            </g>
          </svg>
        </div>
        <div class="description mt-4">
          <p class="h-16 line-clamp-3 text-sm">
            {{ $kegiatan->deskripsi }}
          </p>
        </div>
        <!-- Icon Container -->
        <div class="mt-4 mx-auto w-fit grid grid-cols-2 gap-2 gap-x-2 sm:grid-cols-4 md:grid-cols-2 lg:grid-cols-4">
          <!-- Icon Items -->
          <div class="flex items-center gap-2">
            <svg class="w-5 flex-shrink-0" fill="#64748b" viewBox="0 0 32 32" version="1.1"
              xmlns="http://www.w3.org/2000/svg">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path
                  d="M16.114-0.011c-6.559 0-12.114 5.587-12.114 12.204 0 6.93 6.439 14.017 10.77 18.998 0.017 0.020 0.717 0.797 1.579 0.797h0.076c0.863 0 1.558-0.777 1.575-0.797 4.064-4.672 10-12.377 10-18.998 0-6.618-4.333-12.204-11.886-12.204zM16.515 29.849c-0.035 0.035-0.086 0.074-0.131 0.107-0.046-0.032-0.096-0.072-0.133-0.107l-0.523-0.602c-4.106-4.71-9.729-11.161-9.729-17.055 0-5.532 4.632-10.205 10.114-10.205 6.829 0 9.886 5.125 9.886 10.205 0 4.474-3.192 10.416-9.485 17.657zM16.035 6.044c-3.313 0-6 2.686-6 6s2.687 6 6 6 6-2.687 6-6-2.686-6-6-6zM16.035 16.044c-2.206 0-4.046-1.838-4.046-4.044s1.794-4 4-4c2.207 0 4 1.794 4 4 0.001 2.206-1.747 4.044-3.954 4.044z">
                </path>
              </g>
            </svg>
            <div class="max-w-[150px] overflow-hidden text-ellipsis whitespace-nowrap">
              <span class="text-sm text-slate-500 font-semibold">{{$kegiatan->lokasi_kegiatan}}</span>
            </div>
          </div>

          <div class="flex items-center gap-2">
            <svg class="w-5 flex-shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path
                  d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                  stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </g>
            </svg>
            <div class="max-w-[150px] overflow-hidden text-ellipsis whitespace-nowrap">
              <span class="text-sm text-slate-500 font-semibold">{{ $kegiatan->pendaftars_count }} Applied</span>
            </div>
          </div>

          <div class="flex items-center gap-2">
            <svg class="w-5 flex-shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path
                  d="M12 7V12H15M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                  stroke="#64748b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </g>
            </svg>
            <div class="max-w-[150px] overflow-hidden text-ellipsis whitespace-nowrap">
              @if($kegiatan->sisa_hari > 0)
              <span class="text-sm text-slate-500 font-semibold">
                {{ $kegiatan->sisa_hari }} days left
              </span>
              @else
              <span class="text-sm text-slate-500 font-semibold">
                Closed
              </span>
              @endif
            </div>
          </div>

          <div class="flex items-center gap-2">
            <svg class="w-5 flex-shrink-0" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path
                  d="M10.0002 12.25C9.58597 12.25 9.25019 12.5858 9.25019 13C9.25019 13.4142 9.58597 13.75 10.0002 13.75H14.0002C14.4144 13.75 14.7502 13.4142 14.7502 13C14.7502 12.5858 14.4144 12.25 14.0002 12.25H10.0002Z"
                  fill="#64748b"></path>
                <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M7.32033 4.27529C7.65835 2.55091 9.17665 1.25 11.0002 1.25H13.0002C14.8238 1.25 16.3421 2.55092 16.6801 4.2753C19.6252 5.03147 21.7075 7.66894 21.7495 10.7198C21.7502 10.7665 21.7502 10.8178 21.7502 10.9044V13.9829C21.7504 13.994 21.7504 14.0052 21.7502 14.0163V16.375C21.7502 18.8445 20.035 20.9827 17.6244 21.5184C13.9201 22.3415 10.0803 22.3415 6.37602 21.5184C3.96535 20.9827 2.25019 18.8445 2.25019 16.375V14.0163C2.24994 14.0052 2.24994 13.994 2.25019 13.9829V10.9043C2.25019 10.8177 2.25019 10.7664 2.25083 10.7198C2.2929 7.66892 4.37523 5.03144 7.32033 4.27529ZM9.01465 3.94034C9.39359 3.23199 10.1411 2.75 11.0002 2.75H13.0002C13.8594 2.75 14.6068 3.232 14.9858 3.94035C13.0069 3.63773 10.9935 3.63772 9.01465 3.94034ZM20.2502 10.9111V13.5066C14.9716 15.711 9.02878 15.711 3.75019 13.5066V10.9111C3.75019 10.8157 3.7502 10.7755 3.75069 10.7405C3.78387 8.33419 5.4489 6.25854 7.79074 5.70414C7.82473 5.69609 7.86404 5.68733 7.95714 5.66665C8.04138 5.64793 8.08131 5.63905 8.12071 5.63048C10.6771 5.07434 13.3232 5.07434 15.8797 5.63048C15.9191 5.63905 15.959 5.64793 16.0432 5.66665C16.1363 5.68733 16.1756 5.69609 16.2096 5.70414C18.5515 6.25854 20.2165 8.33419 20.2497 10.7405C20.2502 10.7755 20.2502 10.8157 20.2502 10.9111ZM3.75019 16.375V15.123C7.91456 16.7307 12.4332 17.0771 16.7502 16.1622V17C16.7502 17.4142 17.086 17.75 17.5002 17.75C17.9144 17.75 18.2502 17.4142 18.2502 17V15.7911C18.9242 15.5999 19.5916 15.3772 20.2502 15.123V16.375C20.2502 18.1415 19.0233 19.6709 17.299 20.0541C13.809 20.8296 10.1914 20.8296 6.70141 20.0541C4.97705 19.6709 3.75019 18.1415 3.75019 16.375Z"
                  fill="#64748b"></path>
              </g>
            </svg>
            <div class="max-w-[150px] overflow-hidden text-ellipsis whitespace-nowrap">
              <span class="text-sm text-slate-500 font-semibold">Offline</span>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <!-- Closed tag for card items -->



    </div>
  </section>
  <!-- Volunteer activity section end -->
</main>
@include('user.layout.templates.footer')