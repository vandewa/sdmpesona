      <!-- Preloader --> {{-- <div class="preloader flex-column justify-content-center align-items-center">
          <img class="animation__shake" src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
              height="60" width="60">
      </div> --}}

      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>
          </ul>

          <!-- Right navbar links -->
          <ul class="ml-auto navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <div class="d-flex align-items-center">
                          <div class="ms-3"><i class="mr-2 fas fa-sign-out-alt"></i></i>Keluar</div>
                      </div>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                  </a>
              </li>
          </ul>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-light-success elevation-4">
          <!-- Brand Logo -->
          <a href="{{ route('dashboard') }}" class="brand-link">
              {{-- <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                  class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
              <img src="{{ asset('pesona.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                  style="opacity: .8">
              <span class="brand-text font-weight-light">Pesona FM</span>
          </a>

          <!-- Sidebar -->
          <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="pb-3 mt-3 mb-3 user-panel d-flex">
                  <div class="image">
                      <img src="{{ asset('soul.png') }}" class="img-circle elevation-2" alt="User Image">
                  </div>
                  <div class="info">
                      <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                  </div>
              </div>

              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                      data-accordion="false">
                      <li class="nav-item">
                          <a href="{{ route('dashboard') }}"
                              class="nav-link  {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}{{ Request::segment(1) == '' ? 'active' : '' }}">
                              <i class="nav-icon fas fa-home"></i>
                              <p>
                                  Dashboard
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('gaji-index') }}"
                              class="nav-link  {{ Request::segment(1) == 'gaji-index' ? 'active' : '' }}{{ Request::segment(1) == 'gaji' ? 'active' : '' }}">
                              <i class="nav-icon fas fa-hand-holding-dollar"></i>
                              <p>
                                  Gaji
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('perubahan-gaji') }}"
                              class="nav-link  {{ Request::segment(1) == 'perubahan-gaji' ? 'active' : '' }}">
                              <i class="nav-icon fas fa-file-invoice-dollar"></i>
                              <p>
                                  Perubahan Gaji
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('perubahan-jabatan') }}"
                              class="nav-link  {{ Request::segment(1) == 'perubahan-jabatan' ? 'active' : '' }}">
                              <i class="nav-icon fas fa-id-card-alt"></i>
                              <p>
                                  Perubahan Jabatan
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('file') }}"
                              class="nav-link  {{ Request::segment(1) == 'file' ? 'active' : '' }}">
                              <i class="nav-icon fas fa-file-upload"></i>
                              <p>
                                  Management File
                              </p>
                          </a>
                      </li>
                      @if (auth()->user()->hasRole('superadmin'))
                          <li
                              class="nav-item
                                {{ Request::segment(2) == 'user-index' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'user' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'nama-jabatan' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'status-pekerjaan' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'tingkat-pekerjaan' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'kategori' ? 'menu-is-opening menu-open' : '' }}
                              ">
                              <a href="#"
                                  class="nav-link
                                  {{ Request::segment(2) == 'user-index' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'user' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'nama-jabatan' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'status-pekerjaan' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'tingkat-pekerjaan' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'kategori' ? 'active' : '' }}
                                  ">
                                  <i class="nav-icon fa-solid fa-file-lines"></i>
                                  <p>
                                      Master
                                      <i class="fas fa-angle-left right"></i>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('master.user-index') }}"
                                          class="nav-link 
                                      {{ Request::segment(2) == 'user-index' ? 'active' : '' }}
                                      {{ Request::segment(2) == 'user' ? 'active' : '' }}
                                      ">
                                          @if (Request::segment(2) == 'user-index')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @elseif(Request::segment(2) == 'user')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @else
                                              <i class="far fa-circle nav-icon ml-2"></i>
                                          @endif
                                          <p>Pegawai</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="{{ route('master.nama-jabatan') }}"
                                          class="nav-link 
                                      {{ Request::segment(2) == 'nama-jabatan' ? 'active' : '' }}
                                      ">
                                          @if (Request::segment(2) == 'nama-jabatan')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @else
                                              <i class="far fa-circle nav-icon ml-2"></i>
                                          @endif
                                          <p>Nama Jabatan</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="{{ route('master.status-pekerjaan') }}"
                                          class="nav-link 
                                      {{ Request::segment(2) == 'status-pekerjaan' ? 'active' : '' }}
                                      ">
                                          @if (Request::segment(2) == 'status-pekerjaan')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @else
                                              <i class="far fa-circle nav-icon ml-2"></i>
                                          @endif
                                          <p>Status Pekerjaan</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="{{ route('master.tingkat-pekerjaan') }}"
                                          class="nav-link 
                                      {{ Request::segment(2) == 'tingkat-pekerjaan' ? 'active' : '' }}
                                      ">
                                          @if (Request::segment(2) == 'tingkat-pekerjaan')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @else
                                              <i class="far fa-circle nav-icon ml-2"></i>
                                          @endif
                                          <p>Tingkat Pekerjaan</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="{{ route('master.kategori') }}"
                                          class="nav-link 
                                      {{ Request::segment(2) == 'kategori' ? 'active' : '' }}
                                      ">
                                          @if (Request::segment(2) == 'kategori')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @else
                                              <i class="far fa-circle nav-icon ml-2"></i>
                                          @endif
                                          <p>Kategori</p>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                      @endif

                  </ul>

              </nav>
              <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
      </aside>
