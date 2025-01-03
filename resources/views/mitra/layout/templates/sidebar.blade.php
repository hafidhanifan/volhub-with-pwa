<!-- Sidebar Start -->
<aside id="sidebar"
  class="w-3/5 h-screen z-20 fixed left-0 top-0 transform -translate-x-full transition-transform duration-300 bg-white md:w-2/6 lg:w-1/4 lg:relative lg:border-r lg:translate-x-0">
  <div class="px-2 py-4 flex items-center gap-3 border-b">
    @if(!empty($mitra->logo))
    <img src="{{ asset('storage/logo/'.$mitra->logo) }}" alt="Logo Mitra" class="w-12 h-12 object-cover rounded-full" />
    @else
    <div class="relative group">
      <img class="w-12 h-12 object-cover rounded-full" src="{{ asset('img/default-profile.png') }}" alt="Avatar" />
      <div
        class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-1 h-5 w-5 flex items-center justify-center text-xs">
        !
      </div>
      <div
        class="absolute left-10 mb-2 w-60 px-2 py-1 text-xs text-white bg-rose-500 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none lg:text-sm">
        You have not uploaded the company logo
      </div>
    </div>
    @endif
    <div>
      <h1 class="text-xl line-clamp-1">{{$mitra->nama_mitra}}</h1>
      <p class="text-gray-500 text-sm">{{$mitra->email_mitra}}</p>
    </div>
  </div>
  <ul class="flex flex-col">
    <li class="py-4 hover:bg-button_hover2">
      <a href="{{ route('mitra.kegiatan', ['id' => $mitra->id_mitra]) }}" class="flex">
        <svg class="w-6 mr-4 ml-2" viewBox="0 0 50 50">
          <path
            d="M46.792 24.23a4.054 4.054 0 0 0-5.689-.14l-7.698 6.84a5.256 5.256 0 0 1 .59 2.43 5.39 5.39 0 0 1-3.48 5.02l-6.469 2.43a1.007 1.007 0 0 1-1.28-.59.983.983 0 0 1 .58-1.28l6.47-2.43a3.38 3.38 0 0 0 2.179-3.15 3.458 3.458 0 0 0-3.36-3.36H10a2 2 0 0 0-2-2h-4A2 2 0 0 0 2 30v16a2 2 0 0 0 2 2h3.999a2 2 0 0 0 2-2h4.049l1.25.51a19.613 19.613 0 0 0 22.626-5.64l9.108-11.01a4.202 4.202 0 0 0-.24-5.63ZM12.998 44h-3V32h3Zm17.42-42a8.591 8.591 0 0 0-5.422 1.908A8.591 8.591 0 0 0 19.574 2a8.688 8.688 0 0 0-8.666 8.69c0 9.142 13.03 16.85 13.584 17.174a1.003 1.003 0 0 0 1.008 0c.555-.324 13.585-8.032 13.585-17.175A8.688 8.688 0 0 0 30.418 2Zm-1.772 18.657a.983.983 0 0 1-.65.223.996.996 0 0 1-.65-1.742c3.7-3.171 5.74-6.172 5.74-8.449A2.682 2.682 0 0 0 30.418 8a1 1 0 0 1 0-2 4.683 4.683 0 0 1 4.667 4.69c0 3.678-3.501 7.45-6.439 9.967Z" />
        </svg>Volunteer</a>
    </li>
    <li class="py-4 hover:bg-button_hover2">
      <a href="{{ route('mitra.pendaftar', ['id' => $mitra->id_mitra]) }}" class="flex">
        <svg class="w-6 mr-4 ml-2" viewBox="0 0 28 28">
          <path
            d="M17.75 18c.966 0 1.75.784 1.75 1.75v2.002l-.008.108c-.31 2.127-2.22 3.149-5.425 3.149-3.193 0-5.134-1.01-5.553-3.112L8.5 21.75v-2c0-.966.784-1.75 1.75-1.75h7.5Zm.494-6h6.006c.966 0 1.75.784 1.75 1.75v2.002l-.008.108c-.31 2.127-2.22 3.149-5.425 3.149l-.168-.002a2.752 2.752 0 0 0-2.47-2.001L17.75 17h-.922a4.491 4.491 0 0 0 1.672-3.5c0-.526-.09-1.03-.256-1.5ZM3.75 12h6.006c-.166.47-.256.974-.256 1.5 0 1.33.578 2.527 1.496 3.35l.176.15h-.922c-1.262 0-2.326.85-2.65 2.01l-.033-.001c-3.193 0-5.134-1.01-5.553-3.112L2 15.75v-2c0-.966.784-1.75 1.75-1.75ZM14 10a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7Zm6.5-6a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7Zm-13 0a3.5 3.5 0 1 1 0 7 3.5 3.5 0 0 1 0-7Z"
            fill="#212121" fill-rule="nonzero" />
        </svg>Registrant</a>
    </li>
    <li class="py-4 hover:bg-button_hover2">
      <a href="#" class="flex"><svg class="w-6 mr-4 ml-2" viewBox="0 0 24 24" fill="none">
          <path
            d="M3 9h18M7 3v2m10-2v2M6 12h2m3 0h2m3 0h2M6 15h2m3 0h2m3 0h2M6 18h2m3 0h2m3 0h2M6.2 21h11.6c1.12 0 1.68 0 2.108-.218a2 2 0 0 0 .874-.874C21 19.48 21 18.92 21 17.8V8.2c0-1.12 0-1.68-.218-2.108a2 2 0 0 0-.874-.874C19.48 5 18.92 5 17.8 5H6.2c-1.12 0-1.68 0-2.108.218a2 2 0 0 0-.874.874C3 6.52 3 7.08 3 8.2v9.6c0 1.12 0 1.68.218 2.108a2 2 0 0 0 .874.874C4.52 21 5.08 21 6.2 21Z"
            stroke="#000" stroke-width="2" stroke-linecap="round" />
        </svg>Schedule</a>
    </li>
    <li class="py-4 hover:bg-button_hover2">
      <a href="{{ route('mitra.edit-profile-page', ['id' => $mitra->id_mitra]) }}" class="flex"><svg
          class="w-6 mr-4 ml-2" viewBox="0 0 100 100" xml:space="preserve">
          <path
            d="M80 71.2V74c0 3.3-2.7 6-6 6H26c-3.3 0-6-2.7-6-6v-2.8c0-7.3 8.5-11.7 16.5-15.2.3-.1.5-.2.8-.4.6-.3 1.3-.3 1.9.1C42.4 57.8 46.1 59 50 59c3.9 0 7.6-1.2 10.8-3.2.6-.4 1.3-.4 1.9-.1.3.1.5.2.8.4 8 3.4 16.5 7.8 16.5 15.1z" />
          <ellipse cx="50" cy="36.5" rx="14.9" ry="16.5" />
        </svg>Profile</a>
    </li>
    <li class="py-4 hover:bg-button_hover2">
      <a href="{{ route('mitra.change-password-page', ['id' => $mitra->id_mitra]) }}" class="flex"><svg version="1.0"
          class="w-6 mr-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" xml:space="preserve">
          <path fill="#231F20"
            d="M52 24h-4v-8c0-8.836-7.164-16-16-16S16 7.164 16 16v8h-4c-2.211 0-4 1.789-4 4v32c0 2.211 1.789 4 4 4h40c2.211 0 4-1.789 4-4V28c0-2.211-1.789-4-4-4zM32 48c-2.211 0-4-1.789-4-4s1.789-4 4-4 4 1.789 4 4-1.789 4-4 4zm8-24H24v-8a8 8 0 0 1 16 0v8z" />
        </svg>Change Password</a>
    </li>
    <li class="py-4 hover:bg-rose-200">
      <a href="{{ route('mitra.logout') }}" class="flex"><svg class="w-6 mr-4 ml-2" viewBox="0 0 24 24" fill="none"
          xmlns="http://www.w3.org/2000/svg">
          <g fill="#000000">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M16.125 12a.75.75 0 0 0-.75-.75H4.402l1.961-1.68a.75.75 0 1 0-.976-1.14l-3.5 3a.75.75 0 0 0 0 1.14l3.5 3a.75.75 0 1 0 .976-1.14l-1.96-1.68h10.972a.75.75 0 0 0 .75-.75Z" />
            <path
              d="M9.375 8c0 .702 0 1.053.169 1.306a1 1 0 0 0 .275.275c.253.169.604.169 1.306.169h4.25a2.25 2.25 0 0 1 0 4.5h-4.25c-.702 0-1.053 0-1.306.168a1 1 0 0 0-.275.276c-.169.253-.169.604-.169 1.306 0 2.828 0 4.243.879 5.121.878.879 2.292.879 5.12.879h1c2.83 0 4.243 0 5.122-.879.879-.878.879-2.293.879-5.121V8c0-2.828 0-4.243-.879-5.121C20.617 2 19.203 2 16.375 2h-1c-2.829 0-4.243 0-5.121.879-.879.878-.879 2.293-.879 5.121Z" />
          </g>
        </svg>Logout</a>
    </li>
  </ul>
</aside>
<!-- Sidebar End -->