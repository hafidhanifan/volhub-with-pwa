@include('user.layout.templates.header')
@include('user.layout.templates.navbar')
<section class="bg-gray-50">
    <div class="mt-20 md:w-3/4 md:mx-auto bg-white">
        <div class="h-48 bg-cover bg-center"
            style="background-image: url('{{ asset('img/background-employer/background.jpg') }}');"></div>
        <!-- Profile Section -->
        @if(!empty($mitra->logo))
        <div class="relative">
            <!-- Avatar Mitra -->
            <div class="absolute -top-12 left-4">
                <img src="{{ asset('storage/logo/'.$mitra->logo)}}"
                    class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg" alt="Avatar" />
            </div>
        </div>
        @else
        <div class="relative group">
            <div class="absolute -top-12 left-4">
                <img class="w-24 h-24 object-cover border-4 border-white shadow-lg rounded-full"
                    src="{{ asset('img/default-profile.png') }}" alt="Avatar" />
                <div
                    class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-1 h-5 w-5 flex items-center justify-center text-xs">
                    !
                </div>
                <div
                    class="absolute top-10 left-24 mb-2 w-60 px-2 py-1 text-xs text-white bg-rose-500 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none lg:text-sm">
                    Employer has not provided a company logo.
                </div>
            </div>
        </div>
        @endif
        <div class="mt-14 px-4">
            <div class="flex flex-col md:items-center md:flex-row md:justify-between">
                <h1 class="font-semibold text-xl">{{$mitra->nama_mitra}}</h1>
                <a href="https://www.dicoding.com/"
                    class="text-sm text-sky-600 hover:text-sky-700">{{$mitra->situs}}</a>
            </div>
            <div>
                <span class="text-gray-500 font-light">{{$mitra->alamat}}</span>
            </div>
            <div>
                <span class="text-gray-500 font-light">{{$mitra->industri}}</span>
            </div>
            <div class="mt-2">
                <span class="block">Contact : </span>
                <div class="flex text-sm items-center gap-2 mt-2">
                    <svg class="w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.75 5.25 3 6v12l.75.75h16.5L21 18V6l-.75-.75H3.75Zm.75 2.446v9.554h15V7.695L12 14.514 4.5 7.696Zm13.81-.946H5.69L12 12.486l6.31-5.736Z"
                            fill="#080341" />
                    </svg>
                    <a href="dicoding@gmail.com">{{$mitra->email_mitra}}</a>
                </div>
                <div class="flex text-sm items-center gap-2 mt-2">
                    <svg class="w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21.97 18.33c0 .36-.08.73-.25 1.09-.17.36-.39.7-.68 1.02-.49.54-1.03.93-1.64 1.18-.6.25-1.25.38-1.95.38-1.02 0-2.11-.24-3.26-.73s-2.3-1.15-3.44-1.98a28.75 28.75 0 0 1-3.28-2.8 28.414 28.414 0 0 1-2.79-3.27c-.82-1.14-1.48-2.28-1.96-3.41C2.24 8.67 2 7.58 2 6.54c0-.68.12-1.33.36-1.93.24-.61.62-1.17 1.15-1.67C4.15 2.31 4.85 2 5.59 2c.28 0 .56.06.81.18.26.12.49.3.67.56l2.32 3.27c.18.25.31.48.4.7.09.21.14.42.14.61 0 .24-.07.48-.21.71-.13.23-.32.47-.56.71l-.76.79c-.11.11-.16.24-.16.4 0 .08.01.15.03.23.03.08.06.14.08.2.18.33.49.76.93 1.28.45.52.93 1.05 1.45 1.58.54.53 1.06 1.02 1.59 1.47.52.44.95.74 1.29.92.05.02.11.05.18.08.08.03.16.04.25.04.17 0 .3-.06.41-.17l.76-.75c.25-.25.49-.44.72-.56.23-.14.46-.21.71-.21.19 0 .39.04.61.13.22.09.45.22.7.39l3.31 2.35c.26.18.44.39.55.64.1.25.16.5.16.78Z"
                            stroke="#000" stroke-width="1.5" stroke-miterlimit="10" />
                    </svg>
                    <span>{{$mitra->nomor_telephone}}</span>
                </div>
            </div>

            {{-- <div class="mt-2">
                <span class="text-xl font-semibold text-sky-600">100+</span>
                <span class="text-gray-500 text-sm">Volunteers</span>
            </div> --}}

            <div class="mt-8">
                <h2 class="text-lg font-semibold mb-2">Bio</h2>
                @if(!empty($mitra->bio))
                <p class="text-justify">
                    {{$mitra->bio}}
                </p>
                @else
                <div class="flex items-center justify-center default-message">
                    <p class="text-gray-500 text-center">No Information</p>
                </div>
                @endif
            </div>
            <div class="mt-8">
                <h2 class="text-lg font-semibold mb-2">Description</h2>
                @if(!empty($mitra->deskripsi))
                <p class="text-justify">
                    {{$mitra->deskripsi}}
                </p>
                @else
                <div class="flex items-center justify-center default-message">
                    <p class="text-gray-500 text-center">No Information</p>
                </div>
                @endif
            </div>
            <div class="mt-8 mb-96">
                <h2 class="text-lg font-semibold mb-2">Volunteers Available</h2>
                <div class="">
                    @if($mitra->kegiatans->count() > 0)
                    @foreach($mitra->kegiatans as $kegiatan)
                    <div class="flex p-2 gap-x-4 hover:bg-gray-100 transition duration-100">
                        <div class="max-w-16">
                            <img src="../src/image/logo_mitra.jpg" alt="" class="max-w-full" />
                        </div>
                        <div class="w-full">
                            <div class="flex flex-col gap-1">
                                <p class="font-semibold">
                                    {{$kegiatan->nama_kegiatan}}
                                </p>
                                <div class="flex gap-1">
                                    <p class="text-sm text-gray-800">{{$kegiatan->nama_mitra}}</p>
                                    <p class="text-sm text-gray-800">{{$kegiatan->lokasi_kegiatan}}</p>
                                </div>
                                <p class="text-sm text-gray-800">{{$kegiatan->sistem_kegiatan}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="flex items-center justify-center default-message">
                        <p class="text-gray-500 text-center">No Information</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>