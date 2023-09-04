<ul class="menu-inner py-1">
    <!-- Home -->
    <li class="menu-item @yield('home')"  >
      <a href="{{ route('home') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Home</div>
      </a>
    </li>

    <!-- Halaman Data Pegawai -->
    <li class="menu-item @yield('main')">
      <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-user"> </i>
        <div data-i18n="Data Pegawai">Data Pegawai</div>
      </a>

      <ul class="menu-sub">
        @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Kepala')
        <li class="menu-item @yield('daftar')">
          <a href="{{ route('pegawai.index') }}" class="menu-link">
            <div data-i18n="Without menu">Daftar PNS</div>
          </a>
        </li>
        @endif
        <li class="menu-item @yield('profile_pegawai')">
          <a href="{{ route('show.pegawai') }}" class="menu-link">
            <div data-i18n="Without navbar">Profile Pegawai</div>
          </a>
        </li>
      </ul>
    </li>




     <!-- Halaman Master Data  -->
     @if (auth()->user()->role == 'Admin' )
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Admin</span>
    </li>
    <li class="menu-item @yield('dm')">
      <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dock-top"></i>
        <div data-i18n="Data Master">Master Data</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item @yield('pangkat')">
          <a href="{{ route('pangkat.index') }}" class="menu-link">
            <div data-i18n="Data Pangkat">Data Pangkat</div>
          </a>
        </li>
        <li class="menu-item @yield('gaji')">
          <a href="{{ route('gaji.index') }}" class="menu-link">
            <div data-i18n="Data Pangkat">Data Gaji</div>
          </a>
        </li>
        <li class="menu-item @yield('landing')">
          <a href="/Admin/landing-pages" class="menu-link">
            <div data-i18n="Data Pangkat">Atur Landing Page</div>
          </a>
        </li>
        <li class="menu-item @yield('kepala')">
          <a href="{{ route('kasat.index') }}" class="menu-link">
            <div data-i18n="Data Pangkat">Data Kepala Satuan</div>
          </a>
        </li>
        <li class="menu-item @yield('mail')">
          <a href="{{ route('index.email') }}" class="menu-link">
            <div data-i18n="Data Pangkat">Kirim Notif Email</div>
          </a>
        </li>
      </ul>
    </li>
    @endif
    <li class="menu-item @yield('kepeg')">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bxs-user-badge"></i>
          <div data-i18n="Data Master">Kepegawaian</div>
        </a>
        <ul class="menu-sub">
            @if (auth()->user()->role == 'Admin'|| auth()->user()->role == 'Kepala')
          <li class="menu-item @yield('data-naik-pangkat')">
            <a href="{{ route('data.naikPangkat') }}" class="menu-link">
              <div data-i18n="Data Jabatan">Data Kenaikan Pangkat PNS</div>
            </a>
          </li>
          <li class="menu-item @yield('data-naik-berkala')">
            <a href="{{ route('berkala.admin') }}" class="menu-link">
              <div data-i18n="Data Golongan">Data Kenaikan Gaji Berkala PNS</div>
            </a>
          </li>
          @endif
          <li class="menu-item @yield('usul-pangkat')">
            <a href="{{ route('menu.naik.pangkat') }}" class="menu-link">
              <div data-i18n="Data Pangkat">Usul Kenaikan Pangkat</div>
            </a>
          </li>
          <li class="menu-item @yield('usul-berkala')">
            <a href="{{ route('index.berkala') }}" class="menu-link">
              <div data-i18n="Data Pangkat">Usul Kenaikan Gaji Berkala</div>
            </a>
          </li>
        </ul>
    </li>
    @if (auth()->user()->role == 'Admin' || auth()->user()->role == 'Kepala')
      <li class="menu-item @yield('cp')">
      <a href="javascript:void(0)" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-printer"> </i>
        <div data-i18n="Data Pegawai">Cetak Pegawai</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item @yield('cetak')">
          <a href="{{ route('index.cetakBP') }}" class="menu-link">
            <div data-i18n="Without menu">Cetak Data PNS Berdasarkan Pangkat/Golongan</div>
          </a>
        </li>
    </ul>
</li>
@endif

<li class="menu-header small text-uppercase">
    <span class="menu-header-text">Archive</span>
  </li>
<li class="menu-item @yield('')"  >
    <a href="{{ route('dokumen.index') }}" class="menu-link">
      {{-- <i class="menu-icon tf-icons bx bxs-file-archive"></i> --}}
      <i class='menu-icon tf-icons bx bxs-file-archive'></i>
      <div data-i18n="Analytics">Arsip Dokumen</div>
    </a>
  </li>


  </ul>
