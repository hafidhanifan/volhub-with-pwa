@include('user.layout.templates.header')
@include('user.layout.templates.navbar')

<main class="mt-20 mb-20">
  <!-- Search section start -->
  <section class="flex items-center p-4 ml-4 max-w-2xl">
    <!-- Dropdown -->
    <div class="relative inline-block">
      <button id="dropdownCategoriesButton"
        class="h-[37.6px] flex items-center gap-1 px-4 rounded-l-md font-light text-sm text-slate-600 bg-slate-100 border-l border-t border-b border-slate-300">
        Categories
        <span class="relative w-4 h-4">
          <svg id="arrowDown"
            class="w-4 absolute top-0 left-0 fill-slate-600 transform transition-transform duration-200"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M12.707 14.707a1 1 0 0 1-1.414 0l-5-5a1 1 0 0 1 1.414-1.414L12 12.586l4.293-4.293a1 1 0 1 1 1.414 1.414l-5 5Z" />
          </svg>
          <svg id="arrowUp"
            class="w-4 absolute top-0 left-0 fill-slate-600 transform transition-transform duration-200 scale-0"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M18.293 15.29a1 1 0 0 0 0-1.415L13.4 8.988a2 2 0 0 0-2.828 0l-4.89 4.89a1 1 0 1 0 1.414 1.415l4.185-4.186a1 1 0 0 1 1.415 0l4.182 4.182a1 1 0 0 0 1.414 0Z" />
          </svg>
        </span>
      </button>
      <!-- Dropdown Menu -->
      <ul id="dropdownCategories" class="absolute left-0 mt-2 w-40 bg-white text-black rounded-md shadow-lg hidden">
        @foreach ($kategori as $kategori)
        <li class="px-4 py-2 text-sm hover:bg-button_hover cursor-pointer">
          {{ $kategori->nama_kategori }}
        </li>
        @endforeach
        <li class="px-4 py-2 text-sm hover:bg-button_hover cursor-pointer">
          Mockups
        </li>
        <li class="px-4 py-2 text-sm hover:bg-button_hover cursor-pointer">
          Templates
        </li>
        <li class="px-4 py-2 text-sm hover:bg-button_hover cursor-pointer">
          Design
        </li>
        <li class="px-4 py-2 text-sm hover:bg-button_hover cursor-pointer">
          Logos
        </li>
      </ul>
    </div>

    <!-- Search Bar -->
    <div class="flex-1">
      <input type="text" placeholder="Search..."
        class="w-full px-4 py-2 text-sm border-slate-300 bg-slate-100 focus:border-sky-500 focus:ring focus:ring-sky-500 focus:ring-opacity-0" />
    </div>

    <!-- Search Button -->
    <button class="h-[37.6px] px-2 py-2 rounded-r-md bg-cyan-500">
      <svg class="w-6 fill-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
          d="M15 10.5a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm-.82 4.74a6 6 0 1 1 1.06-1.06l4.79 4.79-1.06 1.06-4.79-4.79Z" />
      </svg>
    </button>
  </section>
  <!-- Search section end -->
</main>
@include('user.layout.templates.footer')