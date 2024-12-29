@include('mitra.layout.templates.header')
@include('mitra.layout.templates.sidebar')
@include('mitra.layout.templates.navbar')

<!-- Content start -->
<section class="w-full">
  <div class="p-4">
    <h1 class="font-normal text-lg">Add requirement</h1>
    <p class="text-gray-500 text-sm">
      Add requirements according to your needs
    </p>
  </div>
  <div class="p-4 max-w-lg">
    <ul class="divide-y divide-gray-200">
      <li class="flex justify-between items-center py-2 gap-4">
        <span>Paid</span>
        <button>
          <svg class="w-7 stroke-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="m18 6-.8 12.013c-.071 1.052-.106 1.578-.333 1.977a2 2 0 0 1-.866.81c-.413.2-.94.2-1.995.2H9.994c-1.055 0-1.582 0-1.995-.2a2 2 0 0 1-.866-.81c-.227-.399-.262-.925-.332-1.977L6 6M4 6h16m-4 0-.27-.812c-.263-.787-.394-1.18-.637-1.471a2 2 0 0 0-.803-.578C13.938 3 13.524 3 12.694 3h-1.388c-.829 0-1.244 0-1.596.139a2 2 0 0 0-.803.578c-.243.29-.374.684-.636 1.471L8 6"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </li>
      <li class="flex justify-between items-center py-2 gap-4">
        <span>Unpaid</span>
        <button>
          <svg class="w-7 stroke-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="m18 6-.8 12.013c-.071 1.052-.106 1.578-.333 1.977a2 2 0 0 1-.866.81c-.413.2-.94.2-1.995.2H9.994c-1.055 0-1.582 0-1.995-.2a2 2 0 0 1-.866-.81c-.227-.399-.262-.925-.332-1.977L6 6M4 6h16m-4 0-.27-.812c-.263-.787-.394-1.18-.637-1.471a2 2 0 0 0-.803-.578C13.938 3 13.524 3 12.694 3h-1.388c-.829 0-1.244 0-1.596.139a2 2 0 0 0-.803.578c-.243.29-.374.684-.636 1.471L8 6"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </li>
      <li class="flex justify-between items-center py-2 gap-4">
        <span>Relasi banyak</span>
        <button>
          <svg class="w-7 stroke-red-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="m18 6-.8 12.013c-.071 1.052-.106 1.578-.333 1.977a2 2 0 0 1-.866.81c-.413.2-.94.2-1.995.2H9.994c-1.055 0-1.582 0-1.995-.2a2 2 0 0 1-.866-.81c-.227-.399-.262-.925-.332-1.977L6 6M4 6h16m-4 0-.27-.812c-.263-.787-.394-1.18-.637-1.471a2 2 0 0 0-.803-.578C13.938 3 13.524 3 12.694 3h-1.388c-.829 0-1.244 0-1.596.139a2 2 0 0 0-.803.578c-.243.29-.374.684-.636 1.471L8 6"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </li>
    </ul>
  </div>

  <div class="p-4 max-w-lg">
    <label for="" class="block mb-2 text-sm font-medium">Add benefit</label>
    <input type="text" name="" id="" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
      placeholder="Volunteer requirement" required="" />
  </div>
  <div class="flex justify-end max-w-lg">
    <button type="submit"
      class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-sky-500 text-white rounded-lg hover:bg-sky-600">
      Add benefit
    </button>
  </div>
</section>
<!-- Content end -->

@include('mitra.layout.templates.footer');