@include('user.layout.templates.header')
@include('user.layout.templates.navbar')
<section class="mt-20 md:flex md:pt-4 gap-4 flex-wrap justify-center">
    <!-- Mitra Card -->
    <?php $no = 1 ?>
    @foreach($mitra as $mitra)
    <a href="" class="block p-2 border-b hover:bg-gray-100 cursor-pointer md:w-5/12 md:border lg:w-1/4">
        <div class="flex items-center gap-2 px-2">
            @if(!empty($mitra->logo))
            <img src="{{ asset('storage/foto-profile/'.$mitra->logo)}}" alt=""
                class="w-14 h-14 object-cover rounded-full" />
            @else
            <div class="relative group">
                <img class="w-14 h-14 object-cover rounded-full" src="{{ asset('img/default-profile.png') }}"
                    alt="Avatar" />
                <div
                    class="absolute top-0 right-0 bg-red-600 text-white rounded-full p-1 h-5 w-5 flex items-center justify-center text-xs">
                    !
                </div>
                <div
                    class="absolute left-10 mb-2 w-60 px-2 py-1 text-xs text-white bg-rose-500 rounded shadow-lg opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none lg:text-sm">
                    Employer has not uploaded the company logo
                </div>
            </div>
            @endif
            <div>
                <p class="font-semibold">{{$mitra->nama_mitra}}</p>
                @if(!empty($mitra->alamat))
                <p class="text-gray-500 text-sm">{{ $mitra->alamat }}</p>
                @else
                <p class="text-gray-500 text-sm">Employer has not entered the data</p>
                @endif
            </div>
        </div>
        <div class="flex flex-col px-4 mt-4">
            <div class="flex items-end gap-2">
                <svg class="w-6 fill-slate-500" viewBox="0 -4.91 122.88 122.88" xmlns="http://www.w3.org/2000/svg"
                    style="enable-background:new 0 0 122.88 113.05" xml:space="preserve">
                    <path
                        d="M0 100.07h14.72V1.57c0-.86.71-1.57 1.57-1.57h49.86c.86 0 1.57.71 1.57 1.57V38.5h44.12c.86 0 1.57.71 1.57 1.57v59.99h9.47v12.99H0v-12.98zm27.32-85.25h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V15.39c0-.31.26-.57.57-.57zM44.6 76.3h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57H44.6c-.31 0-.57-.26-.57-.57V76.87c0-.32.26-.57.57-.57zm-17.28 0h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V76.87c0-.32.26-.57.57-.57zM44.6 55.8h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57H44.6c-.31 0-.57-.26-.57-.57V56.38c0-.32.26-.58.57-.58zm-17.28 0h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V56.38c0-.32.26-.58.57-.58zM44.6 35.31h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57H44.6c-.31 0-.57-.26-.57-.57V35.88c0-.31.26-.57.57-.57zm-17.28 0h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V35.88c0-.31.26-.57.57-.57zM44.6 14.82h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57H44.6c-.31 0-.57-.26-.57-.57V15.39c0-.31.26-.57.57-.57zm-21.43-7.5h35.92c.62 0 1.13.61 1.13 1.35v85.87c0 .74-.51 1.35-1.13 1.35H23.17c-.62 0-1.13-.61-1.13-1.35V8.67c0-.74.51-1.35 1.13-1.35zm49.44 46.11h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V54c0-.31.26-.57.57-.57zM89.89 76.3h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V76.87c0-.32.26-.57.57-.57zm-17.28 0h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V76.87c0-.32.26-.57.57-.57zm17.28-22.87h10.2c.31 0 .57.26.57.57v12.36c0 .31-.26.57-.57.57h-10.2c-.31 0-.57-.26-.57-.57V54c0-.31.26-.57.57-.57zm-21.03-7.61h35.92c.62 0 1.13.61 1.13 1.35v47.37c0 .74-.51 1.35-1.13 1.35H68.86c-.62 0-1.13-.61-1.13-1.35V47.17c0-.74.51-1.35 1.13-1.35z"
                        style="fill-rule:evenodd;clip-rule:evenodd" />
                </svg>
                @if(!empty($mitra->industri))
                <span class="block leading-none">{{ $mitra->industri }}</span>
                @else
                <span class="block leading-none">Employer has not entered data</span>
                @endif
            </div>
            <div class="flex items-end gap-2">
                <svg class="w-6 fill-slate-500" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M27 29H4a2 2 0 0 1-2-2V15s5.221 2.685 10 3.784V20a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-1.216C23.778 17.685 29 15 29 15v12a2 2 0 0 1-2 2zM17 17a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1h3zm2 0a1 1 0 0 0-1-1h-5a1 1 0 0 0-1 1v.896C7.221 16.764 2 14 2 14v-4a2 2 0 0 1 2-2h6V6a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v2h6a2 2 0 0 1 2 2v4s-5.222 2.764-10 3.896V17zm0-10a1 1 0 0 0-1-1h-5a1 1 0 0 0-1 1v1h7V7z" />
                </svg>
                <span class="block leading-none">9 Lowongan</span>
            </div>
        </div>
    </a>
    @endforeach
</section>