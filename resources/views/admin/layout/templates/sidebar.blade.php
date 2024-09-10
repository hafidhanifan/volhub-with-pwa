 <!-- ======== sidebar-nav start =========== -->
    <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->
    
 <aside class="sidebar-nav-wrapper">
      <div class="navbar-logo">
        <a href="index.html">
          <img src="{{ asset('/img/logo.png') }}" alt="logo" />
        </a>
      </div>
      <nav class="sidebar-nav">
        <ul>
          <li class="nav-item nav-item-has-children">
            <a
              href="#0"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_1"
              aria-controls="ddmenu_1"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon">
                <svg
                  width="20"
                  height="20"
                  viewBox="0 0 20 20"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M8.74999 18.3333C12.2376 18.3333 15.1364 15.8128 15.7244 12.4941C15.8448 11.8143 15.2737 11.25 14.5833 11.25H9.99999C9.30966 11.25 8.74999 10.6903 8.74999 10V5.41666C8.74999 4.7263 8.18563 4.15512 7.50586 4.27556C4.18711 4.86357 1.66666 7.76243 1.66666 11.25C1.66666 15.162 4.83797 18.3333 8.74999 18.3333Z"
                  />
                  <path
                    d="M17.0833 10C17.7737 10 18.3432 9.43708 18.2408 8.75433C17.7005 5.14918 14.8508 2.29947 11.2457 1.75912C10.5629 1.6568 10 2.2263 10 2.91665V9.16666C10 9.62691 10.3731 10 10.8333 10H17.0833Z"
                  />
                </svg>
              </span>
              <span class="text">Dashboard</span>
            </a>
            <ul id="ddmenu_1" class="collapse show dropdown-nav">
              <li>
                <a href="{{ route('admin.dashboard', ['id' => auth()->guard('admin')->user()->id]) }}" class="active"> VolHub </a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-item-has-children">
            <a
              href="#0"
              class="collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_2"
              aria-controls="ddmenu_2"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon">
                <svg
                  width="20"
                  height="20"
                  viewBox="0 0 20 20"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M11.8097 1.66667C11.8315 1.66667 11.8533 1.6671 11.875 1.66796V4.16667C11.875 5.43232 12.901 6.45834 14.1667 6.45834H16.6654C16.6663 6.48007 16.6667 6.50186 16.6667 6.5237V16.6667C16.6667 17.5872 15.9205 18.3333 15 18.3333H5.00001C4.07954 18.3333 3.33334 17.5872 3.33334 16.6667V3.33334C3.33334 2.41286 4.07954 1.66667 5.00001 1.66667H11.8097ZM6.66668 7.70834C6.3215 7.70834 6.04168 7.98816 6.04168 8.33334C6.04168 8.67851 6.3215 8.95834 6.66668 8.95834H10C10.3452 8.95834 10.625 8.67851 10.625 8.33334C10.625 7.98816 10.3452 7.70834 10 7.70834H6.66668ZM6.04168 11.6667C6.04168 12.0118 6.3215 12.2917 6.66668 12.2917H13.3333C13.6785 12.2917 13.9583 12.0118 13.9583 11.6667C13.9583 11.3215 13.6785 11.0417 13.3333 11.0417H6.66668C6.3215 11.0417 6.04168 11.3215 6.04168 11.6667ZM6.66668 14.375C6.3215 14.375 6.04168 14.6548 6.04168 15C6.04168 15.3452 6.3215 15.625 6.66668 15.625H13.3333C13.6785 15.625 13.9583 15.3452 13.9583 15C13.9583 14.6548 13.6785 14.375 13.3333 14.375H6.66668Z"
                  />
                  <path
                    d="M13.125 2.29167L16.0417 5.20834H14.1667C13.5913 5.20834 13.125 4.74197 13.125 4.16667V2.29167Z"
                  />
                </svg>
              </span>
              <span class="text">Pages</span>
            </a>
            <ul id="ddmenu_2" class="collapse dropdown-nav">
              <li>
                <a href="{{ route('admin.kategori') }}"> Kategori </a>
              </li>
              <li>
                <a href="{{ route('admin.kriteria') }}"> Kriteria </a>
              </li>
              <li>
                <a href="{{ route('admin.benefit') }}"> Benefit </a>
              </li>
              <li>
                <a href="{{ route('admin.skill') }}"> Skill </a>
              </li>
              <li>
                <a href="{{ route('admin.kegiatan') }}"> Kegiatan / Volunteer </a>
              </li>
              <li>
                <a href="{{ route('admin.pendaftar') }}"> Pendaftar </a>
              </li>
              <li>
                <a href="{{ route('admin.user') }}"> User </a>
              </li>
              <li>
                <a href="{{ route('admin.setting') }}"> Setting </a>
              </li>
            </ul>
          </li>
          <li class="nav-item nav-item-has-children">
            <a
              href="#0"
              class="collapsed"
              data-bs-toggle="collapse"
              data-bs-target="#ddmenu_3"
              aria-controls="ddmenu_3"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="icon">
                <svg
                  width="20"
                  height="20"
                  viewBox="0 0 20 20"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M14.9211 10.1294C15.1652 9.88534 15.1652 9.48967 14.9211 9.24559L10.7544 5.0789C10.5103 4.83482 10.1147 4.83482 9.87057 5.0789C9.62649 5.32297 9.62649 5.71871 9.87057 5.96278L12.9702 9.06251H1.97916C1.63398 9.06251 1.35416 9.34234 1.35416 9.68751C1.35416 10.0327 1.63398 10.3125 1.97916 10.3125H12.9702L9.87057 13.4123C9.62649 13.6563 9.62649 14.052 9.87057 14.2961C10.1147 14.5402 10.5103 14.5402 10.7544 14.2961L14.9211 10.1294Z"
                  />
                  <path
                    d="M11.6383 15.18L15.805 11.0133C16.5373 10.2811 16.5373 9.09391 15.805 8.36166L11.6383 4.195C11.2722 3.82888 10.7923 3.64582 10.3125 3.64582V3.02082C10.3125 2.10035 11.0587 1.35416 11.9792 1.35416H16.9792C17.8997 1.35416 18.6458 2.10035 18.6458 3.02082V16.3542C18.6458 17.2747 17.8997 18.0208 16.9792 18.0208H11.9792C11.0587 18.0208 10.3125 17.2747 10.3125 16.3542V15.7292C10.7923 15.7292 11.2722 15.5461 11.6383 15.18Z"
                  />
                </svg>
              </span>
              <span class="text">Auth</span>
            </a>
            <ul id="ddmenu_3" class="collapse dropdown-nav">
              <li>
                <a href="{{ route('admin.logout') }}"> Logout </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </aside>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->