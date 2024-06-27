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
                      @if (auth()->user()->path_foto)
                          <img src="{{ route('helper.show-picture', ['path' => auth()->user()->path_foto]) }}"
                              class="img-circle elevation-2" alt="User Image">
                      @else
                          <img src="{{ asset('soul.png') }}" class="img-circle elevation-2" alt="User Image">
                      @endif
                  </div>
                  <div class="info">
                      <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                  </div>
              </div>

              <!-- Sidebar Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                      data-accordion="false">
                      @if (auth()->user()->hasRole(['superadmin', 'direktur']))
                          <li class="nav-item">
                              <a href="{{ route('dashboard') }}"
                                  class="nav-link  {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}{{ Request::segment(1) == '' ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-home"></i>
                                  <p>
                                      Dashboard
                                  </p>
                              </a>
                          </li>
                      @endif

                      @if (!auth()->user()->hasRole(['ketua']))
                          <li class="nav-item">
                              <a href="{{ route('profil') }}"
                                  class="nav-link  {{ Request::segment(1) == 'profil' ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-user"></i>
                                  <p>
                                      Profil
                                  </p>
                              </a>
                          </li>
                      @endif

                      {{-- //anggota dewas --}}
                      @if (auth()->user()->nama_jabatan_sekarang_id == 11 && auth()->user()->status == 1)
                          <li class="nav-item">
                              <a href="{{ route('kpi-penilaian-index') }}"
                                  class="nav-link  {{ Request::segment(1) == 'kpi-penilaian-index' ? 'active' : '' }}{{ Request::segment(1) == 'kpi-penilaian' ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-pencil"></i>
                                  <p>
                                      KPI Penilaian Direksi
                                  </p>
                              </a>
                          </li>
                      @endif

                      @if (auth()->user()->hasRole(['superadmin']))
                          {{-- <li class="nav-item">
                              <a href="{{ route('kpi-penilaian-index') }}"
                                  class="nav-link  {{ Request::segment(1) == 'kpi-penilaian-index' ? 'active' : '' }}{{ Request::segment(1) == 'kpi-penilaian' ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-pencil"></i>
                                  <p>
                                      KPI Penilaian Direksi
                                  </p>
                              </a>
                          </li> --}}
                      @endif

                      {{-- //ketua dewas --}}
                      @if (auth()->user()->hasRole(['ketua']) && auth()->user()->status == 1)
                          <li class="nav-item">
                              <a href="{{ route('kpi-penilaian-index') }}"
                                  class="nav-link  {{ Request::segment(1) == 'kpi-penilaian-index' ? 'active' : '' }}{{ Request::segment(1) == 'kpi-penilaian' ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-pencil"></i>
                                  <p>
                                      KPI Penilaian Direksi
                                  </p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('password') }}"
                                  class="nav-link  {{ Request::segment(1) == 'ganti-password' ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-key"></i>
                                  <p>
                                      Ganti Password
                                  </p>
                              </a>
                          </li>
                      @endif

                      @if (auth()->user()->hasRole(['direktur', 'superadmin']))
                          {{-- <li class="nav-item">
                              <a href="{{ route('penilaian-silang') }}"
                                  class="nav-link  {{ Request::segment(1) == 'penilaian-silang' ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-pencil"></i>
                                  <p>
                                      Penilaian Silang Direksi
                                  </p>
                              </a>
                          </li> --}}
                      @endif


                      @if (!auth()->user()->hasRole(['ketua']))
                          <li class="nav-item">
                              <a href="{{ route('lihat-gaji') }}"
                                  class="nav-link  {{ Request::segment(1) == 'lihat-gaji' ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-circle-dollar-to-slot"></i>
                                  <p>
                                      Gaji
                                  </p>
                              </a>
                          </li>


                          <li class="nav-item">
                              <a href="{{ route('pengajuan-cuti') }}"
                                  class="nav-link  {{ Request::segment(1) == 'pengajuan-cuti' ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-calendar"></i>
                                  <p>
                                      Pengajuan Cuti
                                  </p>
                              </a>
                          </li>
                      @endif


                      @if (auth()->user()->hasRole(['superadmin', 'direktur', 'administrator']))
                          <li class="nav-item">
                              <a href="{{ route('cuti') }}"
                                  class="nav-link  {{ Request::segment(1) == 'cuti' ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-calendar-check"></i>
                                  <p>
                                      Cuti
                                  </p>
                                  @if (cekCuti() == 0)
                                      <span class="badge badge-secondary ml-2">{{ cekCuti() }}</span>
                                  @else
                                      <span class="badge badge-danger ml-2">{{ cekCuti() }}</span>
                                  @endif
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('gaji-index') }}"
                                  class="nav-link  {{ Request::segment(1) == 'gaji-index' ? 'active' : '' }}{{ Request::segment(1) == 'gaji' ? 'active' : '' }}">
                                  <i class="nav-icon fas fa-hand-holding-dollar"></i>
                                  <p>
                                      Penggajian
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
                          <li
                              class="nav-item
                                {{ Request::segment(1) == 'file' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(1) == 'file-administrasi' ? 'menu-is-opening menu-open' : '' }}
                              ">
                              <a href="#"
                                  class="nav-link
                                  {{ Request::segment(1) == 'file' ? 'active' : '' }}
                                  {{ Request::segment(1) == 'file-administrasi' ? 'active' : '' }}
                                  ">
                                  <i class="nav-icon fa-solid fa-file-lines"></i>
                                  <p>
                                      Management File
                                      <i class="fas fa-angle-left right"></i>
                                  </p>
                              </a>
                              <ul class="nav nav-treeview">
                                  <li class="nav-item">
                                      <a href="{{ route('file') }}"
                                          class="nav-link 
                                      {{ Request::segment(1) == 'file' ? 'active' : '' }}
                                      ">
                                          @if (Request::segment(1) == 'file')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @else
                                              <i class="far fa-circle nav-icon ml-2"></i>
                                          @endif
                                          <p>Keuangan</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="{{ route('file-administrasi') }}"
                                          class="nav-link 
                                      {{ Request::segment(1) == 'file-administrasi' ? 'active' : '' }}
                                      ">
                                          @if (Request::segment(1) == 'file-administrasi')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @else
                                              <i class="far fa-circle nav-icon ml-2"></i>
                                          @endif
                                          <p>Administrasi</p>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                          <li
                              class="nav-item
                                {{ Request::segment(2) == 'user-index' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'user' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'nama-jabatan' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'status-pekerjaan' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'tingkat-pekerjaan' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'kategori' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'tunjangan-pendidikan' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'tunjangan-masa-kerja' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'tunjangan-kehadiran' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'tunjangan-kpi-pelaksana-divisi' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'tunjangan-kpi-partimer' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'cuti-alasan-penting' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'ketua-dewas' ? 'menu-is-opening menu-open' : '' }}
                                {{ Request::segment(2) == 'kuota-cuti-tahunan' ? 'menu-is-opening menu-open' : '' }}
                              ">
                              <a href="#"
                                  class="nav-link
                                  {{ Request::segment(2) == 'user-index' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'user' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'nama-jabatan' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'status-pekerjaan' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'tingkat-pekerjaan' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'kategori' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'tunjangan-pendidikan' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'tunjangan-masa-kerja' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'tunjangan-kehadiran' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'tunjangan-kpi-pelaksana-divisi' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'tunjangan-kpi-partimer' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'cuti-alasan-penting' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'ketua-dewas' ? 'active' : '' }}
                                  {{ Request::segment(2) == 'kuota-cuti-tahunan' ? 'active' : '' }}
                                  ">
                                  <i class="nav-icon fa-solid fa-laptop"></i>
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
                                      <a href="{{ route('master.ketua-dewas') }}"
                                          class="nav-link 
                                      {{ Request::segment(2) == 'ketua-dewas' ? 'active' : '' }}
                                      ">
                                          @if (Request::segment(2) == 'ketua-dewas')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @else
                                              <i class="far fa-circle nav-icon ml-2"></i>
                                          @endif
                                          <p>Ketua Dewas</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="{{ route('master.kuota-cuti-tahunan') }}"
                                          class="nav-link 
                                      {{ Request::segment(2) == 'kuota-cuti-tahunan' ? 'active' : '' }}
                                      ">
                                          @if (Request::segment(2) == 'kuota-cuti-tahunan')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @else
                                              <i class="far fa-circle nav-icon ml-2"></i>
                                          @endif
                                          <p>Kuota Cuti Tahunan</p>
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
                                  {{-- <li class="nav-item">
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
                                  </li> --}}
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
                                          <p>Status Pekerjaan</p>
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
                                  <li class="nav-item">
                                      <a href="{{ route('master.cuti-alasan-penting') }}"
                                          class="nav-link 
                                    {{ Request::segment(2) == 'cuti-alasan-penting' ? 'active' : '' }}
                                    ">
                                          @if (Request::segment(2) == 'cuti-alasan-penting')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @else
                                              <i class="far fa-circle nav-icon ml-2"></i>
                                          @endif
                                          <p>Jenis Cuti Alasan Penting</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="{{ route('master.tunjangan-pendidikan') }}"
                                          class="nav-link 
                                      {{ Request::segment(2) == 'tunjangan-pendidikan' ? 'active' : '' }}
                                      ">
                                          @if (Request::segment(2) == 'tunjangan-pendidikan')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @else
                                              <i class="far fa-circle nav-icon ml-2"></i>
                                          @endif
                                          <p>Tunjangan Pendidikan</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="{{ route('master.tunjangan-masa-kerja') }}"
                                          class="nav-link 
                                      {{ Request::segment(2) == 'tunjangan-masa-kerja' ? 'active' : '' }}
                                      ">
                                          @if (Request::segment(2) == 'tunjangan-masa-kerja')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @else
                                              <i class="far fa-circle nav-icon ml-2"></i>
                                          @endif
                                          <p>Tunjangan Masa Kerja</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="{{ route('master.tunjangan-kehadiran') }}"
                                          class="nav-link 
                                      {{ Request::segment(2) == 'tunjangan-kehadiran' ? 'active' : '' }}
                                      ">
                                          @if (Request::segment(2) == 'tunjangan-kehadiran')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @else
                                              <i class="far fa-circle nav-icon ml-2"></i>
                                          @endif
                                          <p>Tunjangan Kehadiran</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="{{ route('master.tunjangan-kpi-pelaksana-divisi') }}"
                                          class="nav-link 
                                      {{ Request::segment(2) == 'tunjangan-kpi-pelaksana-divisi' ? 'active' : '' }}
                                      ">
                                          @if (Request::segment(2) == 'tunjangan-kpi-pelaksana-divisi')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @else
                                              <i class="far fa-circle nav-icon ml-2"></i>
                                          @endif
                                          <p>Tunjangan KPI Pelaksana Divisi</p>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="{{ route('master.tunjangan-kpi-partimer') }}"
                                          class="nav-link 
                                      {{ Request::segment(2) == 'tunjangan-kpi-partimer' ? 'active' : '' }}
                                      ">
                                          @if (Request::segment(2) == 'tunjangan-kpi-partimer')
                                              <i class="far fa-dot-circle nav-icon ml-2"></i>
                                          @else
                                              <i class="far fa-circle nav-icon ml-2"></i>
                                          @endif
                                          <p>Tunjangan KPI Partimer</p>
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
