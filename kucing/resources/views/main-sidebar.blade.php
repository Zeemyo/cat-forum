<!-- Brand Logo -->
<a href="/kucingku/" class="brand-link">
  <img src="adminlte/dist/img/paww.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  <span class="brand-text font-weight-light">Meowrachasite</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="adminlte/dist/img/logo.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">{{ Auth::user()->name }}</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column"  role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="{{ url('dashboard') }}" class="nav-link ">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item ">
        <a href="{{ url('postingan') }}" class="nav-link">
          <i class="nav-icon fas far fa-comment"></i>
          <p>
            Forum
          </p>
        </a>
      </li>
      @if ( Auth::user()->role == 'admin')
      <li class="nav-item ">
        <a href="{{ url('Category') }}" class="nav-link">
          <i class="nav-icon fas fa-tags"></i>
          <p>
            Category
          </p>
        </a>
      </li>
      
      <li class="nav-item ">
        <a href="{{ url('Users') }}" class="nav-link">
          <i class="nav-icon ion-person-add"></i>
          <p>
            Users
          </p>
        </a>
      </li>

    <li class="nav-item ">
      <a href="{{ url('artikel') }}" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
          Artikel
        </p>
      </a>
    </li>
    @endif


    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
