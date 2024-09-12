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
    <a href="/" class="brand-link">
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
                @if (auth()->user()->user_type === 'tenant')
                Dashboard
                @elseif (auth()->user()->user_type === 'rental_owner')
                @php
                $tenantprofiles = \App\Models\TenantProfile::count();
                $rooms = \App\Models\Room::count();
                $beds = \App\Models\Bed::count();
                $total = $tenantprofiles + $rooms + $beds;
                @endphp
                Dashboard  ({{ $total }})
                @endif
              </p>
            </a>
          </li>
          @if (auth()->user()->user_type === 'tenant')
          <li class="nav-item">
            <a href="/tenantprofiles" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Tenant Profile
              </p>
            </a>
          </li>
          @elseif (auth()->user()->user_type === 'rental_owner')
          <li class="nav-item">
            <a href="/bedassigns" class="nav-link">
              <i class="nav-icon fa fa-bed"></i>
              <p>
                @php
                $bedassigns = \App\Models\Bedassign::count();
                @endphp
                Bed Assignment  ({{ $bedassigns }})
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/selecteds" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                @php
                $selecteds = \App\Models\Selected::count();
                @endphp
                Room Selected  ({{ $selecteds }})
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/selectbeds" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                @php
                $selectbeds = \App\Models\Selectbed::count();
                @endphp
                Bed Selected  ({{ $selectbeds }})
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/chatify" class="nav-link">
              <i class="nav-icon fa fa-envelope"></i>
              <p>
               Contact Tenant
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="{{route('rental_owner.invoice')}}" class="nav-link">
              <i class="nav-icon fa fa-file-invoice"></i>
              <p>
                Invoice
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('rental_owner.payment')}}" class="nav-link">
              <i class="nav-icon fa fa-money-bill"></i>
              <p>
                Payments 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('rental_owner.paymenthistory')}}" class="nav-link">
              <i class="nav-icon fa fa-file "></i>
              <p>
                Payment History
              </p>
            </a>
          </li>
          <li class="nav-header">REPORTS</li>
          <li class="nav-item">
            <a href="{{route('rental_owner.income')}}" class="nav-link">
              <i class="nav-icon fa fa-chart-bar"></i>
              <p>
                Income Report  
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('rental_owner.collectibles')}}" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Collectibles 
              </p>
            </a>
          </li> --}}
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  </div>
 
<!-- ./wrapper -->