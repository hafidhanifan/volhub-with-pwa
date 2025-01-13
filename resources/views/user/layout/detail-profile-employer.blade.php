@include('user.layout.templates.header')
@include('user.layout.templates.navbar')
<main class="bg-gray-50">
    <section class="mt-20 w-full bg-white border-b">
        <div class="flex flex-col px-5 pt-5 pb-2 md:w-11/12 md:mx-auto lg:w-4/5">
            <div class="w-full flex flex-wrap items-center gap-2 md:flex-nowrap lg:gap-6">
                @if(!empty($mitra->logo))
                <img src="{{ asset('storage/logo/'.$mitra->logo)}}" alt="Employer Logo"
                    class="w-28 h-28 object-cover rounded-full" />
                @else
                <div class="relative group">

                    <img class="w-28 h-28 object-cover rounded-full" src="{{ asset('img/default-profile.png') }}"
                        alt="Avatar" />
                    <div
                        class="absolute top-0 left-20 bg-red-600 text-white rounded-full p-1 h-5 w-5 flex items-center justify-center text-xs">
                        !
                    </div>
                    <div
                        class="absolute -bottom-10 left-16 mb-2 w-60 px-2 py-1 text-xs text-white bg-rose-500 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none lg:text-sm">
                        Employer has not provided a company logo
                    </div>
                </div>
                @endif
                <div class="md:max-w-xl lg:max-w-5xl">
                    <h1 class="text-2xl font-semibold">{{$mitra->nama_mitra}}</h1>
                    @if(!empty($mitra->bio))
                    <p class="w-full text-justify">{{$mitra->bio}}</p>
                    @else
                    <p class="w-full text-justify text-rose-500">The employer has not yet provided any information about
                        the company
                        profile.</p>
                    @endif
                </div>
            </div>
            <div class="mt-4 flex flex-col gap-2 lg:mt-8 lg:grid lg:grid-cols-2 lg:gap-4">
                <div class="flex gap-2 items-center">
                    <svg class="w-5 fill-slate-600 md:w-6" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M16.114-.011C9.555-.011 4 5.576 4 12.193c0 6.93 6.439 14.017 10.77 18.998.017.02.717.797 1.579.797h.076c.863 0 1.558-.777 1.575-.797 4.064-4.672 10-12.377 10-18.998C28 5.575 23.667-.011 16.114-.011zm.401 29.86a1.211 1.211 0 0 1-.131.107 1.218 1.218 0 0 1-.133-.107l-.523-.602c-4.106-4.71-9.729-11.161-9.729-17.055 0-5.532 4.632-10.205 10.114-10.205 6.829 0 9.886 5.125 9.886 10.205 0 4.474-3.192 10.416-9.485 17.657zm-.48-23.805a6 6 0 1 0 0 12 6 6 0 0 0 0-12zm0 10c-2.206 0-4.046-1.838-4.046-4.044s1.794-4 4-4c2.207 0 4 1.794 4 4 .001 2.206-1.747 4.044-3.954 4.044z" />
                    </svg>
                    @if(!empty($mitra->alamat))
                    <p class="text-sm md:text-base">{{$mitra->alamat}}</p>
                    @else
                    <p class="text-sm md:text-base text-rose-500">The employer has not yet provided any information.</p>
                    @endif
                </div>
                <div class="flex gap-2 items-center">
                    <svg class="w-5 fill-slate-600 md:w-6" viewBox="0 -4.91 122.88 122.88"
                        xmlns="http://www.w3.org/2000/svg" style="enable-background: new 0 0 122.88 113.05"
                        xml:space="preserve">
                        <path
                            d="M0 100.07h14.72V1.57c0-.86.71-1.57 1.57-1.57h49.86c.86 0 1.57.71 1.57 1.57V38.5h44.12c.86 0 1.57.71 1.57 1.57v59.99h9.47v12.99H0v-12.98zm27.32-85.25h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V15.39c0-.31.26-.57.57-.57zM44.6 76.3h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57H44.6c-.31 0-.57-.26-.57-.57V76.87c0-.32.26-.57.57-.57zm-17.28 0h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V76.87c0-.32.26-.57.57-.57zM44.6 55.8h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57H44.6c-.31 0-.57-.26-.57-.57V56.38c0-.32.26-.58.57-.58zm-17.28 0h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V56.38c0-.32.26-.58.57-.58zM44.6 35.31h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57H44.6c-.31 0-.57-.26-.57-.57V35.88c0-.31.26-.57.57-.57zm-17.28 0h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V35.88c0-.31.26-.57.57-.57zM44.6 14.82h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57H44.6c-.31 0-.57-.26-.57-.57V15.39c0-.31.26-.57.57-.57zm-21.43-7.5h35.92c.62 0 1.13.61 1.13 1.35v85.87c0 .74-.51 1.35-1.13 1.35H23.17c-.62 0-1.13-.61-1.13-1.35V8.67c0-.74.51-1.35 1.13-1.35zm49.44 46.11h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V54c0-.31.26-.57.57-.57zM89.89 76.3h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V76.87c0-.32.26-.57.57-.57zm-17.28 0h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V76.87c0-.32.26-.57.57-.57zm17.28-22.87h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V54c0-.31.26-.57.57-.57zm-21.03-7.61h35.92c.62 0 1.13.61 1.13 1.35v47.37c0 .74-.51 1.35-1.13 1.35H68.86c-.62 0-1.13-.61-1.13-1.35V47.17c0-.74.51-1.35 1.13-1.35z"
                            style="fill-rule: evenodd; clip-rule: evenodd" />
                    </svg>
                    @if(!empty($mitra->industri))
                    <p class="text-sm md:text-base">{{$mitra->industri}}</p>
                    @else
                    <p class="text-sm md:text-base text-rose-500">The employer has not yet provided any information.</p>
                    @endif
                </div>
                <div class="flex gap-2 items-center">
                    <svg class="w-5 fill-slate-600 md:w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill="none" d="M0 0h20v20H0z" />
                        <path
                            d="M9 0a9 9 0 1 0 .001 18.001A9 9 0 0 0 9 0zM1.11 9.68h2.51c.04.91.167 1.814.38 2.7H1.84a7.864 7.864 0 0 1-.73-2.7zm8.57-5.4V1.19a4.128 4.128 0 0 1 2.22 2c.205.347.386.708.54 1.08l-2.76.01zm3.22 1.35c.232.883.37 1.788.41 2.7H9.68v-2.7h3.22zM8.32 1.19v3.09H5.56c.154-.372.335-.733.54-1.08a4.135 4.135 0 0 1 2.22-2.01zm0 4.44v2.7H4.7c.04-.912.178-1.817.41-2.7h3.21zm-4.7 2.69H1.11c.08-.936.327-1.85.73-2.7H4c-.213.886-.34 1.79-.38 2.7zM4.7 9.68h3.62v2.7H5.11a12.84 12.84 0 0 1-.41-2.7zm3.63 4v3.09a4.128 4.128 0 0 1-2.22-2 8.568 8.568 0 0 1-.54-1.08l2.76-.01zm1.35 3.09v-3.04h2.76a8.568 8.568 0 0 1-.54 1.08 4.128 4.128 0 0 1-2.22 2v-.04zm0-4.44v-2.7h3.62a12.84 12.84 0 0 1-.41 2.7H9.68zm4.71-2.7h2.51a7.864 7.864 0 0 1-.73 2.7H14c.21-.87.337-1.757.38-2.65l.01-.05zm0-1.35A14.124 14.124 0 0 0 14 5.63h2.16c.403.85.65 1.764.73 2.7l-2.5-.05zm1-4H13.6a8.922 8.922 0 0 0-1.39-2.52 8.017 8.017 0 0 1 3.14 2.52h.04zm-9.6-2.52A8.922 8.922 0 0 0 4.4 4.28H2.65a8.017 8.017 0 0 1 3.14-2.52zm-3.15 12H4.4c.324.91.793 1.76 1.39 2.52a7.992 7.992 0 0 1-3.14-2.55l-.01.03zm9.56 2.52a8.922 8.922 0 0 0 1.39-2.52h1.76a7.992 7.992 0 0 1-3.14 2.48l-.01.04z" />
                    </svg>
                    @if(!empty($mitra->situs))
                    <a href="{{$mitra->situs}}" target="_blank"
                        class="text-sm cursor-pointer text-sky-500 hover:text-sky-600 md:text-base">{{$mitra->situs}}</a>
                    @else
                    <p class="text-sm md:text-base text-rose-500">The employer has not yet provided any information.</p>
                    @endif
                </div>
                <div class="flex gap-2 items-center">
                    <svg class="w-5 fill-slate-600 md:w-6" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.75 5.25 3 6v12l.75.75h16.5L21 18V6l-.75-.75H3.75Zm.75 2.446v9.554h15V7.695L12 14.514 4.5 7.696Zm13.81-.946H5.69L12 12.486l6.31-5.736Z" />
                    </svg>
                    @if(!empty($mitra->email_mitra))
                    <p class="text-sm md:text-base">{{$mitra->email_mitra}}</p>
                    @else
                    <p class="text-sm md:text-base text-rose-500">The employer has not yet provided any information.</p>
                    @endif
                </div>
                <div class="flex gap-2 items-center">
                    <svg class="w-5 stroke-slate-600" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21.97 18.33c0 .36-.08.73-.25 1.09-.17.36-.39.7-.68 1.02-.49.54-1.03.93-1.64 1.18-.6.25-1.25.38-1.95.38-1.02 0-2.11-.24-3.26-.73s-2.3-1.15-3.44-1.98a28.75 28.75 0 0 1-3.28-2.8 28.414 28.414 0 0 1-2.79-3.27c-.82-1.14-1.48-2.28-1.96-3.41C2.24 8.67 2 7.58 2 6.54c0-.68.12-1.33.36-1.93.24-.61.62-1.17 1.15-1.67C4.15 2.31 4.85 2 5.59 2c.28 0 .56.06.81.18.26.12.49.3.67.56l2.32 3.27c.18.25.31.48.4.7.09.21.14.42.14.61 0 .24-.07.48-.21.71-.13.23-.32.47-.56.71l-.76.79c-.11.11-.16.24-.16.4 0 .08.01.15.03.23.03.08.06.14.08.2.18.33.49.76.93 1.28.45.52.93 1.05 1.45 1.58.54.53 1.06 1.02 1.59 1.47.52.44.95.74 1.29.92.05.02.11.05.18.08.08.03.16.04.25.04.17 0 .3-.06.41-.17l.76-.75c.25-.25.49-.44.72-.56.23-.14.46-.21.71-.21.19 0 .39.04.61.13.22.09.45.22.7.39l3.31 2.35c.26.18.44.39.55.64.1.25.16.5.16.78Z"
                            stroke-width="1.5" stroke-miterlimit="10" />
                    </svg>
                    @if(!empty($mitra->nomor_telephone))
                    <p class="text-sm md:text-base">{{$mitra->nomor_telephone}}</p>
                    @else
                    <p class="text-sm md:text-base text-rose-500">The employer has not yet provided any information.</p>
                    @endif
                </div>
            </div>
            <div class="mt-12 flex justify-center gap-20 md:justify-start">
                <a href="#description"
                    class="nav-link relative hover:text-sky-500 transition duration-200">Description</a>
                <a href="#volunteer" class="nav-link relative hover:text-sky-500 transition duration-200">Activity</a>
            </div>
        </div>
    </section>
    <section class="md:w-11/12 md:mx-auto lg:w-4/5">
        <div id="description"
            class="scroll-mt-20 bg-white p-5 md:scroll-mt-32 md:p-0 md:border md:border-gray-300 md:mt-4 md:rounded-lg">
            <h2 class="font-medium text-lg md:border-b md:p-5 md:text-xl">
                Description
            </h2>
            @if(!empty($mitra->deskripsi))
            <div class="mt-2">
                <p class="text-justify text-sm md:px-5 md:pb-5 md:text-base">{{$mitra->deskripsi}}</p>
            </div>
            @else
            <div class="mt-8 mb-8 lg:mt-20 lg:mb-20 flex justify-center">
                <p class="text-sm md:text-base text-rose-500">The employer has not yet provided any information.</p>
            </div>
            @endif
        </div>
        <div id="volunteer" class="scroll-mt-20 bg-white p-5 md:p-0 md:mt-4 md:border md:rounded-lg md:border-gray-300">
            <h2 class="font-medium text-lg md:border-b-2 md:p-5 md:text-xl">
                Activity Available
            </h2>
            <div class="md:flex md:flex-col md:gap-3">
                @if($mitra->kegiatans->count() > 0)
                @foreach($mitra->kegiatans as $kegiatan)
                <!-- Activity card -->
                <a href="" class="p-4 flex items-start gap-2 hover:bg-button_hover2">
                    @if(!empty($mitra->logo))
                    <img src="{{ asset('storage/logo/'.$mitra->logo)}}" alt="Employer Logo"
                        class="w-14 h-14 object-cover rounded-full lg:w-16 lg:h-16" />
                    @else
                    <div class="w-24 relative group">
                        <img class="w-14 h-14 object-cover rounded-full lg:w-16 lg:h-16" src=" {{
                        asset('img/default-profile.png') }}" alt="Avatar" />
                        <div
                            class="absolute top-0 left-11 bg-red-600 text-white rounded-full p-1 h-5 w-5 flex items-center justify-center text-xs">
                            !
                        </div>
                        <div
                            class="absolute -bottom-10 left-16 mb-2 w-60 px-2 py-1 text-xs text-white bg-rose-500 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none lg:text-sm">
                            Employer has not provided a company logo
                        </div>
                    </div>
                    @endif
                    <div class="">
                        <h3 class="font-medium text-base line-clamp-1">{{$kegiatan->nama_kegiatan}}</h3>
                        <span class="text-gray-500 text-sm line-clamp-1">{{$kegiatan->lokasi_kegiatan}}</span>
                        <span class="text-gray-500 text-sm">{{$kegiatan->sistem_kegiatan}}</span>
                    </div>
                </a>
                @endforeach
                @else
                <div class="mt-8 mb-8 lg:mt-20 lg:mb-20 flex justify-center">
                    <p class="text-sm md:text-base text-rose-500">The employer has not yet organized any volunteer
                        activities. Stay tuned!</p>
                </div>
                @endif
            </div>
        </div>
    </section>
</main>