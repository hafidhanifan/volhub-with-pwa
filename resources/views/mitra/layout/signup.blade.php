@include('user.layout.templates.header')

<body style="background-image: url('{{ asset('img/registration-login-image/registration-login-image.jpg') }}');"
  class="relative bg-cover bg-center bg-no-repeat w-full min-h-screen">
  <div class="absolute z-0 inset-0 bg-black bg-opacity-20"></div>
  <!-- Content start -->
  <div class="absolute w-full top-0 z-20 flex justify-between px-2 py-4">
    <a href="{{route('home')}}" class="block text-lg font-medium py-1 px-4 text-white">Employer</a>
    <a href="{{route('mitra.login')}}" class="text-lg font-medium text-white px-4 py-1 rounded-lg hover:bg-white hover:text-sky-600">
      Sign In
    </a>
  </div>

  <!-- wrapper -->
  <div class="relative z-10 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 w-5/6 mx-auto my-auto rounded-lg lg:w-2/6">
      <div class="flex flex-col gap-2 mx-auto max-w-52 md:max-w-64">
        <h1 class="text-center font-semibold md:text-xl">Register Employer</h1>
        <p class="py-2 text-center text-xs md:text-sm">
          Hey, Enter your details to get Register your account
        </p>
      </div>
      <form action="{{ route('mitra.register.action')}}" method="POST">
        @csrf
        <div class="mt-6 space-y-4 p-2 overflow-y-auto lg:grid lg:grid-cols-2 lg:gap-6 lg:space-y-0">
        <!-- Username Input -->
          <div class="">
            <label class="text-sm ">Username</label>
            <input type="text" id="username" name="username"
              class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400"
              placeholder="Enter your username" required />
          </div>

          <!-- Password Input -->
          <div class="">
            <label class="text-sm ">Password</label>
            <input type="password" id="password" name="password"
              class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400"
              placeholder="Enter your password" required />
          </div>

          <!-- Email Input -->
          <div class="">
            <label class="text-sm ">Email</label>
            <input type="email" id="email" name="email_mitra"
              class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400"
              placeholder="Enter your email" required />
          </div>

          <!-- Name Input -->
          <div class="">
            <label class="text-sm ">Company name</label>
            <input type="text" id="name" name="nama_mitra"
              class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400"
              placeholder="Enter your full name" required />
          </div>

          <!-- Phone Number Input -->
          <div class="">
            <label class="text-sm ">Phone number</label>
            <input type="tel" id="phone" name="nomor_telephone"
              class="w-full text-sm border border-gray-300 rounded-lg shadow-sm focus:ring-sky-500 focus:border-sky-500 placeholder-gray-400"
              placeholder="Enter your phone number" required />
          </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-6 p-2">
          <button type="submit"
            class="w-full bg-sky-500 text-white py-2 px-4 rounded-lg hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-1">
            Register
          </button>
        </div>
      </form>
      <div class="mt-6 flex justify-center gap-1">
        <p class="text-xs md:text-sm">Already have account?</p>
        <a href="{{route('mitra.login')}}" class="text-sky-500 text-xs md:text-sm">Sign In</a>
      </div>
    </div>
  </div>
  <!-- Content end -->
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>
@include('sweetalert::alert')