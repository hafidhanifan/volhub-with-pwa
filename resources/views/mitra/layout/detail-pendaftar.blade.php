@include('mitra.layout.templates.header')
@include('mitra.layout.templates.sidebar')

<!-- Content Start -->
<section class="flex flex-col w-full md:flex-row md:bg-gray-100 md:px-10 md:pt-8 lg:h-screen">
  <div class="p-4 md:mt-4">
    <h1 class="text-lg font-semibold">Registrant information</h1>
    <div
      class="mt-4 md:border md:p-8 md:bg-white md:max-w-80 md:rounded-lg md:h-[calc(100vh-120px)] lg:h-[calc(100vh-120px)] lg:overflow-y-auto">
      <div class="flex items-center gap-4">
        <img src="{{asset('storage/foto-profile/'.$pendaftar->user->foto_profile)}}" alt="Profile Image"
          class="max-w-20" />
        <div class="">
          <h2 class="">{{$pendaftar->user->nama_user}}</h2>
          <p class="line-clamp-2 text-sm text-gray-500">
            {{$pendaftar->user->bio}}
          </p>
        </div>
      </div>
      <div class="mt-4 p-4 rounded-md border-2 border-sky-200 bg-sky-50">
        <div class="flex justify-between py-2">
          <span class="text-xs font-normal">Applied Volunteer</span>
          <span class="text-xs text-gray-500">{{ $daysAgo }} ago</span>
        </div>
        <div class="border my-2"></div>
        <p class="font-semibold text-sm">
          {{$pendaftar->kegiatan->nama_kegiatan}}
        </p>
      </div>
      <div class="mt-4 flex gap-2">
        <button class="w-3/4 py-2 border-2 border-sky-200 rounded-md bg-sky-50"
          data-applicant-id="{{ $pendaftar->id_pendaftar }}" data-target="interview"
          style="{{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'color: gray; opacity: 0.5; pointer-events: none;' : '' }}"
          @if (in_array($pendaftar->status_applicant, ['Hire', 'Reject'])) disabled @endif>
          {{ in_array($pendaftar->status_applicant, ['Hire', 'Reject']) ? 'Scheduled' : 'Schedule' }}
        </button>
        <button class="w-1/4 py-2 border-2 border-sky-200 rounded-md flex justify-center bg-sky-50">
          <svg class="w-8 stroke-sky-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M7 4a4 4 0 0 0-4 4v5.264a4 4 0 0 0 4 4V19.9a.1.1 0 0 0 .162.078l3.438-2.714H17a4 4 0 0 0 4-4V8a4 4 0 0 0-4-4H7Z"
              stroke-width="2" stroke-linecap="round" />
            <path
              d="M9 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM13 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM17 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"
              fill="#000" />
          </svg>
        </button>
      </div>
      <div class="border my-4"></div>
      <div class="mb-2">
        <h3 class="font-semibold">Contact</h3>
      </div>
      <div class="flex flex-col gap-4">
        <div class="flex gap-5 items-start">
          <svg class="w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M3.75 5.25 3 6v12l.75.75h16.5L21 18V6l-.75-.75H3.75Zm.75 2.446v9.554h15V7.695L12 14.514 4.5 7.696Zm13.81-.946H5.69L12 12.486l6.31-5.736Z"
              fill="#080341" />
          </svg>
          <div class="">
            <span class="text-gray-500 font-semibold">Email</span>
            <p class="font-semibold">{{$pendaftar->user->email_user}}</p>
          </div>
        </div>
        <div class="flex gap-5 items-start">
          <svg class="w-8" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M5.733 2.043c1.217-1.21 3.221-.995 4.24.367l1.262 1.684c.83 1.108.756 2.656-.229 3.635l-.238.238a.653.653 0 0 0-.008.306c.063.408.404 1.272 1.832 2.692 1.428 1.42 2.298 1.76 2.712 1.824a.668.668 0 0 0 .315-.009l.408-.406c.876-.87 2.22-1.033 3.304-.444l1.91 1.04c1.637.888 2.05 3.112.71 4.445l-1.421 1.412c-.448.445-1.05.816-1.784.885-1.81.169-6.027-.047-10.46-4.454-4.137-4.114-4.931-7.702-5.032-9.47l.749-.042-.749.042c-.05-.894.372-1.65.91-2.184l1.569-1.561Zm3.04 1.266c-.507-.677-1.451-.731-1.983-.202l-1.57 1.56c-.33.328-.488.69-.468 1.036.08 1.405.72 4.642 4.592 8.492 4.062 4.038 7.813 4.159 9.263 4.023.296-.027.59-.181.865-.454l1.42-1.413c.578-.574.451-1.62-.367-2.064l-1.91-1.039c-.528-.286-1.146-.192-1.53.19l-.455.453-.53-.532c.53.532.529.533.528.533l-.001.002-.003.003-.007.006-.015.014a1.11 1.11 0 0 1-.136.106c-.08.053-.186.112-.319.161-.27.101-.628.155-1.07.087-.867-.133-2.016-.724-3.543-2.242-1.526-1.518-2.122-2.66-2.256-3.526-.069-.442-.014-.8.088-1.07a1.527 1.527 0 0 1 .238-.42l.032-.035.014-.015.006-.006.003-.003.002-.002.53.53-.53-.531.288-.285c.428-.427.488-1.134.085-1.673L8.773 3.309Z"
              fill="#000" />
          </svg>
          <div class="">
            <span class="text-gray-500 font-semibold">Phone</span>
            <p class="font-semibold">{{$pendaftar->user->nomor_telephone}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Border, md screen is hidden (start)-->
  <div class="border my-6 mx-4 md:hidden"></div>
  <!-- Border, md screen is hidden (end) -->

  <div
    class="px-4 md:border md:bg-white md:mt-[76px] md:rounded-lg md:p-8 md:w-3/4 md:h-[calc(100vh-120px)] lg:h-[calc(100vh-120px)] md:overflow-y-auto">
    <div id="tabRegistrationContainer" class="flex justify-between md:justify-normal md:gap-12 md:mb-8">
      <a data-target="applicantProfileContent"
        class="tab-btn font-semibold text-gray-500 pb-1 relative after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-1 after:w-0 after:bg-sky-500 after:rounded-lg after:transition-all after:duration-300 hover:after:w-full">
        Applicant Profile
      </a>

      <a data-target="hiringProgressContent"
        class="tab-btn font-semibold text-gray-500 pb-1 relative after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-1 after:w-0 after:bg-sky-500 after:rounded-lg after:transition-all after:duration-300 hover:after:w-full">
        Hiring Progress
      </a>
    </div>
    <!-- Applicant Profile Content Start -->
    <div id="applicantProfileContent" class="tab-content mt-4 w-full">
      <div class="border rounded-lg">
        <div class="flex justify-between items-start p-4 border-b">
          <span class="max-w-64 font-semibold">{{$pendaftar->user->nama_user}}</span>
          <svg class="w-6" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="none">
            <path fill="#0A66C2"
              d="M12.225 12.225h-1.778V9.44c0-.664-.012-1.519-.925-1.519-.926 0-1.068.724-1.068 1.47v2.834H6.676V6.498h1.707v.783h.024c.348-.594.996-.95 1.684-.925 1.802 0 2.135 1.185 2.135 2.728l-.001 3.14zM4.67 5.715a1.037 1.037 0 0 1-1.032-1.031c0-.566.466-1.032 1.032-1.032.566 0 1.031.466 1.032 1.032 0 .566-.466 1.032-1.032 1.032zm.889 6.51h-1.78V6.498h1.78v5.727zM13.11 2H2.885A.88.88 0 0 0 2 2.866v10.268a.88.88 0 0 0 .885.866h10.226a.882.882 0 0 0 .889-.866V2.865a.88.88 0 0 0-.889-.864z" />
          </svg>
        </div>
        <div class="p-4">
          <span class="text-gray-500">Email</span>
          <div class="flex gap-3">
            <p id="text-to-copy" class="font-semibold">{{$pendaftar->user->email_user}}</p>
            <button id="copy-button">
              <svg class="w-5 fill-sky-400" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M19.53 8 14 2.47a.75.75 0 0 0-.53-.22H11A2.75 2.75 0 0 0 8.25 5v1.25H7A2.75 2.75 0 0 0 4.25 9v10A2.75 2.75 0 0 0 7 21.75h7A2.75 2.75 0 0 0 16.75 19v-1.25H17A2.75 2.75 0 0 0 19.75 15V8.5a.75.75 0 0 0-.22-.5Zm-5.28-3.19 2.94 2.94h-2.94V4.81Zm1 14.19A1.25 1.25 0 0 1 14 20.25H7A1.25 1.25 0 0 1 5.75 19V9A1.25 1.25 0 0 1 7 7.75h1.25V15A2.75 2.75 0 0 0 11 17.75h4.25V19ZM17 16.25h-6A1.25 1.25 0 0 1 9.75 15V5A1.25 1.25 0 0 1 11 3.75h1.75V8.5a.76.76 0 0 0 .75.75h4.75V15A1.25 1.25 0 0 1 17 16.25Z" />
              </svg>
            </button>
          </div>
        </div>
      </div>
      <div class="mt-4 border rounded-lg">
        <div class="border-b p-4">
          <span class="font-semibold">About</span>
        </div>
        <p class="p-4 text-justify text-sm max-h-[7.5rem] line-clamp-5 overflow-hidden transition-all duration-300">
          @if (strlen($pendaftar->user->deskripsi) > 200)
          <span class="short-desc">{{ Str::limit($pendaftar->user->deskripsi, 200, '...') }}</span>
          <span class="more-desc hidden">{{ $pendaftar->user->deskripsi }}</span>
          <a href="javascript:void(0);"
            class="text-[#5aa6cf] font-medium text-sm cursor-pointer no-underline hover:no-underline hover:font-semibold"
            id="btn-more-desc">More</a>
          @else
          {{ $pendaftar->user->deskripsi }}
          @endif
        </p>
      </div>
      <div class="mt-4 border rounded-lg">
        <div class="border-b p-4">
          <span class="font-semibold">Skill</span>
        </div>
        <div class="p-4 flex flex-wrap gap-2">
          @if($pendaftar->user->skills->isEmpty())
          <div class="flex items-start gap-4">
            <div class="mb-4">
              <p class="font-small text-sm line-clamp-2">
                The applicant has no skill data.
              </p>
            </div>
          </div>
          @else
          @foreach($pendaftar->user->skills as $skill)
          <span
            class="bg-snippet text-white text-sm p-2 rounded-xl text-center break-words shrink-0 min-w-[100px] max-w-[300px] flex-grow">
            {{$skill->nama_skill}}
          </span>
          @endforeach
          @endif
        </div>
      </div>
      <div class="mt-4 border rounded-lg">
        <div class="border-b p-4">
          <span class="font-semibold">Experience</span>
        </div>
        <div id="userExperienceContainer" class="p-4">
          @if($pendaftar->user->experiences->isEmpty())
          <div class="flex items-start gap-4">
            <div class="mb-4">
              <p class="font-small text-sm line-clamp-2">
                The applicant has no experience data.
              </p>
            </div>
          </div>
          @else
          @foreach($pendaftar->user->experiences as $experience)
          <div class="flex items-start gap-4">
            <div class="mb-4">
              <p class="font-semibold line-clamp-2">
                {{$experience->judul_kegiatan}}
              </p>
              <p class="text-gray-500 text-sm">{{$experience->mitra}}</p>
              <p class="line-clamp-1 text-sm text-gray-500">
                @if (strlen($experience->deskripsi) > 50)
                <span class="short-desc">{{ Str::limit($experience->deskripsi, 50, '...') }}</span>
                <span class="more-desc hidden">{{ $experience->deskripsi }}</span>
                <a href="javascript:void(0);"
                  class="text-[#5aa6cf] font-medium text-sm cursor-pointer no-underline hover:no-underline hover:font-semibold"
                  id="btn-more-desc-exp">More</a>
                @else
                {{ $experience->deskripsi }}
                @endif
              </p>
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </div>
    <!-- Applicant Profile Content End -->

    <!-- Applicant Hiring Progress Start -->
    <div id="hiringProgressContent" class="tab-content hidden p-4 w-full">
      <div class="w-full">
        <h3 class="font-semibold">Current Stage</h3>
        <div id="currentStageContainer"
          class="button_menu_hiring_stage w-full mt-2 overflow-x-auto flex scrollbar-hide lg:grid lg:grid-cols-4">
          <a data-target="inReview" id="inReviewBtn"
            class="current-stage-button flex-shrink-0 px-4 py-2 cursor-pointer font-medium border-l-2 border-t-2 border-r-2 text-currentStageFont border-b-2 border-currentStageBorder hover:bg-currentStageBg hover:border-currentStageBorderHover">
            In-review
          </a>
          <a data-target="shortlisted"
            class="current-stage-button flex-shrink-0 px-4 py-2 cursor-pointer font-medium border-t-2 border-r-2 border-b-2 text-currentStageFont border-currentStageBorder hover:bg-currentStageBg hover:border-currentStageBorderHover">
            Shortlisted
          </a>
          <a data-target="interviewContent"
            class="current-stage-button flex-shrink-0 px-4 py-2 cursor-pointer font-medium border-t-2 border-r-2 border-b-2 text-currentStageFont border-currentStageBorder hover:bg-currentStageBg hover:border-currentStageBorderHover">
            Interview
          </a>
          <a data-target="hiredRejectContent"
            class="current-stage-button flex-shrink-0 px-4 py-2 cursor-pointer font-medium border-t-2 border-r-2 border-b-2 text-currentStageFont border-currentStageBorder hover:bg-currentStageBg hover:border-currentStageBorderHover">
            Hired / Reject
          </a>
        </div>

        <div class="currentStageContent w-full">
          <div id="inReview" class="current-stage-content hidden w-full">
            <!-- In-riview content start-->
            <div class="mt-4">
              <h4 class="font-semibold text-gray-500">Stage Info</h4>
              <div class="mt-4 flex flex-col gap-4">
                <div class="border rounded-lg">
                  <span class="block p-4 border-b font-semibold">Motivation</span>
                  <p class="p-4 text-sm text-justify">{{$pendaftar->motivasi}}</p>
                </div>

                <div class="border rounded-lg">
                  <span class="block p-4 border-b font-semibold">Curriculum Vitae</span>
                  <div class="p-4 flex gap-2 items-center">
                    <span class="text-sm">Lorem ipsum dolor sit amet.</span>
                  </div>
                </div>
              </div>
              <div class="mt-12 flex gap-4 w-full overflow-x-auto scrollbar-hide md:justify-between">
                <div class="flex gap-4">
                  <button class="w-32 rounded-sm py-2 cursor-pointer border border-sky-500 text-sky-500 bg-sky-50">
                    Shortlist
                  </button>
                  <button
                    class="w-32 rounded-sm py-2 cursor-pointer border border-emerald-500 text-emerald-500 bg-emerald-50">
                    Hire
                  </button>
                </div>
                <div>
                  <button class="w-32 rounded-sm py-2 cursor-pointer border border-rose-500 text-rose-500 bg-rose-50">
                    Reject
                  </button>
                </div>
              </div>
              <!-- In-riview content end-->
            </div>
          </div>
          <div id="shortlisted" class="current-stage-content hidden">
            <div class="mt-4 w-full">
              <h4 class="font-semibold text-gray-500">Stage Info</h4>
              <p class="mt-4 w-full">This applicant is not in Shortlist.</p>
            </div>
            <div class="mt-12 flex gap-4 w-full overflow-x-auto scrollbar-hide md:justify-between">
              <div class="flex gap-4">
                <button class="w-32 rounded-sm py-2 cursor-pointer border border-sky-500 text-sky-500 bg-sky-50">
                  Shortlist
                </button>
                <button
                  class="w-32 rounded-sm py-2 cursor-pointer border border-emerald-500 text-emerald-500 bg-emerald-50">
                  Hire
                </button>
              </div>
              <div>
                <button class="w-32 rounded-sm py-2 cursor-pointer border border-rose-500 text-rose-500 bg-rose-50">
                  Reject
                </button>
              </div>
            </div>
          </div>
          <div id="interviewContent" class="current-stage-content hidden">
            <div class="mt-4 w-full">
              <h4 class="font-semibold text-gray-500">Stage Info</h4>
              <div class="mt-4 flex flex-col justify-between lg:flex-row">
                <div class="flex flex-col">
                  <span class="block text-gray-500">Interview Date</span>
                  <p class="py-1">32 December 2024</p>
                </div>
                <div class="flex flex-col mt-6 lg:mt-0">
                  <span class="block text-gray-500 lg:px-2">Interview Status</span>
                  <span
                    class="block w-fit px-2 py-1 text-sm font-semibold rounded-xl border border-emerald-500 text-emerald-500 bg-emerald-50">Interview
                    Completed</span>
                </div>
              </div>
              <div class="mt-6">
                <span class="text-gray-500">Interview Location</span>
                <p>Jl. Pogung Lor, Mlati, Sleman, Yogyakarta, Indonesia</p>
              </div>
              <div class="mt-12 flex gap-4 w-full overflow-x-auto scrollbar-hide justify-between">
                <div>
                  <button
                    class="w-32 rounded-sm py-2 cursor-pointer border border-emerald-500 text-emerald-500 bg-emerald-50">
                    Hire
                  </button>
                </div>
                <div>
                  <button class="w-32 rounded-sm py-2 cursor-pointer border border-rose-500 text-rose-500 bg-rose-50">
                    Reject
                  </button>
                </div>
              </div>
              <div class="border my-6"></div>
              <div class="flex justify-between">
                <h4 class="font-semibold text-gray-500">Note</h4>
                {{--<button class="flex gap-2 items-center text-sky-600">
                  <svg class="w-5 stroke-sky-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M20.15 7.94 8.28 19.81c-1.06 1.07-4.23 1.56-4.95.85-.72-.71-.21-3.88.85-4.95L16.05 3.84a2.9 2.9 0 0 1 4.1 4.1v0Z"
                      stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>Update Note</button> --}}

                <button id="addNoteModalBtn" class="flex items-center text-sky-600">
                  <svg class="w-5 stroke-sky-600" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 12h12m-6-6v12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>Add Note</button>
              </div>

              {{-- Modal add / update note start --}}
              <div id="addNoteModal"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="bg-white rounded-lg w-4/5 p-6 relative lg:max-w-md">
                  <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg font-bold">Add Note</h2>
                    <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700">
                      <svg class="w-6" viewBox="0 -0.5 25 25" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M6.97 16.47a.75.75 0 1 0 1.06 1.06l-1.06-1.06Zm6.06-3.94a.75.75 0 1 0-1.06-1.06l1.06 1.06Zm-1.06-1.06a.75.75 0 1 0 1.06 1.06l-1.06-1.06Zm6.06-3.94a.75.75 0 0 0-1.06-1.06l1.06 1.06Zm-5 3.94a.75.75 0 1 0-1.06 1.06l1.06-1.06Zm3.94 6.06a.75.75 0 1 0 1.06-1.06l-1.06 1.06Zm-5-5a.75.75 0 1 0 1.06-1.06l-1.06 1.06ZM8.03 6.47a.75.75 0 0 0-1.06 1.06l1.06-1.06Zm0 11.06 5-5-1.06-1.06-5 5 1.06 1.06Zm5-5 5-5-1.06-1.06-5 5 1.06 1.06Zm-1.06 0 5 5 1.06-1.06-5-5-1.06 1.06Zm1.06-1.06-5-5-1.06 1.06 5 5 1.06-1.06Z" />
                      </svg>
                    </button>
                  </div>
                  <form id="addNoteForm">
                    <div class="mb-4">
                      <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                      <input type="date" id="date" name="date"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500">
                    </div>
                    <div class="mb-4">
                      <label for="note" class="block text-sm font-medium text-gray-700">Note</label>
                      <textarea id="note" name="note" rows="4"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-sky-500 focus:border-sky-500"></textarea>
                    </div>
                    <div class="flex w-full justify-end">
                      <button type="submit"
                        class="w-fit bg-sky-500 text-white py-2 px-2 rounded-md hover:bg-sky-600">Add New
                        Note</button>
                    </div>
                  </form>
                </div>
              </div>
              {{-- Modal add / update note end --}}

              <div class="border rounded-lg mt-4 p-4">
                <div class="flex flex-col gap-2 md:flex-row md:gap-0 md:justify-between">
                  <div class="flex gap-2">
                    <svg class="w-5 stroke-gray-500" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M19.82 14H15.6c-.56 0-.84 0-1.054.109a1 1 0 0 0-.437.437C14 14.76 14 15.04 14 15.6v4.22m6-7.093V7.2c0-1.12 0-1.68-.218-2.108a2 2 0 0 0-.874-.874C18.48 4 17.92 4 16.8 4H7.2c-1.12 0-1.68 0-2.108.218a2 2 0 0 0-.874.874C4 5.52 4 6.08 4 7.2v9.6c0 1.12 0 1.68.218 2.108a2 2 0 0 0 .874.874C5.52 20 6.08 20 7.2 20h5.75c.508 0 .762 0 1-.06a2 2 0 0 0 .595-.256c.207-.132.381-.317.73-.686l3.85-4.073c.324-.342.485-.513.6-.71.103-.174.178-.363.224-.56.051-.223.051-.458.051-.928Z"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="text-gray-500">Interview Note</span>
                  </div>
                  <span class="text-gray-500">33 December 2021</span>
                </div>
                <div class="mt-4">
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro repellat architecto harum
                    excepturi
                    atque molestiae enim nam similique quia neque? Suscipit vitae atque dignissimos quidem laborum
                    autem
                    voluptates, velit iusto?</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="hiredRejectContent" class="current-stage-content hidden">
          <p>Hired / Reject Content</p>
        </div>
      </div>
    </div>
    <!-- <div class="mt-96"></div> -->
  </div>
  <!-- Applicant Hiring Progress End -->
  </div>
</section>
<!-- Content End -->

<script>

</script>