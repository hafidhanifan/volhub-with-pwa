@include('user.layout.templates.header')
@include('user.layout.templates.navbar')
<main class="mt-20">
  <div class="mt-8 mx-auto lg:flex gap-8 lg:max-w-6xl xl:max-w-7xl">
    <!-- Profile, Left Content -->
    <section
      class="container w-full h-fit mx-auto p-6 rounded-xl bg-white lg:max-w-sm lg:shadow-sm lg:border border-slate-200 lg:mt-8">
      <div class="flex items-center gap-4">
        @if(!empty($user->foto_profile))
        <img src="{{asset('storage/foto-profile/'.$user->foto_profile)}}" alt="profile user"
          class="w-20 overflow-hidden rounded-full" />
        @else
        <img src="{{asset('img/logo-user.png')}}" alt="profile user" class="w-20 rounded-full" />
        @endif
        <div>
          <h1 class="font-medium text-lg line-clamp-1">{{$user->nama_user}}</h1>
          <p class="text-sm line-clamp-2">
            {{$user->bio}}
          </p>
        </div>
      </div>
      <div class="mt-8 border-t-2">
        <h2 class="font-medium text-lg mt-2">Contact</h2>
        <!-- Contact item -->
        <div class="flex items-center gap-4 mt-4">
          <svg class="w-6 fill-slate-700" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M3.75 5.25 3 6v12l.75.75h16.5L21 18V6l-.75-.75H3.75Zm.75 2.446v9.554h15V7.695L12 14.514 4.5 7.696Zm13.81-.946H5.69L12 12.486l6.31-5.736Z" />
          </svg>
          <div class="flex flex-col">
            <span class="font-medium text-base">Email</span>
            <p class="line-clamp-1 text-sm">{{$user->email_user}}</p>
          </div>
        </div>

        <!-- Contact item -->
        <div class="flex items-center gap-4 mt-4">
          <svg class="w-6 fill-slate-700" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path
              d="m16.1 13.359-.528-.532.529.532Zm.456-.453.529.532-.529-.532Zm2.417-.317-.358.66.358-.66Zm1.91 1.039-.358.659.358-.659Zm.539 3.255.529.532-.53-.532Zm-1.42 1.412-.53-.531.53.531Zm-1.326.67.07.747-.07-.747Zm-9.86-4.238.528-.532-.529.532ZM4.002 5.746l-.749.042.749-.042Zm6.474 1.451.53.532-.53-.532Zm.157-2.654.6-.449-.6.45ZM9.374 2.86l-.601.45.6-.45ZM6.26 2.575l.53.532-.53-.532Zm-1.57 1.56-.528-.531.529.532Zm7.372 7.362.529-.532-.529.532Zm4.566 2.394.456-.453-1.058-1.064-.455.453 1.058 1.064Zm1.986-.643 1.91 1.039.716-1.318-1.91-1.038-.716 1.317Zm2.278 3.103-1.42 1.413 1.057 1.063 1.42-1.412-1.057-1.064Zm-2.286 1.867c-1.45.136-5.201.015-9.263-4.023l-1.057 1.063c4.432 4.407 8.65 4.623 10.459 4.454l-.14-1.494Zm-9.263-4.023c-3.871-3.85-4.512-7.087-4.592-8.492l-1.498.085c.1 1.768.895 5.356 5.033 9.47l1.057-1.063Zm1.376-6.18.286-.286L9.95 6.666l-.287.285 1.057 1.063Zm.515-3.921L9.974 2.41l-1.201.899 1.26 1.684 1.202-.899ZM5.733 2.043l-1.57 1.56 1.058 1.064 1.57-1.56-1.058-1.064Zm4.458 5.44c-.53-.532-.53-.532-.53-.53h-.002l-.003.004a1.064 1.064 0 0 0-.127.157c-.054.08-.113.185-.163.318a2.099 2.099 0 0 0-.088 1.071c.134.865.73 2.008 2.256 3.526l1.058-1.064c-1.429-1.42-1.769-2.284-1.832-2.692-.03-.194.001-.29.01-.312.005-.014.007-.015 0-.006a.276.276 0 0 1-.03.039l-.01.01a.203.203 0 0 1-.01.009l-.53-.53Zm1.343 4.546c1.527 1.518 2.676 2.11 3.542 2.242.443.068.8.014 1.071-.087a1.536 1.536 0 0 0 .42-.236.923.923 0 0 0 .05-.045l.007-.006.003-.003.001-.002s.002-.001-.527-.533c-.53-.532-.528-.533-.528-.533l.002-.002.002-.002.006-.005.01-.01a.383.383 0 0 1 .038-.03c.01-.007.007-.004-.007.002-.025.009-.123.04-.32.01-.414-.064-1.284-.404-2.712-1.824l-1.058 1.064Zm-1.56-9.62C8.954 1.049 6.95.834 5.733 2.044L6.79 3.107c.532-.529 1.476-.475 1.983.202l1.2-.9ZM4.752 5.704c-.02-.346.139-.708.469-1.036L4.163 3.604c-.537.534-.96 1.29-.909 2.184l1.498-.085Zm14.72 12.06c-.274.274-.57.428-.865.455l.139 1.494c.735-.069 1.336-.44 1.784-.885l-1.058-1.063ZM11.006 7.73c.985-.979 1.058-2.527.229-3.635l-1.201.899c.403.539.343 1.246-.085 1.673l1.057 1.063Zm9.52 6.558c.817.444.944 1.49.367 2.064l1.058 1.064c1.34-1.333.927-3.557-.71-4.446l-.716 1.318Zm-3.441-.849c.384-.382 1.002-.476 1.53-.19l.716-1.317c-1.084-.59-2.428-.427-3.304.443l1.058 1.064Z" />
          </svg>
          <div class="flex flex-col">
            <span class="font-medium">Phone</span>
            <p class="text-sm">{{$user->nomor_telephone}}</p>
          </div>
        </div>

        <!-- Contact item -->
        <div class="flex gap-4 mt-4">
          <svg class="w-6 fill-slate-700" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <g>
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M12 18a6 6 0 1 0 0-12 6 6 0 0 0 0 12Zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8Z" />
              <path d="M18 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2Z" />
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M1.654 4.276C1 5.56 1 7.24 1 10.6v2.8c0 3.36 0 5.04.654 6.324a6 6 0 0 0 2.622 2.622C5.56 23 7.24 23 10.6 23h2.8c3.36 0 5.04 0 6.324-.654a6 6 0 0 0 2.622-2.622C23 18.44 23 16.76 23 13.4v-2.8c0-3.36 0-5.04-.654-6.324a6 6 0 0 0-2.622-2.622C18.44 1 16.76 1 13.4 1h-2.8c-3.36 0-5.04 0-6.324.654a6 6 0 0 0-2.622 2.622ZM13.4 3h-2.8c-1.713 0-2.878.002-3.778.075-.877.072-1.325.202-1.638.361a4 4 0 0 0-1.748 1.748c-.16.313-.29.761-.36 1.638C3.001 7.722 3 8.887 3 10.6v2.8c0 1.713.002 2.878.075 3.778.072.877.202 1.325.361 1.638a4 4 0 0 0 1.748 1.748c.313.16.761.29 1.638.36.9.074 2.065.076 3.778.076h2.8c1.713 0 2.878-.002 3.778-.075.877-.072 1.325-.202 1.638-.361a4 4 0 0 0 1.748-1.748c.16-.313.29-.761.36-1.638.074-.9.076-2.065.076-3.778v-2.8c0-1.713-.002-2.878-.075-3.778-.072-.877-.202-1.325-.361-1.638a4 4 0 0 0-1.748-1.748c-.313-.16-.761-.29-1.638-.36C16.278 3.001 15.113 3 13.4 3Z" />
            </g>
          </svg>
          <div class="flex flex-col">
            <span class="font-medium">Instagram</span>
            @if($user->instagram)
            <a class="text-sm hover:text-blueText block"
              href="{{ (strpos($user->instagram, 'http://') === 0 || strpos($user->instagram, 'https://') === 0) ? $user->instagram : 'https://' . $user->instagram }}"
              target="_blank">{{$user->instagram}}</a>
            @else
            <p class="text-sm">You haven't added your Instagram link</p>
            @endif
          </div>
        </div>

        <!-- Contact item -->
        <div class="flex gap-4 mt-4">
          <svg class="w-6 fill-slate-700" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <g>
              <path
                d="M6.5 8a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM5 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-8ZM11 19h1a1 1 0 0 0 1-1v-4.5c0-1.5 3-2.5 3-.5v5a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-6c0-2-1.5-3-3.5-3S13 10.5 13 10.5V10a1 1 0 0 0-1-1h-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1Z" />
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M20 1a3 3 0 0 1 3 3v16a3 3 0 0 1-3 3H4a3 3 0 0 1-3-3V4a3 3 0 0 1 3-3h16Zm0 2a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h16Z" />
            </g>
          </svg>
          <div class="flex flex-col">
            <span class="font-medium">Linkedin</span>
            @if($user->instagram)
            <a href="{{ (strpos($user->linkedIn, 'http://') === 0 || strpos($user->linkedIn, 'https://') === 0) ? $user->linkedIn : 'https://' . $user->linkedIn }}"
              class="text-sm block hover:text-blueText">{{$user->linkedIn}}</a>
            @else
            <p class="text-sm">You haven't added your LinkedIn link</p>
            @endif
          </div>
        </div>

        <button id="openModalSettingBtn"
          class="bg-blueBackground outline outline-1 outline-blueBorder hover:bg-button_hover2 text-blueText font-medium w-full mt-8 py-2 rounded-md">
          Settings
        </button>
      </div>

      <!-- Modal Settings Start -->
      <div id="modalSetting" class="hidden fixed inset-0 items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="w-4/5 md:max-w-4xl bg-white border-b-2 rounded-lg shadow-lg h-[70vh] max-h-[90vh] overflow-y-auto">
          <div class="flex items-center justify-between p-4 border-b-2">
            <h2 class="text-xl font-semibold">Settings</h2>
            <button id="closeModalSettingBtn" class="text-gray-600 hover:text-gray-900">
              <svg class="w-6" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M6.97 16.47a.75.75 0 1 0 1.06 1.06l-1.06-1.06Zm6.06-3.94a.75.75 0 1 0-1.06-1.06l1.06 1.06Zm-1.06-1.06a.75.75 0 1 0 1.06 1.06l-1.06-1.06Zm6.06-3.94a.75.75 0 0 0-1.06-1.06l1.06 1.06Zm-5 3.94a.75.75 0 1 0-1.06 1.06l1.06-1.06Zm3.94 6.06a.75.75 0 1 0 1.06-1.06l-1.06 1.06Zm-5-5a.75.75 0 1 0 1.06-1.06l-1.06 1.06ZM8.03 6.47a.75.75 0 0 0-1.06 1.06l1.06-1.06Zm0 11.06 5-5-1.06-1.06-5 5 1.06 1.06Zm5-5 5-5-1.06-1.06-5 5 1.06 1.06Zm-1.06 0 5 5 1.06-1.06-5-5-1.06 1.06Zm1.06-1.06-5-5-1.06 1.06 5 5 1.06-1.06Z"
                  fill="#000" />
              </svg>
            </button>
          </div>

          <div class="flex flex-col items-center md:flex-row md:items-start">
            <div class="">
              <ul class="flex justify-between sm:justify-evenly md:flex-col">
                <li>
                  <button id="profileBtn"
                    class="px-3 py-3 w-full text-left border-b-4 md:border-b-0 md:border-r-4 border-sky-600 bg-sky-100 hover:bg-sky-100">
                    Profile
                  </button>
                </li>
                <li>
                  <button id="contactBtn"
                    class="px-3 py-3 w-full text-left border-b-4 md:border-b-0 md:border-r-4 border-transparent hover:bg-sky-100">
                    Contact
                  </button>
                </li>
                <li>
                  <button id="accountBtn"
                    class="px-3 py-3 w-full text-left border-b-4 md:border-b-0 md:border-r-4 border-transparent hover:bg-sky-100">
                    Account
                  </button>
                </li>
              </ul>
            </div>
            <div class="w-4/5">
              <div id="profileContent"
                class="max-h-[50vh] md:max-h-[60vh] lg:max-h-[80vh] md:px-8 py-4 overflow-y-auto hide-scrollbar md:border-l-2">
                <div class="flex flex-col md:flex-row gap-4 items-center">
                  @if(!empty($user->foto_profile))
                  <img src="{{asset('storage/foto-profile/'.$user->foto_profile)}}" alt="profile user"
                    class="w-20 overflow-hidden rounded-full" />
                  @else
                  <img src="{{asset('img/logo-user.png')}}" alt="profile user" class="w-20 rounded-full" />
                  @endif
                  <div class="flex flex-col md:flex-row gap-4">
                    <form id="updateProfilePictureForm"
                      action="{{ route('user.edit-foto-profile-action', ['id' => $user->id]) }}" method="POST"
                      enctype="multipart/form-data">
                      @method('PUT')
                      @csrf
                      <input type="file" id="uploadPictureInput" name="foto_profile" accept="image/*"
                        style="display: none;">
                      <button type="button" id="changePictureBtn"
                        class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Change Picture
                      </button>
                    </form>
                    <button id="deletePictureBtn" type="button"
                      class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                      Delete Picture
                    </button>

                    <!-- Modal Alert Delete Picture Start-->
                    <div id="deleteModal"
                      class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full bg-black bg-opacity-50 items-center justify-center">
                      <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                        <h3 class="text-lg font-bold mb-4">
                          Are you sure?
                        </h3>
                        <p class="text-sm text-gray-600 mb-6">
                          Do you really want to delete this picture? This
                          process cannot be undone.
                        </p>
                        <div class="flex justify-end space-x-3">
                          <button id="cancelDeletePicture" type="button"
                            class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                            Cancel
                          </button>
                          <button id="confirmDeletePicture" type="button"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                            Yes, Delete
                          </button>
                        </div>
                      </div>
                    </div>
                    <!-- Modal Alert Delete Picture End -->
                  </div>
                </div>
                <form class="mt-8" action="{{ route('user.edit-profile-action', ['id' => $user->id]) }}" method="POST"
                  enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="grid gap-6 mb-6">
                    <div>
                      <label for="name" class="block mb-2 font-medium text-gray-900">Profile Name</label>
                      <input type="text" id="name" name="nama_user"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert your name" value="{{ old('user', $user->nama_user) }}" />
                    </div>
                    <div>
                      <label for="bioUser" class="block mb-2 font-medium text-gray-900">Bio</label>
                      <input type="text" id="bioUser" name="bio"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert your bio" value="{{ old('user', $user->bio) }}" />
                    </div>
                    <div>
                      <label for="genderUser" class="block mb-2 font-medium text-gray-900">Gender</label>
                      <select id="gender" name="gender"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert your gender" name="gender">
                        <option value="">Choose Gender</option>
                        @foreach($gender as $gender)
                        <option value="{{ $gender }}" @if(old('gender', $user->gender) == $gender) selected @endif>{{
                          ucfirst($gender) }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div>
                      <label for="ageUser" class="block mb-2 font-medium text-gray-900">Age</label>
                      <input type="text" id="ageUser" name="usia"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert your age" value="{{ old('user', $user->usia) }}" />
                    </div>
                    <div>
                      <label for="domisiliUser" class="block mb-2 font-medium text-gray-900">Domicile</label>
                      <input type="text" id="domisiliUser" name="domisili"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert your domicile" value="{{ old('user', $user->domisili) }}" />
                    </div>
                    <div>
                      <label for="pendidikanUser" class="block mb-2 font-medium text-gray-900">Last Education</label>
                      <select id="pendidikan_terakhir"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert your last education" name="pendidikan_terakhir">
                        <option value="">Choose Last Education</option>
                        @foreach($pendidikanTerakhir as $pendidikan)
                        <option value="{{ $pendidikan }}" @if(old('pendidikan', $user->pendidikan_terakhir) ==
                          $pendidikan) selected @endif>{{ ucfirst($pendidikan) }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div>
                      <label for="cvUser" class="block mb-2 font-medium text-gray-900 cursor-pointer">CV</label>
                      <input type="file" id="cvUser" name="cv"
                        class="w-full p-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block hover:cursor-pointer"
                        placeholder="Insert your bio" />
                    </div>
                    <div>
                      <label for="descriptionUser" class="block mb-2 font-medium text-gray-900">Description</label>
                      <textarea name="deskripsi" id="descriptionUser"
                        class="w-full h-52 lg:h-32 resize-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Tell about yourself">
                        {{ old('user', $user->deskripsi) }}</textarea>
                    </div>
                  </div>
                  <div class="flex justify-end">
                    <button type="submit"
                      class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                      Save Changes
                    </button>
                  </div>
                </form>
              </div>
              <div id="contactContent" class="hidden">
                <form class="md:p-8" action="{{ route('user.edit-contact-action', ['id' => $user->id]) }}"
                  method="POST">
                  @csrf
                  @method('PUT')
                  <div class="grid gap-6 mb-6">
                    <div>
                      <label for="emailUser" class="block mb-2 font-medium text-gray-900">Email</label>
                      <input type="email" id="emailUser"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert your Email" name="email_user"
                        value="{{ old('user', $user->email_user) }}" />
                    </div>
                    <div>
                      <label for="phone" class="block mb-2 font-medium text-gray-900">Phone</label>
                      <input type="text" id="phone"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert your phone number" name="nomor_telephone"
                        value="{{ old('user', $user->nomor_telephone) }}" />
                    </div>
                    <div>
                      <label for="instagramUser" class="block mb-2 font-medium text-gray-900">Instagram</label>
                      <input type="url" id="instagramUser"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert your instagram link" name="instagram"
                        value="{{ old('user', $user->instagram) }}" />
                    </div>
                    <div>
                      <label for="linkedInUser" class="block mb-2 font-medium text-gray-900">LinkedIn</label>
                      <input type="url" id="linkedInUser"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert your linkedIn link" name="linkedIn"
                        value="{{ old('user', $user->linkedIn) }}" />
                    </div>
                  </div>
                  <div class="flex justify-end">
                    <button type="submit"
                      class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                      Save Changes
                    </button>
                  </div>
                </form>
              </div>
              <div id="accountContent" class="hidden">
                <form class="md:p-8" action="{{ route('user.edit-akun-action', ['id' => $user->id]) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="grid gap-6 mb-6">
                    <div>
                      <label for="usernameUser" class="block mb-2 font-medium text-gray-900">Username</label>
                      <input type="text" id="usernameUser" name="username"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert your Email" value="{{ old('user', $user->username) }}" />
                    </div>
                    <div>
                      <label for="passwordUser" class="block mb-2 font-medium text-gray-900">Password</label>
                      <input type="password" id="passwordUser" name="password"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert your bio" value="{{ old('user', $user->password) }}" />
                    </div>
                  </div>
                  <div class="flex justify-end">
                    <button type="submit"
                      class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                      Save Changes
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Settings End -->
    </section>

    <!-- Activity, Right Content -->
    <section class="container mx-auto p-6 shadow-sm bg-white border border-slate-200 lg:rounded-xl lg:mt-8">
      <!-- Button Navigation Start -->
      <div class="max-w-sm mx-auto">
        <ul class="flex flex-wrap justify-between">
          <li>
            <button id="aboutBtn" class="focus:outline-none border-b-4 border-blue-500">
              About
            </button>
          </li>
          <li>
            <button id="appliedBtn" class="focus:outline-none border-b-4 border-transparent">
              Applied
            </button>
          </li>
        </ul>
      </div>
      <!-- Button Navigation End -->

      <div id="content" class="container">
        <div id="aboutContent" class="">
          <!-- Description & CV Start -->
          <div class="flex flex-col justify-between flex-1 lg:flex-row gap-4">
            <!-- Description Card Start -->
            <div class="mt-8 border border-slate-300 rounded-2xl lg:w-7/10">
              <div class="flex items-center justify-between border-b border-slate-300 py-2 px-3">
                <span class="text-lg font-semibold">Description</span>
              </div>
              @if($user->deskripsi)
              <div class="overflow-hidden px-3 pt-4 pb-4">
                <p class="text-base mt-2">
                  @if (strlen($user->deskripsi) > 200)
                  <span class="short-desc">{{ Str::limit($user->deskripsi, 200, '...') }}</span>
                  <span class="more-desc hidden">{{ $user->deskripsi }}</span>
                  <a href="javascript:void(0);"
                    class="text-[#5aa6cf] font-medium text-sm cursor-pointer no-underline hover:no-underline hover:font-semibold"
                    id="btn-more-desc">More</a>
                  @else
                  {{ $user->deskripsi }}
                  @endif
                </p>
              </div>
              @else
              <p class="font-medium text-center mt-8 mb-8">Description information is not available</p>
              @endif
            </div>
            <!-- CV Card Start -->
            <div class="lg:mt-8 border border-slate-300 rounded-2xl lg:w-2/6">
              <div class="flex justify-between p-4 items-center border-b border-slate-300 py-2 px-3">
                <span class="text-lg font-semibold">CV</span>
              </div>
              @if($user->cv)
              <div class="flex items-end gap-2 mt-2 lg:mt-0 p-4 overflow-hidden">
                <svg height="24px" width="24px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <path style="fill: #e2e5e7"
                      d="M128,0c-17.6,0-32,14.4-32,32v448c0,17.6,14.4,32,32,32h320c17.6,0,32-14.4,32-32V128L352,0H128z">
                    </path>
                    <path style="fill: #b0b7bd" d="M384,128h96L352,0v96C352,113.6,366.4,128,384,128z"></path>
                    <polygon style="fill: #cad1d8" points="480,224 384,128 480,128 "></polygon>
                    <path style="fill: #f15642"
                      d="M416,416c0,8.8-7.2,16-16,16H48c-8.8,0-16-7.2-16-16V256c0-8.8,7.2-16,16-16h352c8.8,0,16,7.2,16,16 V416z">
                    </path>
                    <g>
                      <path style="fill: #ffffff"
                        d="M101.744,303.152c0-4.224,3.328-8.832,8.688-8.832h29.552c16.64,0,31.616,11.136,31.616,32.48 c0,20.224-14.976,31.488-31.616,31.488h-21.36v16.896c0,5.632-3.584,8.816-8.192,8.816c-4.224,0-8.688-3.184-8.688-8.816V303.152z M118.624,310.432v31.872h21.36c8.576,0,15.36-7.568,15.36-15.504c0-8.944-6.784-16.368-15.36-16.368H118.624z">
                      </path>
                      <path style="fill: #ffffff"
                        d="M196.656,384c-4.224,0-8.832-2.304-8.832-7.92v-72.672c0-4.592,4.608-7.936,8.832-7.936h29.296 c58.464,0,57.184,88.528,1.152,88.528H196.656z M204.72,311.088V368.4h21.232c34.544,0,36.08-57.312,0-57.312H204.72z">
                      </path>
                      <path style="fill: #ffffff"
                        d="M303.872,312.112v20.336h32.624c4.608,0,9.216,4.608,9.216,9.072c0,4.224-4.608,7.68-9.216,7.68 h-32.624v26.864c0,4.48-3.184,7.92-7.664,7.92c-5.632,0-9.072-3.44-9.072-7.92v-72.672c0-4.592,3.456-7.936,9.072-7.936h44.912 c5.632,0,8.96,3.344,8.96,7.936c0,4.096-3.328,8.704-8.96,8.704h-37.248V312.112z">
                      </path>
                    </g>
                    <path style="fill: #cad1d8"
                      d="M400,432H96v16h304c8.8,0,16-7.2,16-16v-16C416,424.8,408.8,432,400,432z"></path>
                  </g>
                </svg>
                <a href="{{ asset('storage/cv/' . auth()->user()->cv) }}" target="_blank" class="block text-sm"
                  download>{{$user->cv}}</a>
              </div>
              @else
              <p class="font-medium text-center mt-8 mb-8">CV is not available</p>
              @endif
            </div>
          </div>
          <!-- Description and CV End -->

          <!-- Skill Start -->
          <div class="w-full mt-8 border border-slate-300 rounded-2xl">
            <div class="flex items-center justify-between border-b border-slate-300 py-2 px-3">
              <span class="text-lg font-semibold">Skill</span>
              <button id="openModalAddSkillBtn" class="flex items-center font-semibold py-2 px-4 rounded-lg">
                <svg class="w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6 12h12m-6-6v12" stroke="#000" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
                Add
              </button>
              <!-- Modal Add Skill Start -->
              <div id="skillModal"
                class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full bg-black bg-opacity-50 items-center justify-center">
                <div class="bg-white p-6 rounded-lg shadow-lg w-[80vw] md:w-[70vw] lg:w-[40vw]">
                  <div class="pb-2 flex items-center justify-between border-b-2">
                    <h2 class="text-xl font-semibold">Skill</h2>
                    <button id="closeModalSkillBtn" class="text-gray-600 hover:text-gray-900">
                      <svg class="w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M6.99486 7.00636C6.60433 7.39689 6.60433 8.03005 6.99486 8.42058L10.58 12.0057L6.99486 15.5909C6.60433 15.9814 6.60433 16.6146 6.99486 17.0051C7.38538 17.3956 8.01855 17.3956 8.40907 17.0051L11.9942 13.4199L15.5794 17.0051C15.9699 17.3956 16.6031 17.3956 16.9936 17.0051C17.3841 16.6146 17.3841 15.9814 16.9936 15.5909L13.4084 12.0057L16.9936 8.42059C17.3841 8.03007 17.3841 7.3969 16.9936 7.00638C16.603 6.61585 15.9699 6.61585 15.5794 7.00638L11.9942 10.5915L8.40907 7.00636C8.01855 6.61584 7.38538 6.61584 6.99486 7.00636Z"
                          fill="#0F0F0F" />
                      </svg>
                    </button>
                  </div>
                  <div class="mt-4 flex flex-wrap justify-evenly items-center gap-y-6">
                    <?php $no = 1 ?>
                    @foreach($user->skills as $skill)
                    <div class="relative max-w-56">
                      <span
                        class="block py-2 px-8 break-words text-white text-sm rounded-xl text-center bg-snippet">{{$skill->nama_skill}}</span>
                      <button id="deleteSkillBtn{{ $skill->id_skill }}"
                        class="deleteSkillBtn absolute -top-2 right-0 m-2" data-id-user="{{ $user->id }}"
                        data-id-skill="{{ $skill->id_skill }}">
                        <svg class="w-5 fill-white" viewBox="0 -0.5 25 25" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M6.97 16.47a.75.75 0 1 0 1.06 1.06l-1.06-1.06Zm6.06-3.94a.75.75 0 1 0-1.06-1.06l1.06 1.06Zm-1.06-1.06a.75.75 0 1 0 1.06 1.06l-1.06-1.06Zm6.06-3.94a.75.75 0 0 0-1.06-1.06l1.06 1.06Zm-5 3.94a.75.75 0 1 0-1.06 1.06l1.06-1.06Zm3.94 6.06a.75.75 0 1 0 1.06-1.06l-1.06 1.06Zm-5-5a.75.75 0 1 0 1.06-1.06l-1.06 1.06ZM8.03 6.47a.75.75 0 0 0-1.06 1.06l1.06-1.06Zm0 11.06 5-5-1.06-1.06-5 5 1.06 1.06Zm5-5 5-5-1.06-1.06-5 5 1.06 1.06Zm-1.06 0 5 5 1.06-1.06-5-5-1.06 1.06Zm1.06-1.06-5-5-1.06 1.06 5 5 1.06-1.06Z" />
                        </svg>
                      </button>
                    </div>
                    @endforeach
                  </div>
                  <!-- Modal Alert Delete Skill Start -->
                  <div id="deleteSkillAlert"
                    class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full bg-black bg-opacity-50 items-center justify-center">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                      <h3 class="text-lg font-bold mb-4">Are you sure?</h3>
                      <p class="text-sm text-gray-600 mb-6">
                        Do you really want to delete this skill? This
                        process cannot be undone.
                      </p>
                      <div class="flex justify-end space-x-3">
                        <button id="cancelDeleteSkillButton" type="button"
                          class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                          Cancel
                        </button>
                        @isset($skill)
                        <form id="confirmDeleteSkillButton" action="" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                            Yes, Delete
                          </button>
                        </form>
                        @endisset
                      </div>
                    </div>
                  </div>
                  <!-- Modal ALert Delete Skill End -->
                  <form action="{{ route('user.add-skill-action', ['id' => $user->id])}}" method="POST" class="mt-8">
                    @csrf
                    <input type="text" id="skill"
                      class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                      placeholder="Insert your skill" name="nama_skill" required />
                    <div class="mt-8 flex justify-end">
                      <button type="submit"
                        class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2">
                        Save Changes
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Modal Add Skill End -->
            </div>
            @if($user->skills->isNotEmpty())
            <div class="p-4 flex flex-wrap gap-2">
              <?php $no = 1 ?>
              @foreach($user->skills as $skill)
              <span
                class="bg-snippet text-white text-sm p-2 rounded-xl text-center break-words shrink-0 min-w-[100px] max-w-[300px] flex-grow">{{$skill->nama_skill}}</span>
              @endforeach
            </div>
            @else
            <p class="font-medium text-center mt-8 mb-8">Skill information is not available</p>
            @endif
          </div>
          <!-- Skill End -->

          <!-- Experience Start -->
          <div class="w-full mt-8 border border-slate-300 rounded-2xl">
            <div class="flex items-center justify-between border-b border-slate-300 py-2 px-3">
              <span class="text-lg font-semibold">Experience</span>
              <button id="addExperienceBtn" class="flex items-center font-semibold py-2 px-4 rounded-lg">
                <svg class="w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6 12h12m-6-6v12" stroke="#000" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
                Add
              </button>
            </div>
            @if($user->experiences->isNotEmpty())
            <?php $no = 1 ?>
            @foreach($user->experiences as $experience)
            <div class="rounded-2xl m-4 flex">
              <div class="">
                <div class="flex items-center gap-4 px-4 pb-2">
                  <div class="overflow-hidden">
                    <h2 class="text-lg font-semibold line-clamp-2">
                      {{$experience->judul_kegiatan}}
                    </h2>
                    <p class="text-sm">{{$experience->mitra}}</p>
                  </div>
                </div>
                <div class="max-h-32 overflow-hidden">
                  <p class="text-sm text-gray-700 line-clamp-2 px-4">
                    @if (strlen($experience->deskripsi) > 100)
                    <span class="short-desc">{{ Str::limit($experience->deskripsi, 100, '...') }}</span>
                    <span class="more-desc hidden">{{ $experience->deskripsi }}</span>
                    <a href="javascript:void(0);"
                      class="btn-more-desc-exp text-[#5aa6cf] font-medium text-sm cursor-pointer no-underline hover:no-underline hover:font-semibold">More</a>
                    @else
                    {{ $experience->deskripsi }}
                    @endif
                  </p>
                  {{-- <button class="px-4">More</button> --}}
                </div>
              </div>
              <div class="">
                <button id="editExperienceBtn{{ $experience->id_experience }}" class="edit-experience-btn"
                  data-id-experience="{{ $experience->id_experience }}" data-id="{{ $user->id }}"
                  data-judul-kegiatan="{{$experience->judul_kegiatan}}" data-mitra="{{$experience->mitra}}"
                  data-lokasi-kegiatan="{{$experience->lokasi_kegiatan}}" data-tgl-mulai="{{$experience->tgl_mulai}}"
                  data-tgl-selesai="{{$experience->tgl_selesai}}" data-deskripsi="{{$experience->deskripsi}}">
                  <svg class="w-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                      <path
                        d="m21.28 6.4-9.54 9.54c-.95.95-3.77 1.39-4.4.76-.63-.63-.2-3.45.75-4.4l9.55-9.55a2.58 2.58 0 1 1 3.64 3.65v0Z" />
                      <path d="M11 4H6a4 4 0 0 0-4 4v10a4 4 0 0 0 4 4h11c2.21 0 3-1.8 3-4v-5" />
                    </g>
                  </svg>
                </button>
              </div>
            </div>
            <!-- Modal Edit Experience Start -->
            <div id="editExperienceModal"
              class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full bg-black bg-opacity-50 items-center justify-center">
              <div class="bg-white p-6 rounded-lg shadow-lg w-[80vw] md:w-[70vw] lg:w-[40vw]">
                <div class="pb-2 flex items-center justify-between border-b-2">
                  <h2 class="text-xl font-semibold">Edit Experience</h2>
                  <button id="closeModalExperienceBtn" class="text-gray-600 hover:text-gray-900">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M6.99486 7.00636C6.60433 7.39689 6.60433 8.03005 6.99486 8.42058L10.58 12.0057L6.99486 15.5909C6.60433 15.9814 6.60433 16.6146 6.99486 17.0051C7.38538 17.3956 8.01855 17.3956 8.40907 17.0051L11.9942 13.4199L15.5794 17.0051C15.9699 17.3956 16.6031 17.3956 16.9936 17.0051C17.3841 16.6146 17.3841 15.9814 16.9936 15.5909L13.4084 12.0057L16.9936 8.42059C17.3841 8.03007 17.3841 7.3969 16.9936 7.00638C16.603 6.61585 15.9699 6.61585 15.5794 7.00638L11.9942 10.5915L8.40907 7.00636C8.01855 6.61584 7.38538 6.61584 6.99486 7.00636Z"
                        fill="#0F0F0F" />
                    </svg>
                  </button>
                </div>
                <form id="editExperienceAction" action="" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="mt-6 space-y-4 p-2 overflow-y-auto lg:grid lg:grid-cols-2 lg:gap-6 lg:space-y-0">
                    <div class="mt-1">
                      <label for="activity-name" class="block mb-2 font-medium text-gray-900">Activity Name</label>
                      <input type="text" id="activityName" name="judul_kegiatan"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert activity name" required />
                    </div>
                    <div class="mt-1">
                      <label for="partner-activity" class="block mb-2 font-medium text-gray-900">Company</label>
                      <input type="text" id="company" name="mitra"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert company name" required />
                    </div>
                    <div class="mt-1">
                      <label for="partner-activity" class="block mb-2 font-medium text-gray-900">Location</label>
                      <input type="text" id="location" name="lokasi_kegiatan"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert location" />
                    </div>
                    <div class="mt-1">
                      <label for="partner-activity" class="block mb-2 font-medium text-gray-900">Start Date</label>
                      <input type="date" id="startDate" name="tgl_mulai"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert start date" required />
                    </div>
                    <div class="mt-1">
                      <label for="partner-activity" class="block mb-2 font-medium text-gray-900">End Date</label>
                      <input type="date" id="endData" name="tgl_selesai"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert end date" required />
                    </div>
                  </div>
                  <div class="mt-1">
                    <label for="description" class="block mb-2 font-medium text-gray-900">Description</label>
                    <textarea id="description" name="deskripsi"
                      class="w-full h-52 lg:h-32 resize-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                      placeholder="Tell about activity" required>
                    </textarea>
                  </div>
                  <div class="mt-8 flex justify-end">
                    <button type="submit"
                      class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                      Update
                    </button>
                  </div>
                </form>
                <button id="delete-experience-btn{{ $experience->id_experience }}" data-id="{{ $user->id }}"
                  data-id-experience="{{ $experience->id_experience }}" type="submit"
                  class="delete-experience-btn text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                  Delete
                </button>
              </div>
            </div>
            <!-- Modal Edit Experience End -->
            <!-- Modal Alert Delete Experience Start -->
            <div id="deleteExperienceAlert"
              class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full bg-black bg-opacity-50 items-center justify-center">
              <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h3 class="text-lg font-bold mb-4">Are you sure?</h3>
                <p class="text-sm text-gray-600 mb-6">
                  Do you really want to delete this picture? This process
                  cannot be undone.
                </p>
                <div class="flex justify-end space-x-3">
                  <button id="cancelDeleteExperience" type="button"
                    class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    Cancel
                  </button>
                  <form id="confirmDeleteExperience" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                      class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                      Yes, Delete
                    </button>
                  </form>
                </div>
              </div>
            </div>
            <!-- Modal Alert Delete Experience End -->
            @endforeach
            @else
            <p class="font-medium text-center mt-8 mb-8">Experience information is not available</p>
            @endif
            <!-- Modal Add Experience Start -->
            <div id="addExperienceModal"
              class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full bg-black bg-opacity-50 items-center justify-center">
              <div class="bg-white p-6 rounded-lg shadow-lg w-[80vw] md:w-[70vw] lg:w-[40vw]">
                <div class="pb-2 flex items-center justify-between border-b-2">
                  <h2 class="text-xl font-semibold">Add Experience</h2>
                  <button id="closeAddModalExperienceBtn" class="text-gray-600 hover:text-gray-900">
                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M6.99486 7.00636C6.60433 7.39689 6.60433 8.03005 6.99486 8.42058L10.58 12.0057L6.99486 15.5909C6.60433 15.9814 6.60433 16.6146 6.99486 17.0051C7.38538 17.3956 8.01855 17.3956 8.40907 17.0051L11.9942 13.4199L15.5794 17.0051C15.9699 17.3956 16.6031 17.3956 16.9936 17.0051C17.3841 16.6146 17.3841 15.9814 16.9936 15.5909L13.4084 12.0057L16.9936 8.42059C17.3841 8.03007 17.3841 7.3969 16.9936 7.00638C16.603 6.61585 15.9699 6.61585 15.5794 7.00638L11.9942 10.5915L8.40907 7.00636C8.01855 6.61584 7.38538 6.61584 6.99486 7.00636Z"
                        fill="#0F0F0F" />
                    </svg>
                  </button>
                </div>
                <form action="{{ route ('user.add-experience-action', ['id' => $user->id]) }}" method="POST" class="">
                  @csrf
                  <div class="mt-6 space-y-4 p-2 overflow-y-auto lg:grid lg:grid-cols-2 lg:gap-6 lg:space-y-0">
                    <div class=" mt-1">
                      <label for="activity-name" class="block mb-2 font-medium text-gray-900">Activity Name</label>
                      <input type="text" id="activityName" name="judul_kegiatan"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert activity name" required />
                    </div>
                    <div class="mt-1">
                      <label for="partner-activity" class="block mb-2 font-medium text-gray-900">Company</label>
                      <input type="text" id="partnerActivity" name="mitra"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert company name" required />
                    </div>
                    <div class="mt-1">
                      <label for="partner-activity" class="block mb-2 font-medium text-gray-900">Location</label>
                      <input type="text" id="partnerActivity" name="lokasi_kegiatan"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert location" />
                    </div>
                    <div class="mt-1">
                      <label for="partner-activity" class="block mb-2 font-medium text-gray-900">Start Date</label>
                      <input type="date" id="partnerActivity" name="tgl_mulai"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert start date" required />
                    </div>
                    <div class="mt-1">
                      <label for="partner-activity" class="block mb-2 font-medium text-gray-900">End Date</label>
                      <input type="date" id="partnerActivity" name="tgl_selesai"
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                        placeholder="Insert end date" />
                    </div>
                  </div>
                  <div class="p-2 mt-1">
                    <label for="description" class="block mb-2 font-medium text-gray-900">Description</label>
                    <textarea id="description" name="deskripsi"
                      class="w-full h-52 lg:h-32 resize-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                      placeholder="Tell about activity" required>
                      </textarea>
                  </div>
                  <div class="mt-8 flex justify-end">
                    <button type="submit"
                      class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                      Add
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <!-- Modal Add Experience End -->
          </div>
          <!-- Experience End -->
        </div>
      </div>
      <div id="appliedContent" class="hidden container mt-8">
        @if(isset($user->pendaftars) && $user->pendaftars->isNotEmpty())
        <?php $no = 1 ?>
        @foreach($user->pendaftars as $pendaftar)
        <div class="border border-slate-300 rounded-2xl">
          <div class="flex items-center gap-4 p-4">
            <img src="{{asset('storage/logo/'.$pendaftar->kegiatan->mitra->logo)}}" alt="" class="w-16 rounded-full" />
            <div class="overflow-hidden">
              <h2 class="text-xl font-semibold line-clamp-2">
                {{$pendaftar->kegiatan->nama_kegiatan}}
              </h2>
              <p class="text-sm">Mitra VolHub</p>
            </div>
          </div>
          <div class="mt-4 max-h-32 overflow-hidden">
            <p class="text-sm text-gray-700 line-clamp-3 px-4">
              {{ $pendaftar->kegiatan->deskripsi }}
            </p>
          </div>
          <div class="mt-4 flex flex-wrap justify-evenly gap-2 px-4">
            <span class="
                      font-medium text-sm p-2 rounded-xl flex-1 text-center
                      @if($pendaftar->status_applicant === 'In-review') border border-sky-500 text-sky-500 bg-sky-50 
                      @elseif($pendaftar->status_applicant === 'Interview') border border-violet-500 text-violet-500 bg-violet-50 
                      @elseif($pendaftar->status_applicant === 'Shortlist') border border-amber-500 text-amber-500 bg-amber-50 
                      @elseif($pendaftar->status_applicant === 'Hire') border border-emerald-500 text-emerald-500 bg-emerald-50 
                      @elseif($pendaftar->status_applicant === 'Reject') border border-rose-500 text-rose-500 bg-rose-50 
                      @else bg-gray-500 text-white border-gray-600 
                      @endif
                  ">
              {{ $pendaftar->status_applicant }}
            </span>
          </div>
          <div class="mt-8 border-t border-gray-200">
            <div class="flex items-center pt-2 px-4 pb-2 gap-2">
              <!-- SVG disembunyikan -->
              <span class="text-sm text-gray-700">{{ $pendaftar->kegiatan->lokasi_kegiatan }}</span>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <div class="flex items-center justify-center h-screen">
          <p class="text-gray-500 text-center">You have not applied for any activities yet.</p>
        </div>
        @endif
      </div>
    </section>
  </div>
</main>