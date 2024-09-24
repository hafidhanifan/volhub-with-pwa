<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  {{-- <script type="module" src="/src/js/main.js"></script>
  <link rel="stylesheet" href="/src/css/style.css" /> --}}
  @vite(['resources/css/app.css', 'resources/css/userProfile.css', 'resources/js/userProfile.js'])

  <title>Profile User</title>
</head>

<body class="bg-background">
  <section class="mt-8 mx-auto lg:flex gap-8 lg:max-w-6xl xl:max-w-7xl">
    <div
      class="container w-full h-fit mx-auto p-6 rounded-xl lg:max-w-sm lg:shadow-sm bg-white border border-slate-200">
      <div class="flex items-center gap-4 overflow-hidden">
        @if(!empty($user->foto_profile))
        <img src="{{asset('storage/foto-profile/'.$user->foto_profile)}}" alt="profile user"
          class="w-20 rounded-full" />
        @else
        <img src="{{asset('img/logo-user.png')}}" alt="profile user" class="w-20 rounded-full" />
        @endif
        <div class="">
          <span class="font-semibold text-lg line-clamp-1">{{$user->nama_user}}</span>
          <p class="text-sm line-clamp-1">
            {{$user->bio}}
          </p>
        </div>
      </div>
      <div class="mt-4 py-2 border-t-2">
        <div class="flex justify-between items-center">
          <span class="font-semibold">Contact</span>
        </div>
        <div class="flex items-center gap-4 mt-4">
          <svg height="24px" width="24px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" fill="#000000">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <style type="text/css">
                .st0 {
                  fill: #000000;
                }
              </style>
              <g>
                <path class="st0"
                  d="M510.678,112.275c-2.308-11.626-7.463-22.265-14.662-31.054c-1.518-1.915-3.104-3.63-4.823-5.345 c-12.755-12.818-30.657-20.814-50.214-20.814H71.021c-19.557,0-37.395,7.996-50.21,20.814c-1.715,1.715-3.301,3.43-4.823,5.345 C8.785,90.009,3.63,100.649,1.386,112.275C0.464,116.762,0,121.399,0,126.087V385.92c0,9.968,2.114,19.55,5.884,28.203 c3.497,8.26,8.653,15.734,14.926,22.001c1.59,1.586,3.169,3.044,4.892,4.494c12.286,10.175,28.145,16.32,45.319,16.32h369.958 c17.18,0,33.108-6.145,45.323-16.384c1.718-1.386,3.305-2.844,4.891-4.43c6.27-6.267,11.425-13.741,14.994-22.001v-0.064 c3.769-8.653,5.812-18.171,5.812-28.138V126.087C512,121.399,511.543,116.762,510.678,112.275z M46.509,101.571 c6.345-6.338,14.866-10.175,24.512-10.175h369.958c9.646,0,18.242,3.837,24.512,10.175c1.122,1.129,2.179,2.387,3.112,3.637 L274.696,274.203c-5.348,4.687-11.954,7.002-18.696,7.002c-6.674,0-13.276-2.315-18.695-7.002L43.472,105.136 C44.33,103.886,45.387,102.7,46.509,101.571z M36.334,385.92V142.735L176.658,265.15L36.405,387.435 C36.334,386.971,36.334,386.449,36.334,385.92z M440.979,420.597H71.021c-6.281,0-12.158-1.651-17.174-4.552l147.978-128.959 l13.815,12.018c11.561,10.046,26.028,15.134,40.36,15.134c14.406,0,28.872-5.088,40.432-15.134l13.808-12.018l147.92,128.959 C453.137,418.946,447.26,420.597,440.979,420.597z M475.666,385.92c0,0.529,0,1.051-0.068,1.515L335.346,265.221L475.666,142.8 V385.92z">
                </path>
              </g>
            </g>
          </svg>
          <div class="flex flex-col">
            <span class="font-medium text-base">Email</span>
            <p class="line-clamp-1 text-sm">{{$user->email_user}}</p>
          </div>
        </div>
        <div class="flex gap-4 mt-4">
          <svg class="w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <path
                d="M16.1007 13.359L15.5719 12.8272H15.5719L16.1007 13.359ZM16.5562 12.9062L17.085 13.438H17.085L16.5562 12.9062ZM18.9728 12.5894L18.6146 13.2483L18.9728 12.5894ZM20.8833 13.628L20.5251 14.2869L20.8833 13.628ZM21.4217 16.883L21.9505 17.4148L21.4217 16.883ZM20.0011 18.2954L19.4723 17.7636L20.0011 18.2954ZM18.6763 18.9651L18.7459 19.7119H18.7459L18.6763 18.9651ZM8.81536 14.7266L9.34418 14.1947L8.81536 14.7266ZM4.00289 5.74561L3.2541 5.78816L3.2541 5.78816L4.00289 5.74561ZM10.4775 7.19738L11.0063 7.72922H11.0063L10.4775 7.19738ZM10.6342 4.54348L11.2346 4.09401L10.6342 4.54348ZM9.37326 2.85908L8.77286 3.30855V3.30855L9.37326 2.85908ZM6.26145 2.57483L6.79027 3.10667H6.79027L6.26145 2.57483ZM4.69185 4.13552L4.16303 3.60368H4.16303L4.69185 4.13552ZM12.0631 11.4972L12.5919 10.9654L12.0631 11.4972ZM16.6295 13.8909L17.085 13.438L16.0273 12.3743L15.5719 12.8272L16.6295 13.8909ZM18.6146 13.2483L20.5251 14.2869L21.2415 12.9691L19.331 11.9305L18.6146 13.2483ZM20.8929 16.3511L19.4723 17.7636L20.5299 18.8273L21.9505 17.4148L20.8929 16.3511ZM18.6067 18.2184C17.1568 18.3535 13.4056 18.2331 9.34418 14.1947L8.28654 15.2584C12.7186 19.6653 16.9369 19.8805 18.7459 19.7119L18.6067 18.2184ZM9.34418 14.1947C5.4728 10.3453 4.83151 7.10765 4.75168 5.70305L3.2541 5.78816C3.35456 7.55599 4.14863 11.144 8.28654 15.2584L9.34418 14.1947ZM10.7195 8.01441L11.0063 7.72922L9.9487 6.66555L9.66189 6.95073L10.7195 8.01441ZM11.2346 4.09401L9.97365 2.40961L8.77286 3.30855L10.0338 4.99296L11.2346 4.09401ZM5.73263 2.04299L4.16303 3.60368L5.22067 4.66736L6.79027 3.10667L5.73263 2.04299ZM10.1907 7.48257C9.66189 6.95073 9.66117 6.95144 9.66045 6.95216C9.66021 6.9524 9.65949 6.95313 9.659 6.95362C9.65802 6.95461 9.65702 6.95561 9.65601 6.95664C9.65398 6.95871 9.65188 6.96086 9.64972 6.9631C9.64539 6.96759 9.64081 6.97245 9.63599 6.97769C9.62634 6.98816 9.61575 7.00014 9.60441 7.01367C9.58174 7.04072 9.55605 7.07403 9.52905 7.11388C9.47492 7.19377 9.41594 7.2994 9.36589 7.43224C9.26376 7.70329 9.20901 8.0606 9.27765 8.50305C9.41189 9.36833 10.0078 10.5113 11.5343 12.0291L12.5919 10.9654C11.1634 9.54499 10.8231 8.68059 10.7599 8.27309C10.7298 8.07916 10.761 7.98371 10.7696 7.96111C10.7748 7.94713 10.7773 7.9457 10.7709 7.95525C10.7677 7.95992 10.7624 7.96723 10.7541 7.97708C10.75 7.98201 10.7451 7.98759 10.7394 7.99381C10.7365 7.99692 10.7335 8.00019 10.7301 8.00362C10.7285 8.00534 10.7268 8.00709 10.725 8.00889C10.7241 8.00979 10.7232 8.0107 10.7223 8.01162C10.7219 8.01208 10.7212 8.01278 10.7209 8.01301C10.7202 8.01371 10.7195 8.01441 10.1907 7.48257ZM11.5343 12.0291C13.0613 13.5474 14.2096 14.1383 15.0763 14.2713C15.5192 14.3392 15.8763 14.285 16.1472 14.1841C16.28 14.1346 16.3858 14.0763 16.4658 14.0227C16.5058 13.9959 16.5392 13.9704 16.5663 13.9479C16.5799 13.9367 16.5919 13.9262 16.6024 13.9166C16.6077 13.9118 16.6126 13.9073 16.6171 13.903C16.6194 13.9008 16.6215 13.8987 16.6236 13.8967C16.6246 13.8957 16.6256 13.8947 16.6266 13.8937C16.6271 13.8932 16.6279 13.8925 16.6281 13.8923C16.6288 13.8916 16.6295 13.8909 16.1007 13.359C15.5719 12.8272 15.5726 12.8265 15.5733 12.8258C15.5735 12.8256 15.5742 12.8249 15.5747 12.8244C15.5756 12.8235 15.5765 12.8226 15.5774 12.8217C15.5793 12.82 15.581 12.8183 15.5827 12.8166C15.5862 12.8133 15.5895 12.8103 15.5926 12.8074C15.5988 12.8018 15.6044 12.7969 15.6094 12.7929C15.6192 12.7847 15.6265 12.7795 15.631 12.7764C15.6403 12.7702 15.6384 12.773 15.6236 12.7785C15.5991 12.7876 15.501 12.8189 15.3038 12.7886C14.8905 12.7253 14.02 12.3853 12.5919 10.9654L11.5343 12.0291ZM9.97365 2.40961C8.95434 1.04802 6.94996 0.83257 5.73263 2.04299L6.79027 3.10667C7.32195 2.578 8.26623 2.63181 8.77286 3.30855L9.97365 2.40961ZM4.75168 5.70305C4.73201 5.35694 4.89075 4.9954 5.22067 4.66736L4.16303 3.60368C3.62571 4.13795 3.20329 4.89425 3.2541 5.78816L4.75168 5.70305ZM19.4723 17.7636C19.1975 18.0369 18.9029 18.1908 18.6067 18.2184L18.7459 19.7119C19.4805 19.6434 20.0824 19.2723 20.5299 18.8273L19.4723 17.7636ZM11.0063 7.72922C11.9908 6.7503 12.064 5.2019 11.2346 4.09401L10.0338 4.99295C10.4373 5.53193 10.3773 6.23938 9.9487 6.66555L11.0063 7.72922ZM20.5251 14.2869C21.3429 14.7315 21.4703 15.7769 20.8929 16.3511L21.9505 17.4148C23.2908 16.0821 22.8775 13.8584 21.2415 12.9691L20.5251 14.2869ZM17.085 13.438C17.469 13.0562 18.0871 12.9616 18.6146 13.2483L19.331 11.9305C18.2474 11.3414 16.9026 11.5041 16.0273 12.3743L17.085 13.438Z"
                fill="#1C274C"></path>
            </g>
          </svg>
          <div class="flex flex-col">
            <span class="font-medium">Phone</span>
            <p class="text-sm">{{$user->nomor_telephone}}</p>
          </div>
        </div>
        <div class="flex gap-4 mt-4">
          <svg class="w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18ZM12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z"
                fill="#0F0F0F"></path>
              <path
                d="M18 5C17.4477 5 17 5.44772 17 6C17 6.55228 17.4477 7 18 7C18.5523 7 19 6.55228 19 6C19 5.44772 18.5523 5 18 5Z"
                fill="#0F0F0F"></path>
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M1.65396 4.27606C1 5.55953 1 7.23969 1 10.6V13.4C1 16.7603 1 18.4405 1.65396 19.7239C2.2292 20.8529 3.14708 21.7708 4.27606 22.346C5.55953 23 7.23969 23 10.6 23H13.4C16.7603 23 18.4405 23 19.7239 22.346C20.8529 21.7708 21.7708 20.8529 22.346 19.7239C23 18.4405 23 16.7603 23 13.4V10.6C23 7.23969 23 5.55953 22.346 4.27606C21.7708 3.14708 20.8529 2.2292 19.7239 1.65396C18.4405 1 16.7603 1 13.4 1H10.6C7.23969 1 5.55953 1 4.27606 1.65396C3.14708 2.2292 2.2292 3.14708 1.65396 4.27606ZM13.4 3H10.6C8.88684 3 7.72225 3.00156 6.82208 3.0751C5.94524 3.14674 5.49684 3.27659 5.18404 3.43597C4.43139 3.81947 3.81947 4.43139 3.43597 5.18404C3.27659 5.49684 3.14674 5.94524 3.0751 6.82208C3.00156 7.72225 3 8.88684 3 10.6V13.4C3 15.1132 3.00156 16.2777 3.0751 17.1779C3.14674 18.0548 3.27659 18.5032 3.43597 18.816C3.81947 19.5686 4.43139 20.1805 5.18404 20.564C5.49684 20.7234 5.94524 20.8533 6.82208 20.9249C7.72225 20.9984 8.88684 21 10.6 21H13.4C15.1132 21 16.2777 20.9984 17.1779 20.9249C18.0548 20.8533 18.5032 20.7234 18.816 20.564C19.5686 20.1805 20.1805 19.5686 20.564 18.816C20.7234 18.5032 20.8533 18.0548 20.9249 17.1779C20.9984 16.2777 21 15.1132 21 13.4V10.6C21 8.88684 20.9984 7.72225 20.9249 6.82208C20.8533 5.94524 20.7234 5.49684 20.564 5.18404C20.1805 4.43139 19.5686 3.81947 18.816 3.43597C18.5032 3.27659 18.0548 3.14674 17.1779 3.0751C16.2777 3.00156 15.1132 3 13.4 3Z"
                fill="#0F0F0F"></path>
            </g>
          </svg>
          <div class="flex flex-col">
            <span class="font-medium">Instagram</span>
            <a class="text-sm hover:text-blueText block" href="https://www.instagram.com/nda.fg/"
              target="_blank">https://www.instagram.com/nda.fg/</a>
          </div>
        </div>
        <div class="flex gap-4 mt-4 border-b-2 pb-8">
          <svg class="w-6" fill="#000000" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
              <path
                d="M1168 601.321v74.955c72.312-44.925 155.796-71.11 282.643-71.11 412.852 0 465.705 308.588 465.705 577.417v733.213L1438.991 1920v-701.261c0-117.718-42.162-140.06-120.12-140.06-74.114 0-120.12 23.423-120.12 140.06V1920l-483.604-4.204V601.32H1168Zm-687.52-.792v1318.918H0V600.53h480.48Zm-120.12 120.12H120.12v1078.678h240.24V720.65Zm687.52.792H835.267v1075.316l243.364 2.162v-580.18c0-226.427 150.51-260.18 240.24-260.18 109.55 0 240.24 45.165 240.24 260.18v580.18l237.117-2.162v-614.174c0-333.334-93.573-457.298-345.585-457.298-151.472 0-217.057 44.925-281.322 98.98l-16.696 14.173H1047.88V721.441ZM240.24 0c132.493 0 240.24 107.748 240.24 240.24 0 132.493-107.747 240.24-240.24 240.24C107.748 480.48 0 372.733 0 240.24 0 107.748 107.748 0 240.24 0Zm0 120.12c-66.186 0-120.12 53.934-120.12 120.12s53.934 120.12 120.12 120.12 120.12-53.934 120.12-120.12-53.934-120.12-120.12-120.12Z"
                fill-rule="evenodd"></path>
            </g>
          </svg>
          <div class="flex flex-col">
            <span class="font-medium">Linkedin</span>
            <a href="https://www.linkedin.com/in/dinda-farras/"
              class="text-sm block hover:text-blueText">https://www.linkedin.com/in/dinda-farras/</a>
          </div>
        </div>
        <button id="openModalSetting"
          class="bg-blueBackground outline outline-blueBorder text-blueText font-medium w-full mt-8 py-2 rounded-lg">
          Settings
        </button>
      </div>
    </div>
    <div class="container mx-auto p-6 shadow-sm rounded-xl bg-white border border-slate-200">
      <!-- Button Navigation Start -->
      <div class="max-w-sm mx-auto">
        <ul class="flex flex-wrap justify-between">
          <li>
            <button id="aboutBtn" class="focus:outline-none border-b-4 border-blue-500">
              About
            </button>
          </li>
          <li>
            <button id="activityBtn" class="focus:outline-none border-b-4 border-transparent">
              Activity
            </button>
          </li>
          <li>
            <button id="appliedBtn" class="focus:outline-none border-b-4 border-transparent">
              Applied
            </button>
          </li>
          <li>
            <button id="favoriteBtn" class="focus:outline-none border-b-4 border-transparent">
              Favorite
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
                <span class="text-lg font-semibold">Deskripsi</span>
              </div>
              <div class="overflow-hidden px-3 pt-4">
                <p class="text-base mt-2">
                  @if (strlen($user->deskripsi) > 100)
                  <span class="short-desc">{{ Str::limit($user->deskripsi, 200, '...') }}</span>
                  <span class="more-desc" style="display: none;">{{ $user->deskripsi }}</span>
                  <a href="javascript:void(0);" class="more" onclick="toggleTextDesc(this)">More</a>
                  @else
                  {{ $user->deskripsi }}
                  @endif
                </p>
              </div>
            </div>
            <!-- CV Card Start -->
            <div class="lg:mt-8 border border-slate-300 rounded-2xl lg:w-2/6">
              <div class="flex justify-between p-4 items-center border-b border-slate-300 py-2 px-3">
                <span class="text-lg font-semibold">CV</span>
              </div>
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
            </div>
          </div>
          <!-- Description and CV End -->

          <!-- Skill Start -->
          <div class="w-full mt-8 border border-slate-300 rounded-2xl">
            <div class="flex items-center justify-between border-b border-slate-300 py-2 px-3">
              <span class="text-lg font-semibold">Skill</span>
              <button id="openModalAddSkill" class="flex items-center font-semibold py-2 px-4 rounded-lg">
                <svg class="w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <path d="M6 12H18M12 6V18" stroke="#000000" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"></path>
                  </g>
                </svg>
                Add
              </button>
              <!-- Modal Add Skill Start -->
              <div id="addSkillModal"
                class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-6 rounded-lg shadow-lg w-[80vw] md:w-[70vw] lg:w-[40vw]">
                  <div class="pb-2 flex items-center justify-between border-b-2">
                    <h2 class="text-xl font-semibold">Skill</h2>
                    <button id="closeModalSkill" class="text-gray-600 hover:text-gray-900">
                      <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M6.99486 7.00636C6.60433 7.39689 6.60433 8.03005 6.99486 8.42058L10.58 12.0057L6.99486 15.5909C6.60433 15.9814 6.60433 16.6146 6.99486 17.0051C7.38538 17.3956 8.01855 17.3956 8.40907 17.0051L11.9942 13.4199L15.5794 17.0051C15.9699 17.3956 16.6031 17.3956 16.9936 17.0051C17.3841 16.6146 17.3841 15.9814 16.9936 15.5909L13.4084 12.0057L16.9936 8.42059C17.3841 8.03007 17.3841 7.3969 16.9936 7.00638C16.603 6.61585 15.9699 6.61585 15.5794 7.00638L11.9942 10.5915L8.40907 7.00636C8.01855 6.61584 7.38538 6.61584 6.99486 7.00636Z"
                          fill="#0F0F0F" />
                      </svg>
                    </button>
                  </div>
                  <div class="mt-4 flex flex-wrap justify-evenly items-center gap-y-6">
                    <?php $no = 1 ?>
                    @foreach($user->skills as $skill)
                    <div class="relative">
                      <span
                        class="bg-snippet text-white text-sm py-2 px-8 rounded-xl text-center">{{$skill->nama_skill}}</span>
                      <button id="deleteSkill{{ $skill->id_skill }}" class="delete-skill-btn"
                        data-id="{{ $skill->id_skill }}">
                        <svg class="w-6 absolute -inset-2 left-[68px]" viewBox="0 0 24 24" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                          <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                          <g id="SVGRepo_iconCarrier">
                            <path
                              d="M6.99486 7.00636C6.60433 7.39689 6.60433 8.03005 6.99486 8.42058L10.58 12.0057L6.99486 15.5909C6.60433 15.9814 6.60433 16.6146 6.99486 17.0051C7.38538 17.3956 8.01855 17.3956 8.40907 17.0051L11.9942 13.4199L15.5794 17.0051C15.9699 17.3956 16.6031 17.3956 16.9936 17.0051C17.3841 16.6146 17.3841 15.9814 16.9936 15.5909L13.4084 12.0057L16.9936 8.42059C17.3841 8.03007 17.3841 7.3969 16.9936 7.00638C16.603 6.61585 15.9699 6.61585 15.5794 7.00638L11.9942 10.5915L8.40907 7.00636C8.01855 6.61584 7.38538 6.61584 6.99486 7.00636Z"
                              fill="#ffffff"></path>
                          </g>
                        </svg>
                      </button>
                    </div>
                    @endforeach
                  </div>
                  <!-- Modal Alert Delete Skill Start -->
                  <div id="deleteSkillModal"
                    class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                      <h3 class="text-lg font-bold mb-4">Are you sure?</h3>
                      <p class="text-sm text-gray-600 mb-6">
                        Do you really want to delete this picture? This
                        process cannot be undone.
                      </p>
                      <div class="flex justify-end space-x-3">
                        <button id="cancelDeleteSkill" type="button"
                          class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                          Cancel
                        </button>
                        <form id="confirmDeleteSkill" action="" method="POST" style="display: inline;">
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
                  <!-- Modal ALert Delete Skill End -->
                  <form action="{{ route('user.add-skill-action', ['id' => $user->id])}}" method="POST" class="mt-8">
                    @csrf
                    <input type="text" id="skill"
                      class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                      placeholder="Insert your skill" name="nama_skill" required />
                    <div class="mt-8 flex justify-end">
                      <button type="submit"
                        class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                        Save Changes
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Modal Add Skill End -->
            </div>
            <div class="p-4 flex flex-wrap justify-evenly gap-2">
              <?php $no = 1 ?>
              @foreach($user->skills as $skill)
              <span
                class="bg-snippet text-white text-sm p-2 rounded-xl flex-1 text-center">{{$skill->nama_skill}}</span>
              @endforeach
            </div>
          </div>
          <!-- Skill End -->

          <!-- Experience Start -->
          <div class="w-full mt-8 border border-slate-300 rounded-2xl">
            <div class="flex items-center justify-between border-b border-slate-300 py-2 px-3">
              <span class="text-lg font-semibold">Experience</span>
              <button id="addExperienceButton" class="flex items-center font-semibold py-2 px-4 rounded-lg">
                <svg class="w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <path d="M6 12H18M12 6V18" stroke="#000000" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"></path>
                  </g>
                </svg>
                Add
              </button>
            </div>
            <div class="rounded-2xl m-4 flex">
              <div class="">
                <div class="flex items-center gap-4 px-4 pb-2">
                  <div class="overflow-hidden">
                    <h2 class="text-lg font-semibold line-clamp-2">
                      Pembersihan Pantai Indrayanti
                    </h2>
                    <p class="text-sm">Mitra VolHub</p>
                  </div>
                </div>
                <div class="max-h-32 overflow-hidden">
                  <p class="text-sm text-gray-700 line-clamp-2 px-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Repudiandae harum architecto, non itaque voluptas ut, sunt
                    impedit expedita maxime debitis perspiciatis facilis autem
                    sit rerum assumenda necessitatibus minus quo consectetur?
                  </p>
                  <button class="px-4">More</button>
                </div>
              </div>
              <div class="">
                <button id="editExperienceModalButton">
                  <svg class="w-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                      <path
                        d="M15.4998 5.50067L18.3282 8.3291M13 21H21M3 21.0004L3.04745 20.6683C3.21536 19.4929 3.29932 18.9052 3.49029 18.3565C3.65975 17.8697 3.89124 17.4067 4.17906 16.979C4.50341 16.497 4.92319 16.0772 5.76274 15.2377L17.4107 3.58969C18.1918 2.80865 19.4581 2.80864 20.2392 3.58969C21.0202 4.37074 21.0202 5.63707 20.2392 6.41812L8.37744 18.2798C7.61579 19.0415 7.23497 19.4223 6.8012 19.7252C6.41618 19.994 6.00093 20.2167 5.56398 20.3887C5.07171 20.5824 4.54375 20.6889 3.48793 20.902L3 21.0004Z"
                        stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                  </svg>
                </button>
              </div>
            </div>
            <div class="rounded-2xl m-4 flex">
              <div class="">
                <div class="flex items-center gap-4 px-4 pb-2">
                  <div class="overflow-hidden">
                    <h2 class="text-lg font-semibold line-clamp-2">
                      Pembersihan Pantai Indrayanti
                    </h2>
                    <p class="text-sm">Mitra VolHub</p>
                  </div>
                </div>
                <div class="max-h-32 overflow-hidden">
                  <p class="text-sm text-gray-700 line-clamp-2 px-4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Repudiandae harum architecto, non itaque voluptas ut, sunt
                    impedit expedita maxime debitis perspiciatis facilis autem
                    sit rerum assumenda necessitatibus minus quo consectetur?
                  </p>
                  <button class="px-4">More</button>
                </div>
              </div>
              <div class="">
                <svg class="w-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                  <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                  <g id="SVGRepo_iconCarrier">
                    <path
                      d="M15.4998 5.50067L18.3282 8.3291M13 21H21M3 21.0004L3.04745 20.6683C3.21536 19.4929 3.29932 18.9052 3.49029 18.3565C3.65975 17.8697 3.89124 17.4067 4.17906 16.979C4.50341 16.497 4.92319 16.0772 5.76274 15.2377L17.4107 3.58969C18.1918 2.80865 19.4581 2.80864 20.2392 3.58969C21.0202 4.37074 21.0202 5.63707 20.2392 6.41812L8.37744 18.2798C7.61579 19.0415 7.23497 19.4223 6.8012 19.7252C6.41618 19.994 6.00093 20.2167 5.56398 20.3887C5.07171 20.5824 4.54375 20.6889 3.48793 20.902L3 21.0004Z"
                      stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  </g>
                </svg>
              </div>
            </div>
          </div>
          <!-- Modal Add Experience Start -->
          <div id="addExperienceModal"
            class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-[80vw] md:w-[70vw] lg:w-[40vw]">
              <div class="pb-2 flex items-center justify-between border-b-2">
                <h2 class="text-xl font-semibold">Experience</h2>
                <button id="closeAddModalExperience" class="text-gray-600 hover:text-gray-900">
                  <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M6.99486 7.00636C6.60433 7.39689 6.60433 8.03005 6.99486 8.42058L10.58 12.0057L6.99486 15.5909C6.60433 15.9814 6.60433 16.6146 6.99486 17.0051C7.38538 17.3956 8.01855 17.3956 8.40907 17.0051L11.9942 13.4199L15.5794 17.0051C15.9699 17.3956 16.6031 17.3956 16.9936 17.0051C17.3841 16.6146 17.3841 15.9814 16.9936 15.5909L13.4084 12.0057L16.9936 8.42059C17.3841 8.03007 17.3841 7.3969 16.9936 7.00638C16.603 6.61585 15.9699 6.61585 15.5794 7.00638L11.9942 10.5915L8.40907 7.00636C8.01855 6.61584 7.38538 6.61584 6.99486 7.00636Z"
                      fill="#0F0F0F" />
                  </svg>
                </button>
              </div>
              <form action="" class="">
                <div class="my-4">
                  <label for="activity-name" class="block mb-2 font-medium text-gray-900">Activity Name</label>
                  <input type="text" id="activityName"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                    placeholder="Insert your name" required />
                </div>
                <div class="my-4">
                  <label for="partner-activity" class="block mb-2 font-medium text-gray-900">Partner Activity</label>
                  <input type="text" id="partnerActivity"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                    placeholder="Insert your partner name" required />
                </div>
                <div class="my-4">
                  <label for="description" class="block mb-2 font-medium text-gray-900">Description</label>
                  <textarea name="description" id="name"
                    class="w-full h-52 lg:h-32 resize-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                    placeholder="Tell about yourself" required></textarea>
                </div>
              </form>
              <div class="mt-8 flex justify-end">
                <button type="button"
                  class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                  Add
                </button>
              </div>
            </div>
          </div>
          <!-- Modal Add Experience End -->
          <!-- Modal Edit Experience Start -->
          <div id="editExperienceModal"
            class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-[80vw] md:w-[70vw] lg:w-[40vw]">
              <div class="pb-2 flex items-center justify-between border-b-2">
                <h2 class="text-xl font-semibold">Experience</h2>
                <button id="closeModalExperience" class="text-gray-600 hover:text-gray-900">
                  <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M6.99486 7.00636C6.60433 7.39689 6.60433 8.03005 6.99486 8.42058L10.58 12.0057L6.99486 15.5909C6.60433 15.9814 6.60433 16.6146 6.99486 17.0051C7.38538 17.3956 8.01855 17.3956 8.40907 17.0051L11.9942 13.4199L15.5794 17.0051C15.9699 17.3956 16.6031 17.3956 16.9936 17.0051C17.3841 16.6146 17.3841 15.9814 16.9936 15.5909L13.4084 12.0057L16.9936 8.42059C17.3841 8.03007 17.3841 7.3969 16.9936 7.00638C16.603 6.61585 15.9699 6.61585 15.5794 7.00638L11.9942 10.5915L8.40907 7.00636C8.01855 6.61584 7.38538 6.61584 6.99486 7.00636Z"
                      fill="#0F0F0F" />
                  </svg>
                </button>
              </div>
              <form action="" class="">
                <div class="my-4">
                  <label for="activity-name" class="block mb-2 font-medium text-gray-900">Activity Name</label>
                  <input type="text" id="activityName"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                    placeholder="Insert your name" value="Dinda Farras G." required />
                </div>
                <div class="my-4">
                  <label for="partner-activity" class="block mb-2 font-medium text-gray-900">Partner Activity</label>
                  <input type="text" id="partnerActivity"
                    class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                    placeholder="Insert your name" value="Dinda Farras G." required />
                </div>
                <div class="my-4">
                  <label for="description" class="block mb-2 font-medium text-gray-900">Description</label>
                  <textarea name="description" id="name"
                    class="w-full h-52 lg:h-32 resize-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                    placeholder="Tell about yourself" required>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea officiis asperiores explicabo totam sequi temporibus laborum eum adipisci saepe nihil.</textarea>
                </div>
              </form>
              <div class="mt-8 flex justify-end">
                <button id="deleteExperienceButton" type="button"
                  class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                  Delete
                </button>
                <button type="button"
                  class="text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                  Update
                </button>
              </div>
            </div>
          </div>
          <!-- Modal Edit Experience End -->

          <!-- Modal Alert Delete Experience Start -->
          <div id="deleteExperienceAlert"
            class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
              <h3 class="text-lg font-bold mb-4">Are you sure?</h3>
              <p class="text-sm text-gray-600 mb-6">
                Do you really want to delete this picture? This process cannot
                be undone.
              </p>
              <div class="flex justify-end space-x-3">
                <button id="cancelDeleteExperience" type="button"
                  class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                  Cancel
                </button>
                <button id="confirmDeleteExperience" type="button"
                  class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                  Yes, Delete
                </button>
              </div>
            </div>
          </div>
          <!-- Modal Alert Delete Experience End -->
          <!-- Experience End -->

          <!-- Modal Settings Start -->
          <div id="modalSetting"
            class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="w-4/5 md:max-w-4xl bg-white border-b-2 rounded-lg shadow-lg">
              <div class="flex items-center justify-between p-4 border-b-2">
                <h2 class="text-xl font-semibold">Settings</h2>
                <button id="closeModalSetting" class="text-gray-600 hover:text-gray-900">
                  <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M6.99486 7.00636C6.60433 7.39689 6.60433 8.03005 6.99486 8.42058L10.58 12.0057L6.99486 15.5909C6.60433 15.9814 6.60433 16.6146 6.99486 17.0051C7.38538 17.3956 8.01855 17.3956 8.40907 17.0051L11.9942 13.4199L15.5794 17.0051C15.9699 17.3956 16.6031 17.3956 16.9936 17.0051C17.3841 16.6146 17.3841 15.9814 16.9936 15.5909L13.4084 12.0057L16.9936 8.42059C17.3841 8.03007 17.3841 7.3969 16.9936 7.00638C16.603 6.61585 15.9699 6.61585 15.5794 7.00638L11.9942 10.5915L8.40907 7.00636C8.01855 6.61584 7.38538 6.61584 6.99486 7.00636Z"
                      fill="#0F0F0F" />
                  </svg>
                </button>
              </div>

              <div class="flex flex-col items-center md:flex-row md:items-start">
                <div class="">
                  <ul class="flex md:flex-col">
                    <li>
                      <button id="profileBtn"
                        class="py-4 pl-4 pr-16 w-full text-left border-b-4 md:border-b-0 md:border-r-4 border-sky-600 bg-sky-100 hover:bg-sky-100">
                        Profile
                      </button>
                    </li>
                    <li>
                      <button id="contactBtn"
                        class="py-4 pl-4 pr-16 w-full text-left border-b-4 md:border-b-0 md:border-r-4 border-transparent hover:bg-sky-100">
                        Contact
                      </button>
                    </li>
                    <li>
                      <button id="accountBtn"
                        class="py-4 pl-4 pr-16 w-full text-left border-b-4 md:border-b-0 md:border-r-4 border-transparent hover:bg-sky-100">
                        Account
                      </button>
                    </li>
                  </ul>
                </div>
                <div class="w-4/5">
                  <div id="profileContent"
                    class="max-h-[50vh] md:max-h-[60vh] lg:max-h-[80vh] md:px-8 py-4 overflow-y-auto hide-scrollbar md:border-l-2">
                    <div class="flex flex-col md:flex-row gap-4 items-center">
                      <img src="{{asset('storage/foto-profile/'.$user->foto_profile)}}" alt=""
                        class="w-28 rounded-full" />
                      <div class="flex flex-col md:flex-row gap-4">
                        <button type="button"
                          class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                          Change Picture
                        </button>
                        <button id="deletePicture" type="button"
                          class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                          Delete Picture
                        </button>

                        <!-- Modal Alert Delete Picture Start-->
                        <div id="deleteModal"
                          class="hidden fixed top-0 left-0 right-0 z-50 w-full h-full bg-black bg-opacity-50 flex items-center justify-center">
                          <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                            <h3 class="text-lg font-bold mb-4">
                              Are you sure?
                            </h3>
                            <p class="text-sm text-gray-600 mb-6">
                              Do you really want to delete this picture? This
                              process cannot be undone.
                            </p>
                            <div class="flex justify-end space-x-3">
                              <button id="cancelDelete" type="button"
                                class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                                Cancel
                              </button>
                              <button id="confirmDelete" type="button"
                                class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                                Yes, Delete
                              </button>
                            </div>
                          </div>
                        </div>
                        <!-- Modal Alert Delete Picture End -->
                      </div>
                    </div>
                    <form class="mt-8" action="{{ route('user.edit-profile-action', ['id' => $user->id]) }}"
                      method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="grid grid-cols-2 gap-6 mb-6">
                        <div>
                          <label for="name" class="block mb-2 font-medium text-gray-900">Profile Name</label>
                          <input type="text" id="name"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                            placeholder="Insert your name" name="nama_user" value="{{ old('user', $user->nama_user) }}"
                            required />
                        </div>
                        <div>
                          <label for="name" class="block mb-2 font-medium text-gray-900">Bio</label>
                          <input type="text" id="bio"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                            placeholder="Insert your bio" name="bio" value="{{ old('user', $user->bio) }}" />
                        </div>
                        <div>
                          <label for="name" class="block mb-2 font-medium text-gray-900">Gender</label>
                          <select id="gender"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                            placeholder="Insert your gender" name="gender">
                            <option value="">Choose Gender</option>
                            @foreach($gender as $gender)
                            <option value="{{ $gender }}" @if(old('gender', $user->gender) == $gender) selected
                              @endif>{{ ucfirst($gender) }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div>
                          <label for="name" class="block mb-2 font-medium text-gray-900">Age</label>
                          <input type="text" id="usia"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                            placeholder="Insert your age" name="usia" value="{{ old('user', $user->usia) }}" />
                        </div>
                        <div>
                          <label for="name" class="block mb-2 font-medium text-gray-900">Domicile</label>
                          <input type="text" id="domisili"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                            placeholder="Insert your domicile" name="domisili"
                            value="{{ old('user', $user->domisili) }}" />
                        </div>
                        <div>
                          <label for="name" class="block mb-2 font-medium text-gray-900">Last Education</label>
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
                      </div>
                      <div class="grid gap-6 mb-6">
                        <div>
                          <label for="cv" class="block mb-2 font-medium text-gray-900 cursor-pointer">CV</label>
                          <input type="file" id="cv"
                            class="w-full p-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block hover:cursor-pointer"
                            placeholder="Insert your bio" name="cv" />
                        </div>
                        <div>
                          <label for="name" class="block mb-2 font-medium text-gray-900">Description</label>
                          <textarea name="deskripsi" id="deskripsi"
                            class="w-full h-52 lg:h-32 resize-none bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                            placeholder="Tell about yourself" required>{{ old('user', $user->deskripsi) }}</textarea>
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
                    <form class="p-8" action="{{ route('user.edit-akun-action', ['id' => $user->id]) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="grid gap-6 mb-6">
                        <div>
                          <label for="emailUser" class="block mb-2 font-medium text-gray-900">Email</label>
                          <input type="email" id="emailUser"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                            placeholder="Insert your Email" name="email_user"
                            value="{{ old('user', $user->email_user) }}" required />
                        </div>
                        <div>
                          <label for="phone" class="block mb-2 font-medium text-gray-900">Phone</label>
                          <input type="text" id="phone"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                            placeholder="Insert your bio" name="nomor_telephone"
                            value="{{ old('user', $user->nomor_telephone) }}" required />
                        </div>
                        <div>
                          <label for="emailUser" class="block mb-2 font-medium text-gray-900">Instagram</label>
                          <input type="text" id="instagramUser"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                            placeholder="Insert your Email" value="dinda@gmail.com" />
                        </div>
                        <div>
                          <label for="phone" class="block mb-2 font-medium text-gray-900">LinkedIn</label>
                          <input type="text" id="linkedinUser"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                            placeholder="Insert your bio" value="+6281802231234" />
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
                    <form class="p-8">
                      <div class="grid gap-6 mb-6">
                        <div>
                          <label for="emailUser" class="block mb-2 font-medium text-gray-900">Username</label>
                          <input type="text" id="usernameUser"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                            placeholder="Insert your Email" value="{{ old('user', $user->username) }}" required />
                        </div>
                        <div>
                          <label for="phone" class="block mb-2 font-medium text-gray-900">Password</label>
                          <input type="password" id="passwordUser"
                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block"
                            placeholder="Insert your bio" value="{{ old('user', $user->password) }}" required />
                        </div>
                      </div>
                      <div class="flex justify-end">
                        <button type="button"
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
        </div>
      </div>
      <div id="activityContent" class="hidden container mt-8">
        <div class="border border-slate-300 rounded-2xl">
          <div class="flex items-center gap-4 p-4">
            <img src="../src/image/volhub-small-logo.png" alt="" class="w-16" />
            <div class="overflow-hidden">
              <h2 class="text-xl font-semibold line-clamp-2">
                Pembersihan Pantai Indrayanti
              </h2>
              <p class="text-sm">Mitra VolHub</p>
            </div>
          </div>
          <div class="mt-4 max-h-32 overflow-hidden">
            <p class="text-sm text-gray-700 line-clamp-3 px-4">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Repudiandae harum architecto, non itaque voluptas ut, sunt
              impedit expedita maxime debitis perspiciatis facilis autem sit
              rerum assumenda necessitatibus minus quo consectetur?
            </p>
          </div>
          <div class="mt-4 flex flex-wrap justify-evenly gap-2 px-4">
            <span class="bg-snippet text-white text-sm p-2 rounded-xl flex-1 text-center">Paid</span>
            <span class="bg-snippet text-white text-sm p-2 rounded-xl flex-1 text-center">Offline</span>
            <span class="bg-snippet text-white text-sm p-2 rounded-xl flex-1 text-center">Free</span>
          </div>
          <div class="mt-8 border-t border-gray-200">
            <div class="flex items-center pt-2 px-4 pb-2 gap-2">
              <svg class="text-gray-700" fill="#616161" height="15px" width="15px" version="1.1" id="Capa_1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 297 297"
                xml:space="preserve">
                <g>
                  <path
                    d="M148.5,0C87.43,0,37.747,49.703,37.747,110.797c0,91.026,99.729,179.905,103.976,183.645
              c1.936,1.705,4.356,2.559,6.777,2.559c2.421,0,4.841-0.853,6.778-2.559c4.245-3.739,103.975-92.618,103.975-183.645
              C259.253,49.703,209.57,0,148.5,0z M148.5,272.689c-22.049-21.366-90.243-93.029-90.243-161.892
              c0-49.784,40.483-90.287,90.243-90.287s90.243,40.503,90.243,90.287C238.743,179.659,170.549,251.322,148.5,272.689z" />
                  <path d="M148.5,59.183c-28.273,0-51.274,23.154-51.274,51.614c0,28.461,23.001,51.614,51.274,51.614
              c28.273,0,51.274-23.153,51.274-51.614C199.774,82.337,176.773,59.183,148.5,59.183z M148.5,141.901
              c-16.964,0-30.765-13.953-30.765-31.104c0-17.15,13.801-31.104,30.765-31.104c16.964,0,30.765,13.953,30.765,31.104
              C179.265,127.948,165.464,141.901,148.5,141.901z" />
                </g>
              </svg>
              <span class="text-sm text-gray-700">Gunungkidul, Yogyakarta</span>
            </div>
          </div>
        </div>
      </div>
      <div id="appliedContent" class="hidden container mt-8">
        <div class="border border-slate-300 rounded-2xl">
          <div class="flex items-center gap-4 p-4">
            <img src="../src/image/volhub-small-logo.png" alt="" class="w-16" />
            <div class="overflow-hidden">
              <h2 class="text-xl font-semibold line-clamp-2">
                Pembersihan Pantai Indrayanti
              </h2>
              <p class="text-sm">Mitra VolHub</p>
            </div>
          </div>
          <div class="mt-4 max-h-32 overflow-hidden">
            <p class="text-sm text-gray-700 line-clamp-3 px-4">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Repudiandae harum architecto, non itaque voluptas ut, sunt
              impedit expedita maxime debitis perspiciatis facilis autem sit
              rerum assumenda necessitatibus minus quo consectetur?
            </p>
          </div>
          <div class="mt-4 flex flex-wrap justify-evenly gap-2 px-4">
            <span
              class="bg-greenBackground border border-greenBorder font-medium text-greenText text-sm p-2 rounded-xl flex-1 text-center">Anda
              diterima</span>
          </div>
          <div class="mt-8 border-t border-gray-200">
            <div class="flex items-center pt-2 px-4 pb-2 gap-2">
              <svg class="text-gray-700" fill="#616161" height="15px" width="15px" version="1.1" id="Capa_1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 297 297"
                xml:space="preserve">
                <g>
                  <path
                    d="M148.5,0C87.43,0,37.747,49.703,37.747,110.797c0,91.026,99.729,179.905,103.976,183.645
            c1.936,1.705,4.356,2.559,6.777,2.559c2.421,0,4.841-0.853,6.778-2.559c4.245-3.739,103.975-92.618,103.975-183.645
            C259.253,49.703,209.57,0,148.5,0z M148.5,272.689c-22.049-21.366-90.243-93.029-90.243-161.892
            c0-49.784,40.483-90.287,90.243-90.287s90.243,40.503,90.243,90.287C238.743,179.659,170.549,251.322,148.5,272.689z" />
                  <path d="M148.5,59.183c-28.273,0-51.274,23.154-51.274,51.614c0,28.461,23.001,51.614,51.274,51.614
            c28.273,0,51.274-23.153,51.274-51.614C199.774,82.337,176.773,59.183,148.5,59.183z M148.5,141.901
            c-16.964,0-30.765-13.953-30.765-31.104c0-17.15,13.801-31.104,30.765-31.104c16.964,0,30.765,13.953,30.765,31.104
            C179.265,127.948,165.464,141.901,148.5,141.901z" />
                </g>
              </svg>
              <span class="text-sm text-gray-700">Gunungkidul, Yogyakarta</span>
            </div>
          </div>
        </div>
        <div class="mt-4 border border-slate-300 rounded-2xl">
          <div class="flex items-center gap-4 p-4">
            <img src="../src/image/volhub-small-logo.png" alt="" class="w-16" />
            <div class="overflow-hidden">
              <h2 class="text-xl font-semibold line-clamp-2">
                Pembersihan Pantai Indrayanti
              </h2>
              <p class="text-sm">Mitra VolHub</p>
            </div>
          </div>
          <div class="mt-4 max-h-32 overflow-hidden">
            <p class="text-sm text-gray-700 line-clamp-3 px-4">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Repudiandae harum architecto, non itaque voluptas ut, sunt
              impedit expedita maxime debitis perspiciatis facilis autem sit
              rerum assumenda necessitatibus minus quo consectetur?
            </p>
          </div>
          <div class="mt-4 flex flex-wrap justify-evenly gap-2 px-4">
            <span
              class="bg-greenBackground border border-greenBorder font-medium text-greenText text-sm p-2 rounded-xl flex-1 text-center">Anda
              diterima</span>
          </div>
          <div class="mt-8 border-t border-gray-200">
            <div class="flex items-center pt-2 px-4 pb-2 gap-2">
              <svg class="text-gray-700" fill="#616161" height="15px" width="15px" version="1.1" id="Capa_1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 297 297"
                xml:space="preserve">
                <g>
                  <path
                    d="M148.5,0C87.43,0,37.747,49.703,37.747,110.797c0,91.026,99.729,179.905,103.976,183.645
            c1.936,1.705,4.356,2.559,6.777,2.559c2.421,0,4.841-0.853,6.778-2.559c4.245-3.739,103.975-92.618,103.975-183.645
            C259.253,49.703,209.57,0,148.5,0z M148.5,272.689c-22.049-21.366-90.243-93.029-90.243-161.892
            c0-49.784,40.483-90.287,90.243-90.287s90.243,40.503,90.243,90.287C238.743,179.659,170.549,251.322,148.5,272.689z" />
                  <path d="M148.5,59.183c-28.273,0-51.274,23.154-51.274,51.614c0,28.461,23.001,51.614,51.274,51.614
            c28.273,0,51.274-23.153,51.274-51.614C199.774,82.337,176.773,59.183,148.5,59.183z M148.5,141.901
            c-16.964,0-30.765-13.953-30.765-31.104c0-17.15,13.801-31.104,30.765-31.104c16.964,0,30.765,13.953,30.765,31.104
            C179.265,127.948,165.464,141.901,148.5,141.901z" />
                </g>
              </svg>
              <span class="text-sm text-gray-700">Gunungkidul, Yogyakarta</span>
            </div>
          </div>
        </div>
      </div>
      <div class="">
        <div id="favoriteContent" class="hidden">Konten untuk favorite</div>
      </div>
    </div>
  </section>

  <script>
    // Inisialisasi saat halaman dimuat
      document.addEventListener("DOMContentLoaded", function () {
        initializeTabs();
        initializeModalTabs();

        // Modal Settings (Element Selection)
        const openModalSetting = document.getElementById("openModalSetting");
        const modalSetting = document.getElementById("modalSetting");
        const closeModalSetting = document.getElementById("closeModalSetting");
        const deleteButton = document.getElementById("deletePicture");
        const modal = document.getElementById("deleteModal");
        const cancelDeleteButton = document.getElementById("cancelDelete");
        const confirmDeleteButton = document.getElementById("confirmDelete");

        // Modal Skill (Element Selection)
        const deleteSkill = document.querySelectorAll(".delete-skill-btn");
        const deleteSkillModal = document.getElementById("deleteSkillModal");
        const confirmDeleteSkill =
          document.getElementById("confirmDeleteSkill");
        const cancelDeleteSkill = document.getElementById("cancelDeleteSkill");
        const closeModalSkill = document.getElementById("closeModalSkill");
        const showSkillModal = document.getElementById("addSkillModal");
        const openModalAddSkillButton =
          document.getElementById("openModalAddSkill");
        
        // Modal Add Experience (Element Selection)
        const addExperienceButton = document.getElementById(
          "addExperienceButton"
        );
        const showAddExperienceModal =
          document.getElementById("addExperienceModal");
        const closeAddModalExperience = document.getElementById(
          "closeAddModalExperience"
        );
        // Modal Edit & Delete Experience (Element Selection)
        const editExperienceModalButton = document.getElementById(
          "editExperienceModalButton"
        );
        const showExperienceModal = document.getElementById(
          "editExperienceModal"
        );
        const closeExperienceModalButton = document.getElementById(
          "closeModalExperience"
        );
        const deleteExperienceButton = document.getElementById(
          "deleteExperienceButton"
        );
        const showDeleteExperienceAlert = document.getElementById(
          "deleteExperienceAlert"
        );
        const cancelDeleteExperience = document.getElementById(
          "cancelDeleteExperience"
        );
        const confirmDeleteExperience = document.getElementById(
          "confirmDeleteExperience"
        );

        // Event Handling Skill Modal
        closeModalSkill.addEventListener("click", function () {
          showSkillModal.classList.add("hidden");
        });

        openModalAddSkillButton.addEventListener("click", function () {
          showSkillModal.classList.remove("hidden");
        });

        deleteSkill.forEach(button => {
          button.addEventListener('click', function () {
              const skillId = this.getAttribute('data-id');
              const userId = "{{ $user->id }}"; // Ambil user ID dari variabel PHP
              const actionUrl = `{{ url('user', [$user->id, 'remove-skill']) }}/${skillId}`;
              confirmDeleteSkill.setAttribute('action', actionUrl);

              deleteSkillModal.classList.remove('hidden');
          });
        });

        cancelDeleteSkill.addEventListener("click", function () {
          deleteSkillModal.classList.add("hidden");
        });

        confirmDeleteSkill.addEventListener("click", function () {
          deleteSkillModal.classList.add("hidden");
        });
        // Event Handling Add Experience Modal
        addExperienceButton.addEventListener("click", function () {
          showAddExperienceModal.classList.remove("hidden");
        });

        closeAddModalExperience.addEventListener("click", function () {
          showAddExperienceModal.classList.add("hidden");
        });
        // Event Handling Edit Experience Modal
        editExperienceModalButton.addEventListener("click", function () {
          showExperienceModal.classList.remove("hidden");
        });

        closeExperienceModalButton.addEventListener("click", function () {
          showExperienceModal.classList.add("hidden");
        });

        deleteExperienceButton.addEventListener("click", function () {
          showDeleteExperienceAlert.classList.remove("hidden");
        });

        cancelDeleteExperience.addEventListener("click", function () {
          showDeleteExperienceAlert.classList.add("hidden");
        });

        confirmDeleteExperience.addEventListener("click", function () {
          showDeleteExperienceAlert.classList.add("hidden");
        });

        // Event Handling Modal Settings
        openModalSetting.addEventListener("click", function () {
          modalSetting.classList.remove("hidden");
        });

        closeModalSetting.addEventListener("click", function () {
          modalSetting.classList.add("hidden");
        });

        deleteButton.addEventListener("click", function () {
          modal.classList.remove("hidden");
        });

        cancelDeleteButton.addEventListener("click", function () {
          modal.classList.add("hidden");
        });

        confirmDeleteButton.addEventListener("click", function () {
          modal.classList.add("hidden");
        });
      });

      function initializeTabs() {
        const tabs = ["about", "activity", "applied", "favorite"];

        tabs.forEach((tab) => {
          const button = document.getElementById(`${tab}Btn`);
          button.addEventListener("click", () => handleTabClick(tab, tabs));
        });
      }

      function handleTabClick(selectedTab, tabs) {
        tabs.forEach((tab) => {
          const contentElement = document.getElementById(`${tab}Content`);
          const buttonElement = document.getElementById(`${tab}Btn`);

          if (tab === selectedTab) {
            contentElement.classList.remove("hidden");
            buttonElement.classList.remove("border-transparent");
            buttonElement.classList.add("border-blue-500");
          } else {
            contentElement.classList.add("hidden");
            buttonElement.classList.add("border-transparent");
            buttonElement.classList.remove("border-blue-500");
          }
        });
      }

      // Fungsi khusus untuk modal
      function initializeModalTabs() {
        const modalTabs = ["profile", "account", "contact"]; // Nama-nama tab di dalam modal

        modalTabs.forEach((tab) => {
          const modalButton = document.getElementById(`${tab}Btn`);
          if (modalButton) {
            modalButton.addEventListener("click", () =>
              handleModalTabClick(tab, modalTabs)
            );
          }
        });
      }

      function handleModalTabClick(selectedTab, modalTabs) {
        modalTabs.forEach((tab) => {
          const contentElement = document.getElementById(`${tab}Content`);
          const buttonElement = document.getElementById(`${tab}Btn`);

          if (contentElement && buttonElement) {
            if (tab === selectedTab) {
              contentElement.classList.remove("hidden");
              buttonElement.classList.remove("border-transparent");
              buttonElement.classList.add("bg-sky-100");
              buttonElement.classList.add("border-sky-600");
            } else {
              contentElement.classList.add("hidden");
              buttonElement.classList.add("border-transparent");
              buttonElement.classList.remove("bg-sky-100");
              buttonElement.classList.remove("border-sky-600");
            }
          }
        });
      }
      
      //More Deskripsi
      function toggleTextDesc(element) {
          console.log('Button clicked');
          // Mengakses elemen induk dari tombol yang diklik
          var parent = element.parentElement;

          // Mengambil elemen short-desc dan more-desc dari parent
          var shortDesc = parent.querySelector('.short-desc');
          var moreDesc = parent.querySelector('.more-desc');
          
          // Mengecek apakah moreDesc sedang disembunyikan
          if (moreDesc.style.display === "none" || moreDesc.style.display === "") {
              shortDesc.style.display = "none";
              moreDesc.style.display = "inline";
              element.textContent = "Less";
          } else {
              shortDesc.style.display = "inline";
              moreDesc.style.display = "none";
              element.textContent = "More";
          }
      }

  </script>

</body>

</html>