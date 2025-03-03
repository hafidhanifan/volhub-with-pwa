@include('user.layout.templates.header')

<body style="background-image: url('{{ asset('img/registration-login-image/registration-login-image.jpg') }}');"
    class="relative bg-cover bg-center bg-no-repeat w-full min-h-screen">
    <div class="absolute z-0 inset-0 bg-black bg-opacity-20"></div>
    <!-- Content start -->
    <div class="absolute w-full top-0 z-20 flex justify-between px-2 py-4">
        <a href="{{route('home')}}" class="block text-lg font-medium py-1 px-4 text-white">Administrator</a>
    </div>

    <!-- wrapper -->
    <div class="relative z-10 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 w-5/6 mx-auto my-auto rounded-lg sm:max-w-80">
            <div class="flex flex-col gap-2 mx-auto max-w-52 md:max-w-64">
                <h1 class="text-center font-semibold md:text-xl">Admin Sign In</h1>
                <p class="py-2 text-center text-xs md:text-sm">
                    Hey, Enter your details to get sign in to your account
                </p>
            </div>
            <form action="{{ route('login') }}" method="POST" class="mt-6 space-y-4">
                @csrf
                <!-- Username Input -->

                <div class="mt-1">
                    <label class="text-sm ">Username</label>
                    <input type="text" id="username" name="username"
                        class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400"
                        placeholder="Enter your username" required />
                </div>

                <!-- Password Input -->

                <div class="mt-1">
                    <label class="text-sm ">Password</label>
                    <input type="password" id="password" name="password"
                        class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 p-2.5 placeholder-gray-400"
                        placeholder="Enter your password" required />
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-sky-500 text-white py-2 px-4 rounded-lg hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-1">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Content end -->
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>
@include('sweetalert::alert')