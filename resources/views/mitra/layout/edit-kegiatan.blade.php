@include('mitra.layout.templates.header')
@include('mitra.layout.templates.sidebar')
@include('mitra.layout.templates.overlay')
<!-- Content Start -->
<section class="w-full">
  <button id="toggleSidebar" class="h-14 z-40 p-2 ml-1 lg:hidden">
    <svg class="w-7 stroke-gray-500" viewBox="0 0 24 24">
      <path d="M4 12h16m0 0-4-4m4 4-4 4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
  </button>
  <div class="py-1 px-12 max-w-5xl lg:py-8">
    <div>
      <h1 class="text-xl font-normal">Edit {{$kegiatan->nama_kegiatan}}</h1>
      <p class="text-sm text-gray-500">Fill in all the following fields !</p>
    </div>
    <form
      action="{{ route('mitra.edit-kegiatan-action', ['id' => $mitra->id_mitra,'id_keg' => $kegiatan->id_kegiatan]) }}"
      method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="grid gap-4 mt-8 sm:grid-cols-2 sm:gap-6">
        <div class="col-span-2">
          <label for="name" class="block mb-2 text-sm font-medium">Volunteer Name</label>
          <input type="text" name="nama_kegiatan" id=""
            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
            placeholder="Type volunteer name" required value="{{ old('kegiatan', $kegiatan->nama_kegiatan) }}" />
        </div>
        <div class="col-span-2 lg:col-span-1">
          <label for="" class="block mb-2 text-sm font-medium">Category</label>
          <select name="kategori" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
            <option selected="">Select Category</option>
            @foreach($kategori as $kategori)
            <option value="{{ $kategori->id_kategori }}" @if(old('kategori', $kegiatan->id_kategori) ==
              $kategori->id_kategori) selected @endif>{{ $kategori->nama_kategori }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-span-2 lg:col-span-1">
          <label for="" class="block mb-2 text-sm font-medium">Location</label>
          <input type="text" name="lokasi_kegiatan" id=""
            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5"
            placeholder="Volunteer location" required="" value="{{ old('kegiatan', $kegiatan->lokasi_kegiatan) }}" />
        </div>
        <div class="col-span-2 lg:col-span-1">
          <label for="price" class="block mb-2 text-sm font-medium">Volunteer Duration</label>
          <input type="text" name="lama_kegiatan" id="price"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
            placeholder="Volunteer duration" required="" value="{{ old('kegiatan', $kegiatan->lama_kegiatan) }}" />
        </div>
        <div class="col-span-2 lg:col-span-1">
          <label for="category" class="block mb-2 text-sm font-medium">Volunteer System</label>
          <select id="category" name="sistem_kegiatan"
            class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5">
            <option selected="">Select system</option>
            @foreach($sistemKegiatan as $sistem)
            <option value="{{ $sistem }}" @if(old('sistem_kegiatan', $kegiatan->sistem_kegiatan) == $sistem) selected
              @endif>{{ ucfirst($sistem) }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-span-2 lg:col-span-1">
          <label for="start_date" class="block mb-2 text-sm font-medium">
            Volunteer start
          </label>
          <input type="date" name="tgl_kegiatan" id="start_date"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
            placeholder="Pilih tanggal kegiatan dimulai" required
            value="{{ old('kegiatan', $kegiatan->tgl_kegiatan) }}" />
        </div>

        <div class="col-span-2 lg:col-span-1">
          <label for="end_date" class="block mb-2 text-sm font-medium">
            Registration closed
          </label>
          <input type="date" name="tgl_penutupan" id="end_date"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
            placeholder="Pilih tanggal pendaftaran berakhir" required
            value="{{ old('kegiatan', $kegiatan->tgl_penutupan) }}" />
        </div>

        <div class="col-span-2">
          <label for="description" class="block mb-2 text-sm font-medium">Description</label>
          <textarea id="description" rows="8" name="deskripsi"
            class="block p-2.5 w-full text-sm bg-gray-50 rounded-lg border border-gray-300"
            placeholder="Your description here"> {{ old('kegiatan', $kegiatan->deskripsi) }}</textarea>
        </div>
      </div>
      <div class="flex justify-end">
        <button type="submit"
          class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center bg-sky-500 text-white rounded-lg hover:bg-sky-600">
          Edit volunteer
        </button>
      </div>
    </form>
  </div>
</section>
<!-- Content End -->