<nav id="navmenu" class="navmenu">
    <ul>
      <!-- <li><a href="{{ route('welcome') }}" class="active">Home</a></li> -->

        <!-- Selalu tampilkan link-link ini -->
        <li><a href="{{ route('welcome') }}">Home</a></li>
        <li><a href="{{ route('dosen.showPublic') }}">About Us</a></li>
        <li><a href="{{ route('struktur-organisasi.public') }}">Struktur Organisasi</a></li>
        <li><a href="{{ route('visi_misi.public') }}">Visi Misi</a></li>
        <li><a href="{{ route('beritas.public') }}">Berita</a></li>
        <li><a href="{{ route('galeri.index') }}">Galeri</a></li>
        <li><a href="{{ route('apa_kata_alumni.index') }}">Apa Kata Alumni</a></li>
        <li><a href="{{ route('keuangan.index') }}">Keuangan</a></li>

        @guest
          <!-- Jika belum login -->
          <li><a href="{{ route('login') }}">Login</a></li>
      @endguest

      @auth
          <!-- Dropdown User -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
              <i class="bi bi-person-circle" style="font-size: 1.5em;"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" role="menu">
                <li>
                    <span class="dropdown-item disabled">{{ Auth::user()->name }}</span>
                </li>
                <li><hr class="dropdown-divider"></li>
              <li>
                  <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                  </a>
              </li>
            </ul>
          </li>
          <!-- Form Logout (Tersembunyi) -->
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
      @endauth
          
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>