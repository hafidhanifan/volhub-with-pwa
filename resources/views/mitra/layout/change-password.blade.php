@include('mitra.layout.templates.header')
@include('mitra.layout.templates.sidebar')
@include('mitra.layout.templates.overlay')
<section class="w-full">
    <!-- Mobile header -->
    <div class="lg:hidden">
        <button id="toggleSidebar" class="h-14 z-40 p-2">
            <svg class="w-7 stroke-gray-500" viewBox="0 0 24 24">
                <path d="M4 12h16m0 0-4-4m4 4-4 4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
        <div class="w-full flex flex-col justify-between md:items-center md:flex-row">
            <div class="pl-4 pb-3">
                <h1 class="font-normal text-lg">Change password</h1>
                <p class="text-gray-500 text-sm">Manage your password account</p>
            </div>
        </div>
    </div>
    {{-- Mobile header end --}}

    {{-- Desktop header start --}}
    <div class="hidden w-full lg:flex justify-between items-center">
        <div class="p-4">
            <h1 class="font-normal text-lg">Change password</h1>
            <p class="text-gray-500 text-sm">Manage your password account</p>
        </div>
    </div>
    {{-- Desktop header end --}}

    <div class="px-2">
        <form action="" method="POST">
            @csrf
            <div class="mt-6 space-y-4 p-2 overflow-y-auto sm:max-w-xl">

                <!-- Email Input -->
                <div>
                    <label class="block text-sm mb-2 text-gray-500">Password</label>
                    <input type="password" id="" name=""
                        class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400"
                        placeholder="Enter your password" required />
                </div>

                <!-- Submit Button -->
                <div class="mt-6 p-2 sm:flex sm:justify-end sm:max-w-4xl">
                    <button type="submit"
                        class="w-full bg-sky-500 text-white py-2 px-4 rounded-lg hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-1 sm:w-24">
                        Save
                    </button>
                </div>
        </form>
    </div>
</section>