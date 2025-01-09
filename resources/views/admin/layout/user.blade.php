@include('admin.layout.templates.header')
@include('admin.layout.templates.sidebar')
@include('admin.layout.templates.overlay')

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
        <p class="text-gray-500 text-sm">Manage volunteer data</p>
      </div>
    </div>
  </div>

  <div class="hidden w-full lg:flex justify-between items-center">
    <div class="p-4">
      <h1 class="font-normal text-lg">Volunteer Management</h1>
      <p class="text-gray-500 text-sm">Manage volunteer data</p>
    </div>
  </div>
  <!-- Header Content End -->

  <!-- Category list start -->
  <div class="mt-8 overflow-x-auto w-full lg:mt-0 lg:p-4">
    @if(!empty($user))
    <table class="min-w-full table-auto border-separate border-spacing-0 border border-gray-200 lg:rounded-lg">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">
            Volunteer Name
          </th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">
            Phone Number
          </th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">
            Edit
          </th>
          <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">
            Delete
          </th>
        </tr>
      </thead>
      <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
        <?php $no = 1 ?>
        @foreach($user as $user)
        <tr id="category" class="category cursor-pointer hover:bg-button_hover2">

          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
            <span class="font-semibold">{{ $user->nama_user }}</span>
            <p class="text-sm text-gray-500">{{ $user->email_user}}</p>
          </td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
            <span class="font-semibold">{{ $user->nomor_telephone }}</span>
          </td>
          <td class="px-6 py-4">
            <a href="">
              <svg class="w-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                  <path
                    d="m21.28 6.4-9.54 9.54c-.95.95-3.77 1.39-4.4.76-.63-.63-.2-3.45.75-4.4l9.55-9.55a2.58 2.58 0 1 1 3.64 3.65v0Z" />
                  <path d="M11 4H6a4 4 0 0 0-4 4v10a4 4 0 0 0 4 4h11c2.21 0 3-1.8 3-4v-5" />
                </g>
              </svg>
            </a>
          </td>
          {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600"></td> --}}
          <td class="px-6 py-4 flex">
            <form
              action=""
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
      <p class="text-center">Hmm, it seems the data is still empty.</p>
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
    <!-- Category list end -->
  </div>
</main>
<!-- Content End -->

{{-- @include('admin.layout.templates.footer') --}}