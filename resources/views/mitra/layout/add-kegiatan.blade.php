@include('mitra.layout.templates.header')
@include('mitra.layout.templates.sidebar')
<!-- Content Start -->
<section class="w-full">
  <div class="py-8 px-12 max-w-5xl">
    <h1 class="mb-4 text-xl font-normal">Add a new volunteer</h1>
    <form action="#">
      <div class="grid gap-4 mt-8 sm:grid-cols-2 sm:gap-6">
        <div class="col-span-2">
          <label for="name" class="block mb-2 text-sm font-medium">Volunteer Name</label>
          <input type="text" name="" id=""
            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
            placeholder="Type volunteer name" required="" />
        </div>
        <div class="col-span-2">
          <label for="" class="block mb-2 text-sm font-medium">Location</label>
          <input type="text" name="" id=""
            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
            placeholder="Volunteer location" required="" />
        </div>
        <div class="col-span-2 lg:col-span-1">
          <label for="price" class="block mb-2 text-sm font-medium">Volunteer Duration</label>
          <input type="number" name="price" id="price"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
            placeholder="Volunteer duration" required="" />
        </div>
        <div class="col-span-2 lg:col-span-1">
          <label for="category" class="block mb-2 text-sm font-medium">Volunteer System</label>
          <select id="category" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
            <option selected="">Select system</option>
            <option value="">Offline</option>
            <option value="">Online</option>
          </select>
        </div>
        <div class="col-span-2 lg:col-span-1">
          <label for="start_date" class="block mb-2 text-sm font-medium">
            Volunteer start
          </label>
          <input type="date" name="start_date" id="start_date"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
            placeholder="Pilih tanggal kegiatan dimulai" required />
        </div>

        <div class="col-span-2 lg:col-span-1">
          <label for="end_date" class="block mb-2 text-sm font-medium">
            Registration closed
          </label>
          <input type="date" name="end_date" id="end_date"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
            placeholder="Pilih tanggal pendaftaran berakhir" required />
        </div>

        <div class="col-span-2">
          <label for="description" class="block mb-2 text-sm font-medium">Description</label>
          <textarea id="description" rows="8"
            class="block p-2.5 w-full text-sm bg-gray-50 rounded-lg border border-gray-300"
            placeholder="Your description here"></textarea>
        </div>
      </div>
      <div class="flex justify-end">
        <button type="submit"
          class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-sky-500 text-white rounded-lg hover:bg-sky-600">
          Add volunteer
        </button>
      </div>
    </form>
  </div>
</section>
<!-- Content End -->