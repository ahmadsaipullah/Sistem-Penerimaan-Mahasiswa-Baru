     <!-- Sidebar -->
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
             <div class="sidebar-brand-icon rotate-n-15">
                 <img src="{{ asset('assets/img/logo.jpg') }}" alt="logo" width="100px">
             </div>

         </a>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item @yield('dashboard')">
             <a class="nav-link" href="{{ route('dashboard') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Dashboard</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <div class="sidebar-heading">
             Interface
         </div>
         @if (auth()->user()->level_id == 1)
             <li class="nav-item @yield('admin')">
                 <a class="nav-link" href="{{ route('admin.index') }}">
                     <i class="fas fa-fw fa-user"></i>
                     <span>Admin</span></a>
             </li>
             <li class="nav-item @yield('pendaftaran')">
                <a class="nav-link" href="{{ route('pendaftaran.index') }}">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Data Pendaftar</span></a>
            </li>
            <li class="nav-item @yield('berkas')">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-upload"></i>
                    <span>Data Upload Berkas</span>
                </a>
            </li>
         @endif

         @if (auth()->user()->level_id == 2)
         @endif

         @if (auth()->user()->level_id == 3)
         <li class="nav-item @yield('pendaftaran')">
             <a class="nav-link" href="{{ route('userpendaftaran.index') }}">
                <i class="fas fa-fw fa-file-alt"></i>
                 <span>Formulir Pendaftaran</span>
             </a>
         </li>

              <li class="nav-item @yield('berkas')">
                 <a class="nav-link" href="#">
                     <i class="fas fa-fw fa-upload"></i>
                     <span>Upload Berkas</span>
                 </a>
             </li>

         @php
             $pendaftaran = \App\Models\Pendaftaran::where('user_id', auth()->id())->exists();
         @endphp

         @if ($pendaftaran)
             <li class="nav-item @yield('berkas')">
                 <a class="nav-link" href="#">
                     <i class="fas fa-fw fa-upload"></i>
                     <span>Upload Berkas</span>
                 </a>
             </li>
         @endif
     @endif
         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

     </ul>
     <!-- End of Sidebar -->
