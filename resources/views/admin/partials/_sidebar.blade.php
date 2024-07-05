  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      @if (Auth::user()->role == 'admin')
          <li class="nav-item">
            <a class="nav-link collapsed" href="/admin/student">
            <i class="bi bi-user"></i>
          <span>Student</span>
        </a>
          </li>
      @endif

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/courses">
          <i class="bi bi-card-list"></i>
          <span>Courses</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->
