@include('admin.layout.templates.header')
@include('admin.layout.templates.sidebar')
@include('admin.layout.templates.overlay')
<!-- Content Start -->
<section class="w-full">
  <button id="toggleSidebar" class="h-14 z-40 p-2 ml-1 lg:hidden">
    <svg class="w-7 stroke-gray-500" viewBox="0 0 24 24">
      <path d="M4 12h16m0 0-4-4m4 4-4 4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
  </button>
  <div class="py-1 px-12 max-w-5xl lg:py-8">
    <div>
      <h1 class="text-xl font-normal">Add a new Category</h1>
      <p class="text-sm text-gray-500">Fill in all the following fields !</p>
    </div>
    <form action="{{ route('admin.add-kategori-action') }}" method="POST">
      @csrf
      <div class="p-4 max-w-lg">
        <label for="" class="block mb-2 text-sm font-medium">Add Category</label>
        <input type="text" name="kategori" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
          placeholder="Add New Category" />
      </div>
      <div class="flex justify-end max-w-lg">
        <button type="submit"
          class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-sky-500 text-white rounded-lg hover:bg-sky-600">
          Add Category
        </button>
      </div>
    </form>
  </div>
</section>
<!-- Content End -->