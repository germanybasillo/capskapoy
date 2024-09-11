    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <a class="nav-link" data-widget="fullscreen" href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
               <i class="fas fa-sign-out-alt">Logout</i>
            </a>
        </form>
         </li>
        </ul>
      </nav>
      <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/tenant/dashboard" class="brand-link">
      <img src="/logo.png" alt="Logo" width="230" height="50" style="margin-bottom:-120px;margin-top:-127px"
        style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">   
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/tenantprofiles" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Tenant Profile
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="/tenant/rooms" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Room Management
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/tenant/beds"  class="nav-link">
              <i class="nav-icon fa fa-bed"></i>
              <p>
                Bed Management
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{route('tenant.notice')}}" class="nav-link">
              <i class="nav-icon fa fa-bell"></i>
              <p>
                Notice
              </p>
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a href="{{route('tenant.proof')}}" class="nav-link">
              <i class="nav-icon fa fa-file-invoice"></i>
              <p>
                Proof of Payment 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('tenant.history')}}" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Payment History 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('tenant.suggestion')}}" class="nav-link">
              <i class="nav-icon fa fa-envelope"></i>
              <p>
                Suggestions 
              </p>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  </div>
 
<!-- ./wrapper -->