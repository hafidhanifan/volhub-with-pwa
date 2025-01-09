@include('admin.layout.templates.header')
@include('admin.layout.templates.sidebar')
@include('admin.layout.templates.overlay')
<!-- Content Start -->
<section class="w-full">
  <div class="p-4">
    <h1 class="font-normal text-lg">Edit Category</h1>
    <p class="text-gray-500 text-sm">
      Edit Category Name
    </p>
  </div>
  <div class="p-4 max-w-lg">
    <ul class="divide-y divide-gray-200">
      <li class="flex justify-between items-center py-2 gap-4">
        <form action="{{ route('admin.edit-kategori-action', ['id' => $kategori->id_kategori]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="p-4 max-w-lg">
            <label for="" class="block mb-2 text-sm font-medium">Edit Category</label>
            <input type="text" value="{{ old('kategori', $kategori->nama_kategori) }}" name="kategori" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
              placeholder="New Category" />
          </div>
          <div class="flex justify-end max-w-lg">
            <button type="submit"
              class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-sky-500 text-white rounded-lg hover:bg-sky-600">
              Edit Category
            </button>
          </div>
        </form>
      </li>

    </ul>
  </div>
</section>
<!-- Content End -->