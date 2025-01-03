@include('mitra.layout.templates.header')
@include('mitra.layout.templates.sidebar')
<!-- Content Start -->
<section class="w-full">
  <!-- Header Content Start -->
  <!-- Mobile header -->
  <div class="lg:hidden">
    <button id="toggleSidebar" class="h-14 z-40 p-2">
      <svg class="w-7 stroke-gray-500" viewBox="0 0 24 24">
        <path d="M4 12h16m0 0-4-4m4 4-4 4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    </button>
    <div class="w-full flex flex-col justify-between md:items-center md:flex-row">
      <div class="pl-4 pb-3">
        <h1 class="font-normal text-lg">All applicant</h1>
        <p class="text-gray-500 text-sm">Manage your applicant</p>
      </div>
    </div>
  </div>

  <div class="hidden w-full lg:flex justify-between items-center">
    <div class="p-4">
      <h1 class="font-normal text-lg">All applicant</h1>
      <p class="text-gray-500 text-sm">Manage your applicant</p>
    </div>
  </div>
  <!-- Header Content End -->
  <div class="mt-8 overflow-x-auto w-full lg:mt-0 lg:p-4">
    <!-- Applicant list start -->
    @if(!empty($pendaftar))
    <table class="min-w-full table-auto border-separate border-spacing-0 border border-gray-200 lg:rounded-lg">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">
            Applicant listing
          </th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">
            Email
          </th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">
            Activity
          </th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">
            Status
          </th>
        </tr>
      </thead>
      <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
        <?php $no = 1 ?>
        @foreach($pendaftar as $pendaftar)
        <tr
          onclick="window.location='{{ route('mitra.detail.pendaftar', ['id' => $mitra->id_mitra, 'id_pendaftar' => $pendaftar->id_pendaftar]) }}';"
          data-info="" class="cursor-pointer hover:bg-button_hover2">
          <td class="px-6 py-4 whitespace-nowrap flex gap-2 items-center text-sm text-gray-800">
            <img src="{{asset('storage/foto-profile/'.$pendaftar->user->foto_profile)}}" alt="Profile photo"
              class="w-12 h-12 object-cover rounded-full" />
            <div>
              <span class="font-semibold">{{$pendaftar->user->nama_user}}</span>
              <p class="text-sm text-gray-500">{{$pendaftar->user->bio}}</p>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
            {{$pendaftar->user->email_user}}
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
            {{$pendaftar->kegiatan->nama_kegiatan}}
          </td>
          <td class="px-6 py-4">
            <span class="block w-24 py-1 text-center text-sm border border-emerald-500 rounded-2xl text-emerald-500 bg-emerald-50
              @if($pendaftar->status_applicant === 'In-review') border border-sky-500 text-sky-500 bg-sky-50 
              @elseif($pendaftar->status_applicant === 'Interview') border border-violet-500 text-violet-500 bg-violet-50 
              @elseif($pendaftar->status_applicant === 'Shortlist') border border-amber-500 text-amber-500 bg-amber-50 
              @elseif($pendaftar->status_applicant === 'Hire') border border-emerald-500 text-emerald-500 bg-emerald-50 
              @elseif($pendaftar->status_applicant === 'Reject') border border-rose-500 text-rose-500 bg-rose-50 
              @else bg-gray-500 text-white border-gray-600 
              @endif"> {{ $pendaftar->status_applicant }}
            </span>
          </td>
        </tr>
        @endforeach
        <!-- Tambahkan baris lainnya sesuai data -->
      </tbody>
    </table>
    <!-- Applicant list end -->

    {{-- If data is empty --}}
    @else
    <div class="w-full h-[calc(100vh-200px)] flex flex-col gap-3 items-center justify-center ">
      <p class="text-center">Hmm, it seems the data is still empty</p>
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
  </div>
</section>
<!-- Content End -->